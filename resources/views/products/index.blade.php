@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Produk' => route('products.index'),
        'Daftar Produk' => ''
    ]" />

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Produk</h5>

            <form action="{{ route('products.index') }}" method="GET" class="d-flex" style="width: 300px;">
                <input
                    type="text"
                    name="search"
                    class="form-control me-2"
                    placeholder="Cari..."
                    value="{{ request('search') }}"
                >
                <button class="btn btn-primary btn-sm" type="submit">
                    <i class="bx bx-search"></i>
                </button>
                {{-- <button class="btn btn-primary btn-sm" type="submit"> - TAG GANDA DIHAPUS --}}
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh Data Baris 1 --}}
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="../assets/img/avatars/5.png" alt="Produk 1" class="img-thumbnail" width="80">
                            </td>
                            <td>Meja Kantor Kayu</td>
                            <td>Meja kantor berbahan kayu jati berkualitas tinggi.</td>
                            <td>Rp 2.500.000</td>
                            <td>10</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>

                        {{-- Contoh Data Baris 2 (Mengoreksi src=".. pada tag img) --}}
                        <tr>
                            <td>2</td>
                            <td>
                                <img src="../assets/img/avatars/5.png" alt="Produk 2" class="img-thumbnail" width="80">
                            </td>
                            <td>Kursi Ergonomis</td>
                            <td>Kursi kantor ergonomis dengan penyangga punggung yang nyaman.</td>
                            <td>Rp 1.250.000</td>
                            <td>15</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>
                        
                        {{-- Contoh Data Baris 3 (Mengoreksi kolom No) --}}
                        <tr>
                            <td>3</td>
                            <td>
                                <img src="../assets/img/avatars/5.png" alt="Produk 3" class="img-thumbnail" width="80">
                            </td>
                            <td>Lemari Arsip Besi</td>
                            <td>Lemari arsip besi 4 pintu untuk menyimpan dokumen penting.</td>
                            <td>Rp 3.750.000</td>
                            <td>5</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item first">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevrons-left"></i>
                            </a>
                        </li>
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevron-right"></i>
                            </a>
                        </li>
                        <li class="page-item last">
                            <a class="page-link" href="javascript:void(0);">
                                <i class="tf-icon bx bx-chevrons-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
    </div>
</div>
@endsection