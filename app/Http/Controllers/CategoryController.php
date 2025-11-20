<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori dengan fitur pencarian dan paginasi.
     */
    public function index(): View
    {
        $categories = Category::when(request('search'), function($query) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        })->paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Menampilkan formulir untuk membuat kategori baru.
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Category::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit kategori.
     * PERHATIAN: Ada dua deklarasi fungsi 'edit' di kode asli Anda. Saya hanya menggunakan yang pertama.
     */
    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Mengupdate kategori yang sudah ada di database.
     * (Saya menghapus duplikasi fungsi 'edit' di sini)
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category->update([
            'nama' => $request->nama,
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}