<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index(): View
    {
        return view('products.index');
    }

    /**
     * Menampilkan form tambah produk.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // max 2MB
            ]);
        // Logika untuk menyimpan data produk akan ditambahkan di sini
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product')); // Meneruskan objek product ke view
    }

    /**
     * Mengupdate produk.
     */
    public function update(Request $request, Product $product)
    {
        // Logika untuk mengupdate data produk akan ditambahkan di sini
    }

    /**
     * Menghapus produk.
     */
    public function destroy(Product $product)
    {
        // Logika untuk menghapus data produk akan ditambahkan di sini
    }
}