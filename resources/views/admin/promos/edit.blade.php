@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Promo</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.promos.update', $promo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Promo</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $promo->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label">Diskon (%)</label>
            <input type="number" name="discount" class="form-control" value="{{ old('discount', $promo->discount) }}" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $promo->start_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $promo->end_date) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Promo</button>
        <a href="{{ route('admin.promos.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
