<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Angkot {{ $angkot->no_angkot }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('angkots.update', $angkot->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">No Angkot</label>
                            <input type="text" name="no_angkot" value="{{ $angkot->no_angkot }}" class="w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Warna Mobil</label>
                            <input type="text" name="warna_mobil" value="{{ $angkot->warna_mobil }}" class="w-full border-gray-300 rounded">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jurusan</label>
                        <input type="text" name="jurusan" value="{{ $angkot->jurusan }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jalur Rute (Nama Jalan/Daerah)</label>
                        <textarea name="jalur_rute" class="w-full border-gray-300 rounded" rows="3">{{ $angkot->jalur_rute }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">*Pisahkan dengan koma agar bisa dicari user.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                            <input type="number" name="harga" value="{{ $angkot->harga }}" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Latitude</label>
                            <input type="text" name="latitude" value="{{ $angkot->latitude }}" class="w-full border-gray-300 rounded bg-gray-100" placeholder="-7.xxxxx">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Longitude</label>
                            <input type="text" name="longitude" value="{{ $angkot->longitude }}" class="w-full border-gray-300 rounded bg-gray-100" placeholder="107.xxxxx">
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('angkots.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>