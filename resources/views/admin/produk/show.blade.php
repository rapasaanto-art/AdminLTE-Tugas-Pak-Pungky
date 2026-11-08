@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><i class="bi bi-eye"></i> Detail Produk</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.produk.edit', $produk) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if ($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                         class="img-fluid rounded border" style="max-height: 280px; object-fit: cover;">
                @else
                    <div class="bg-secondary bg-opacity-25 rounded d-flex align-items-center justify-content-center"
                         style="height: 200px;">
                        <i class="bi bi-image text-secondary fs-1"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 160px">Nama Produk</th>
                        <td>: {{ $produk->nama_produk }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <span class="badge bg-info text-dark">{{ $produk->kategori }}</span></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>:
                            @if ($produk->stok == 0)
                                <span class="badge bg-danger">Habis</span>
                            @else
                                <span class="badge bg-success">{{ $produk->stok }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{ $produk->deskripsi ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>: {{ $produk->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir diubah</th>
                        <td>: {{ $produk->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
