@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Produk' => route('products.index'),
        'Tambah Produk' => ''
    ]" />

    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Tambah Produk Baru</h5>
                </div>
                <div class="card-body">
                    {{-- Pastikan method POST dan enctype untuk upload file --}}
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        {{-- Input FOTO --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="inputFoto">Foto Produk</label>
                            <div class="col-sm-10">
                                <input
                                    type="file"
                                    name="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    id="inputFoto"
                                    aria-label="Upload Foto"
                                />
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Input NAMA --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="inputNama">Nama Produk</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-package"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        id="inputNama"
                                        placeholder="Silahkan isi nama produk"
                                        aria-label="Silahkan isi nama produk"
                                        aria-describedby="basic-icon-default-fullname2"
                                    />
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Input DESKRIPSI --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="inputDeskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text">
                                        <i class="bx bx-comment-detail"></i>
                                    </span>
                                    <textarea
                                        id="inputDeskripsi"
                                        name="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Silahkan isi deskripsi produk"
                                        aria-label="Silahkan isi deskripsi produk"
                                        aria-describedby="basic-icon-default-message2"
                                    ></textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Input HARGA --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="inputHarga">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text">
                                        <i class="bx bx-dollar-circle"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="harga"
                                        id="inputHarga"
                                        class="form-control phone-mask @error('harga') is-invalid @enderror"
                                        placeholder="1,000,00"
                                        aria-label="Harga"
                                        aria-describedby="basic-icon-default-phone2"
                                    />
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Input STOK --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="inputStok">Stok</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-stok2" class="input-group-text">
                                        <i class="bx bx-package"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="stok"
                                        id="inputStok"
                                        class="form-control phone-mask @error('stok') is-invalid @enderror"
                                        placeholder="10"
                                        aria-label="Stok"
                                        aria-describedby="basic-icon-default-stok2"
                                    />
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection