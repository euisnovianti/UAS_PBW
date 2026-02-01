@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Cari Angkot</h3>

    <form action="{{ route('angkot.search') }}" method="POST">
        @csrf

        <div>
            <label>Lokasi Awal</label>
            <input type="text" name="asal" class="form-control" required>
        </div>

        <div class="mt-3">
            <label>Lokasi Tujuan</label>
            <input type="text" name="tujuan" class="form-control" required>
        </div>

        <button class="mt-3 btn btn-primary">Cari Angkot</button>
    </form>
</div>
@endsection
