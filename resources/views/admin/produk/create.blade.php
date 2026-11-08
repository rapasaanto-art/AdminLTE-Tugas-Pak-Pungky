@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<h4 class="mb-3"><i class="bi bi-plus-circle"></i> Tambah Produk</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data">
            @include('admin.produk._form', ['submitLabel' => 'Simpan Produk'])
        </form>
    </div>
</div>
@endsection
