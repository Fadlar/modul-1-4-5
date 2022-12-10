<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Santri') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="bg-white shadow sm:rounded-lg p-5">
                <form action="{{ route('import_excel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="block font-semibold mb-2">Masukan File Excel</label>
                        <input type="file" name="file"
                            class="file:rounded-full file:border-0 file:text-white file:font-semibold focus:outline-none file:px-5 file:py-1 file:bg-teal-500">
                    </div>
                    <div class="text-right mt-5">
                        <x-primary-button>Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
