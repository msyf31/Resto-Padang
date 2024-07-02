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
                                <form action="/promo" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Promo</label>
                                            <input type="text" name="nama_promo" value="{{ old('nama_promo') }}"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan Nama Promo">
                                            @error('nama_promo')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Diskon Promo</label>
                                            <input type="text" name="diskon_promo" value="{{ old('diskon_promo') }}"
                                                class="form-control @error('diskon_promo') is-invalid @enderror"
                                                placeholder="Masukkan Diskon Promo">
                                            @error('diskon_promo')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Deskripsi Promo</label>
                                            <input type="text" name="deskripsi_promo"
                                                value="{{ old('deskripsi_promo') }}"
                                                class="form-control @error('deskripsi_promo') is-invalid @enderror"
                                                placeholder="Masukkan Diskon Promo">
                                            @error('deskripsi_promo')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success text-white">
                                                Simpan
                                            </button>
                                            <a href="{{ route('promo.index') }}">
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
