<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Cari Angkot</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('angkot.search') }}">
            @csrf

            <div>
                <label>Lokasi Awal</label>
                <input type="text" name="asal" class="border w-full p-2">
            </div>

            <div class="mt-4">
                <label>Lokasi Tujuan</label>
                <input type="text" name="tujuan" class="border w-full p-2">
            </div>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2">
                Cari Angkot
            </button>
        </form>
    </div>
</x-app-layout>
