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
                                <form action="/customer/{{ $edit->id }}" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{-- div left --}}
                                                <div class="col-md-4">
                                                    {{-- div left --}}
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        {{-- view image --}}
                                                        @if ($edit->foto)
                                                            <img src="{{ asset('storage/img-customer/' . $edit->foto) }}"
                                                                class="foto-preview" width="100%">
                                                            <p></p>
                                                        @else
                                                            <img src="{{ asset('storage/img-customer/img-default.jpg') }}"
                                                                class="foto-preview" width="100%">
                                                            <p></p>
                                                        @endif
                                                        {{-- file foto --}}
                                                        <input type="file" name="foto"
                                                            class="form-control @error('foto') is-invalid @enderror"
                                                            onchange="previewFoto()">
                                                        @error('foto')
                                                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                {{-- div right --}}

                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_customer') is-invalid @enderror"
                                                        name="nama_customer"
                                                        value="{{ old('nama_customer', $edit->nama_customer) }}"
                                                        id="nama_customer">
                                                    @error('nama_customer')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>HP</label>
                                                    <input type="text" name="hp_customer"
                                                        value="{{ old('hp_customer', $edit->hp_customer) }}"
                                                        class="form-control @error('hp_customer') is-invalid @enderror"
                                                        id="hp_customer">
                                                    @error('hp_customer')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email_customer') is-invalid @enderror"
                                                        name="email_customer"
                                                        value="{{ old('email_customer', $edit->email_customer) }}"
                                                        id="email_customer">
                                                    @error('email_customer')
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
                                            <a href="{{ route('customer.index') }}">
                                                <button type="button" class="btn btn-danger">
                                                    Kembali
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- template end-->
@endsection
