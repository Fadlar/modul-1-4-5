<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Santri') }}
            </h2>
            <div class="flex items-center gap-x-2">
                <a href="{{ route('export_excel') }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Export Excel
                </a>
                <a href="{{ route('import_excel') }}"
                    class="inline-flex items-center px-4 py-2 bg-rose-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-500 focus:bg-rose-500 active:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Import Excel
                </a>
                <a href="{{ route('export_pdf') }}"
                    class="inline-flex items-center px-4 py-2 bg-teal-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-500 focus:bg-teal-500 active:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Cetak PDF
                </a>
                <a href="{{ route('santris.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Tambah Santri
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <form action="{{ route('santris.index') }}" method="get">
                <input type="search" name="search" value="{{ old('search') ?? request('search') }}"
                    class="w-64 rounded-lg border-0 shadow-sm mb-5 focus:outline-none focus:ring-0 focus:border-0"
                    placeholder="Cari berdasarkan nama . . .">
            </form>
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-300 border-b">
                            <th class="py-4 px-3" width="50">#</th>
                            <th class="text-left py-4 px-2">Nama</th>
                            <th class="text-left py-4 px-2">Tanggal Lahir</th>
                            <th class="text-left py-4 px-2">Tempat Lahir</th>
                            <th class="text-left py-4 px-2">Nomor Telepon</th>
                            <th class="text-left py-4 px-2">Alamat</th>
                            <th class="text-left py-4 px-2"><span class="sr-only">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $item)
                            <tr class="border-b last:border-b-0">
                                <td class="text-center py-4 px-2">{{ $loop->iteration }}</td>
                                <td class="py-4 px-2">{{ $item->nama }}</td>
                                <td class="py-4 px-2">{{ $item->tgl_lahir }}</td>
                                <td class="py-4 px-2">{{ $item->lahir }}</td>
                                <td class="py-4 px-2">{{ $item->no_hp }}</td>
                                <td class="py-4 px-2">{{ $item->alamat }}</td>
                                <td class="py-4 px-2 text-right">
                                    <a href="{{ route('santris.edit', $item->id) }}"
                                        class="font-semibold text-green-600">Edit</a>
                                    <form class="font-semibold text-red-600"
                                        action="{{ route('santris.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b last:border-b-0">
                                <td class="text-center py-4 px-2" colspan="7">Data tidak ada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $santris->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
