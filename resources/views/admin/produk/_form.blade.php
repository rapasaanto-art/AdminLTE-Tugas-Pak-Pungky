@csrf

<div class="mb-3">
    <label for="nama_produk" class="form-label">Nama Produk <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
           id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
           placeholder="Contoh: Sepatu Sneakers">
    @error('nama_produk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
               id="kategori" name="kategori" value="{{ old('kategori', $produk->kategori ?? '') }}"
               placeholder="Contoh: Elektronik">
        @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" min="0" class="form-control @error('harga') is-invalid @enderror"
               id="harga" name="harga" value="{{ old('harga', $produk->harga ?? '') }}"
               placeholder="0">
        @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
        <input type="number" min="0" class="form-control @error('stok') is-invalid @enderror"
               id="stok" name="stok" value="{{ old('stok', $produk->stok ?? '') }}"
               placeholder="0">
        @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
              name="deskripsi" rows="4"
              placeholder="Deskripsi singkat produk">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gambar" class="form-label">Gambar Produk @unless (isset($produk)) <span class="text-danger">*</span> @endunless</label>
    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
           id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp">
    <div class="form-text">Format: JPG, PNG, atau WEBP. Maksimal 2 MB.</div>
    @error('gambar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i> {{ $submitLabel ?? 'Simpan' }}
    </button>
    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i> Batal
    </a>
</div>
