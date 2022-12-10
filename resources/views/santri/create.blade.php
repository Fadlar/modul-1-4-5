<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Santri') }}
        </h2>
    </x-slot>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex w-full justify-center">
                    <form action="{{ route('santris.store') }}" method="POST" class="w-3/4">
                        @csrf
                        @method('post')
                        <div class="pb-3">
                            <label for="nama" class="w-full text-sm font-semibold text-gray-800">Nama</label>
                            <input type="text" id="nama" class="w-full border border-gray-200 rounded-lg"
                                name="nama" required>
                        </div>
                        <div class="pb-3">
                            <label for="tgl_lahir" class="w-full text-sm font-semibold text-gray-800">Tanggal
                                Lahir</label>
                            <input type="date" id="tgl_lahir" class="w-full border border-gray-200 rounded-lg"
                                name="tgl_lahir" required>
                        </div>
                        <div class="pb-3">
                            <label for="lahir" class="w-full text-sm font-semibold text-gray-800">Tempat
                                Lahir</label>
                            <input type="text" id="lahir" class="w-full border border-gray-200 rounded-lg"
                                name="lahir" required>
                        </div>
                        <div class="pb-3">
                            <label for="no_hp" class="w-full text-sm font-semibold text-gray-800">No Telepon</label>
                            <input type="text" id="no_hp" class="w-full border border-gray-200 rounded-lg"
                                name="no_hp" required>
                        </div>
                        <div class="pb-3">
                            <label for="alamat" class="w-full text-sm font-semibold text-gray-800">Alamat</label>
                            <textarea id="alamat" class="w-full border border-gray-200 rounded-lg" name="alamat" required></textarea>
                        </div>
                        <x-primary-button type="submit">
                            Simpan
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
