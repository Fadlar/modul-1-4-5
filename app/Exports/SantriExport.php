<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SantriExport implements FromView
{
    public function view(): View
    {
        return view('exports.santri', [
            'santri' => Santri::all(),
        ]);
    }
}
