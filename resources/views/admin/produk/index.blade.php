@extends('layouts.admin')

@section('title', 'Data Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0"><i class="bi bi-box-seam"></i> Data Produk</h4>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Produk
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <form method="GET" action="{{ route('admin.produk.index') }}" class="row g-2">
            <div class="col-auto flex-grow-1">
                <input type="text" name="cari" class="form-control"
                       placeholder="Cari nama produk atau kategori..."
                       value="{{ $keyword }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
            @if ($keyword)
                <div class="col-auto">
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            @endif
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px">No</th>
                        <th style="width: 90px">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Stok</th>
                        <th style="width: 160px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produks as $produk)
                        <tr>
                            <td>{{ $produks->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                                         alt="{{ $produk->nama_produk }}"
                                         class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary bg-opacity-25 rounded d-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px;">
                                        <i class="bi bi-image text-secondary"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td><span class="badge bg-info text-dark">{{ $produk->kategori }}</span></td>
                            <td class="text-end">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                @if ($produk->stok == 0)
                                    <span class="badge bg-danger">Habis</span>
                                @else
                                    <span class="badge bg-success">{{ $produk->stok }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.produk.show', $produk) }}"
                                       class="btn btn-outline-secondary" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.produk.edit', $produk) }}"
                                       class="btn btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus produk {{ $produk->nama_produk }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Menampilkan {{ $produks->firstItem() ?? 0 }}–{{ $produks->lastItem() ?? 0 }}
                dari {{ $produks->total() }} produk
            </small>
            {{ $produks->links() }}
        </div>
    </div>
</div>
@endsection
