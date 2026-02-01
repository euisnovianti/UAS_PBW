<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Angkot Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Ups! Ada kesalahan input:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
                <form action="{{ route('angkots.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block font-bold mb-2">No Angkot</label>
                            <input type="text" name="no_angkot" class="w-full border-gray-300 rounded" placeholder="Contoh: 01" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Warna Mobil</label>
                            <input type="text" name="warna_mobil" class="w-full border-gray-300 rounded" placeholder="Contoh: Hijau">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Jurusan</label>
                        <input type="text" name="jurusan" class="w-full border-gray-300 rounded" placeholder="Contoh: Terminal - Sukaregang" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Jalur Rute (Pisahkan dengan koma)</label>
                        <textarea name="jalur_rute" class="w-full border-gray-300 rounded" rows="3" placeholder="Jalan Merdeka, Jalan Cimanuk, ..."></textarea>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Harga (Rp)</label>
                            <input type="number" name="harga" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Latitude</label>
                            <input type="text" name="latitude" class="w-full border-gray-300 rounded" placeholder="-7.xxxxx">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Longitude</label>
                            <input type="text" name="longitude" class="w-full border-gray-300 rounded" placeholder="107.xxxxx">
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('angkots.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold">Simpan Baru</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>