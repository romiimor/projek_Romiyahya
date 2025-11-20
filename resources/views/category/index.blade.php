@extends('layouts.sneat')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Kategori' => route('category.index'),
        'Daftar Kategori' => ''
    ]" />

    @if(session('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <h5 class="mb-0">Daftar Kategori</h5>
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-plus"></i> Tambah Data
                </a>
            </div>

            <form action="{{ route('category.index') }}" method="GET" class="d-flex" style="width: 300px;">
                <input
                    type="text"
                    name="search"
                    class="w-75 pr-10 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 me-2"
                    placeholder="Cari..."
                    value="{{ request('search') }}"
                >
                <button class="btn btn-primary btn-sm" type="submit">
                    <i class="bx bx-search"></i>
                </button>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger"
                                        onclick="deleteConfirm('{{ $category->id }}', '{{ $category->nama }}')"
                                    >
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirm(id, nama) {
        Swal.fire({
            title: 'Yakin mau hapus kategori ' + nama + '?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush