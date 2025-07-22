@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Promo</h2>

    <form action="{{ route('admin.promos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Judul Promo</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Diskon (%)</label>
            <input type="number" name="discount" class="form-control" min="0" max="100" required>
        </div>

        <div class="form-group mt-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
         <div class="form-group mt-3">
            <label>Kode Kupon</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button class="btn btn-success mt-4">Simpan</button>
        <a href="{{ route('admin.promos.index') }}" class="btn btn-secondary mt-4">Batal</a>
    </form>
</div>
@endsection
