@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Promo</h2>

    <a href="{{ route('admin.promos.create') }}" class="btn btn-primary mb-3">Tambah Promo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Diskon (%)</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promos as $promo)
            <tr>
                <td>{{ $promo->title }}</td>
                <td>{{ $promo->discount }}%</td>
                <td>{{ $promo->start_date }}</td>
                <td>{{ $promo->end_date }}</td>
                <td>
                    <a href="{{ route('admin.promos.edit', $promo) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.promos.destroy', $promo) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
