<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $produks = [
            [
                'nama_produk' => 'Sepatu Sneakers Pria',
                'kategori' => 'Fashion',
                'harga' => 350000,
                'stok' => 25,
                'deskripsi' => 'Sepatu sneakers casual untuk pria, bahan kanvas berkualitas dengan sol karet anti slip.',
            ],
            [
                'nama_produk' => 'Headphone Bluetooth',
                'kategori' => 'Elektronik',
                'harga' => 275000,
                'stok' => 40,
                'deskripsi' => 'Headphone wireless dengan koneksi Bluetooth 5.0, baterai tahan hingga 20 jam.',
            ],
            [
                'nama_produk' => 'Tas Ransel Laptop',
                'kategori' => 'Fashion',
                'harga' => 189000,
                'stok' => 15,
                'deskripsi' => 'Tas ransel dengan kompartemen laptop 15 inch, bahan water resistant.',
            ],
            [
                'nama_produk' => 'Mouse Wireless',
                'kategori' => 'Elektronik',
                'harga' => 95000,
                'stok' => 60,
                'deskripsi' => 'Mouse wireless ergonomis dengan receiver USB, resolusi hingga 1600 DPI.',
            ],
            [
                'nama_produk' => 'Botol Minum Stainless',
                'kategori' => 'Rumah Tangga',
                'harga' => 75000,
                'stok' => 0,
                'deskripsi' => 'Botol minum stainless steel 750ml, menjaga suhu minuman hingga 12 jam.',
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
