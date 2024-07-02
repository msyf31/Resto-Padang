@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title mb-2">{{ $judul }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="/makanan" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{-- div left --}}
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <img class="foto-preview">
                                                    <input type="file" name="foto"
                                                        class="form-control @error('foto') is-invalid @enderror"
                                                        onchange="previewFoto()">
                                                    @error('foto')
                                                        <div class="invalid-feedback alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                {{-- div right --}}

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Nama Makanan</label>
                                                        <input type="text" name="nama_makanan"
                                                            value="{{ old('nama_makanan') }}"
                                                            class="form-control @error('nama_makanan') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Makanan">
                                                        @error('nama_makanan')
                                                            <span class="invalid-feedback alert-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <input type="text" name="harga_makanan"
                                                        value="{{ old('harga_makanan') }}"
                                                        class="form-control @error('harga_makanan') is-invalid @enderror"
                                                        placeholder="Masukkan Harga Makanan">
                                                    @error('harga_makanan')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Detail Makanan</label>
                                                    <input type="text" name="deskripsi_makanan"
                                                        value="{{ old('deskripsi_makanan') }}"
                                                        class="form-control @error('deskripsi_makanan') is-invalid @enderror"
                                                        placeholder="Masukkan Detail Makanan">
                                                    @error('deskripsi_makanan')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success text-white">
                                                Simpan
                                            </button>
                                            <a href="{{ route('makanan.index') }}">
                                                <button type="button" class="btn btn-danger">
                                                    Kembali
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.box-content -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end template-->
@endsection
