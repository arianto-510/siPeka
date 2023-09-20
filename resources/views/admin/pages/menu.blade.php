@extends('admin.layouts.index')

@section('content')
    <!-- Page Heading -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Daftar Menu</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
        </div>
        <div class="card-body">
            <button type="submit" class="btn btn-success mb-2" data-toggle="modal" data-target="#tambahMenu">
                Menu Baru
            </button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $menu->nama }}</td>
                                <td><img src="{{ asset('storage/') }}/{{ $menu->gambar }}" alt="{{ $menu->nama }}"
                                        width="150px"></td>
                                <td>{{ $menu->harga }}</td>
                                <td>
                                    <form action="/deletemenu/{{ $menu->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Yakin akan menghapus item?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $id++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="/tambahmenu" method="post" enctype="multipart/form-data">
        <!-- Modal -->
        @csrf
        <div class="modal fade" id="tambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text"
                                class="form-control @error('nama')
                            is-invalid
                            @enderror"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga"
                                class="form-control @error('harga')
                                is-invalid
                            @enderror"
                                value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01"
                                        name="gambar">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            @error('gambar')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
