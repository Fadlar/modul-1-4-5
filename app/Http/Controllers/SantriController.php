<?php

namespace App\Http\Controllers;

use App\Exports\SantriExport;
use App\Imports\SantrisImport;
use App\Models\Santri;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Pdf;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $santris = Santri::when($request->search, fn ($q, $k) => $q->where('nama', 'like', "%{$k}%"))->paginate()->withQueryString();
        return view('santri.index', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'tgl_lahir' => ['required'],
            'lahir' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
        ]);

        Santri::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('santris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        return view('santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $request->validate([
            'nama' => ['required'],
            'tgl_lahir' => ['required'],
            'lahir' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
        ]);

        $santri->update($request->all());

        return redirect()->route('santris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        $santri->delete();
        return back();
    }

    // Export Pdf
    public function export_pdf()
    {
        $pdf = Pdf::loadview('exports.santri', [
            'santri' => Santri::all()
        ]);
        return $pdf->download('Santri-pdf.pdf');
    }

    // Export Excel
    public function export_excel()
    {
        return Excel::download(new SantriExport, 'Santri.xlsx');
    }

    // Import Excel
    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:csv,xls,xlsx']
        ]);

        $file = $request->file('file');

        $fileName = rand() . $file->getClientOriginalName();

        $file->move('file_santri', $fileName);

        Excel::import(new SantrisImport, public_path('/file_santri/' . $fileName));

        return redirect('import_excel');
    }
}
