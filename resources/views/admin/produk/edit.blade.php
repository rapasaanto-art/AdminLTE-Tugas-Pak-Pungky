@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<h4 class="mb-3"><i class="bi bi-pencil-square"></i> Edit Produk</h4>

<div class="card shadow-sm">
    <div class="card-body">
        @if ($produk->gambar)
            <div class="mb-3">
                <label class="form-label d-block">Gambar saat ini</label>
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                     class="rounded border" style="width: 120px; height: 120px; object-fit: cover;">
                <div class="form-text">Unggah gambar baru untuk menggantinya.</div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.produk.update', $produk) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.produk._form', ['submitLabel' => 'Perbarui Produk'])
        </form>
    </div>
</div>
@endsection
