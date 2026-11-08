<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('cari');

        $produks = Produk::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('nama_produk', 'like', "%{$keyword}%")
                        ->orWhere('kategori', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.produk.index', compact('produks', 'keyword'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $validated['gambar'] = $this->storeImage($request);

        Produk::create($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate($this->rules($produk->id));

        if ($request->hasFile('gambar')) {
            $this->deleteImage($produk->gambar);
            $validated['gambar'] = $this->storeImage($request);
        }

        $produk->update($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $this->deleteImage($produk->gambar);
        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function rules(?int $produkId = null): array
    {
        return [
            'nama_produk' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                Rule::requiredIf($produkId === null),
            ],
        ];
    }

    private function storeImage(Request $request): ?string
    {
        if (!$request->hasFile('gambar')) {
            return null;
        }

        return $request->file('gambar')->store('produk', 'public');
    }

    private function deleteImage(?string $path): void
    {
        if ($path && File::exists(storage_path("app/public/{$path}"))) {
            File::delete(storage_path("app/public/{$path}"));
        }
    }
}
