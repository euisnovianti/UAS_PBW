<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">
            Rekomendasi Angkot
        </h2>
    </x-slot>

    <div class="p-6">
        <p>
            Dari <b>{{ $asal }}</b> ke <b>{{ $tujuan }}</b>
        </p>

        <hr class="my-4">

        @if($angkots->isEmpty())
            <p>Tidak ditemukan angkot yang sesuai.</p>
        @else
            @foreach($angkots as $a)
                <div class="border p-4 mb-3">
                    <h3 class="font-bold">
                        Angkot {{ $a->no_angkot }} — {{ $a->jurusan }}
                    </h3>
                    <p>Warna: {{ $a->warna_mobil }}</p>
                    <p>Harga: Rp {{ number_format($a->harga) }}</p>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
