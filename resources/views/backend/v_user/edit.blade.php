@extends('backend.v_layouts.app')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title mb-2">{{ $judul }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="/user/{{ $edit->id }}" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                {{-- div left --}}
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    {{-- view image --}}
                                                    @if ($edit->foto)
                                                        <img src="{{ asset('storage/img-user/' . $edit->foto) }}"
                                                            class="foto-preview" width="100%">
                                                        <p></p>
                                                    @else
                                                        <img src="{{ asset('storage/img-user/img-default.jpg') }}"
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
                                            <div class="col-md-8">
                                                {{-- div right --}}
                                                <div class="form-group">
                                                    <label>Hak Ases</label>
                                                    <select name="is_admin"
                                                        class="form-control @error('is_admin') is-invalid @enderror">
                                                        <option value=""
                                                            {{ old('is_admin', $edit->is_admin) == '' ? 'selected' : '' }}>
                                                            -
                                                            Pilih Hak Akses -</option>
                                                        <option value="0"
                                                            {{ old('is_admin', $edit->is_admin) == '0' ? 'selected' : '' }}>
                                                            Admin</option>
                                                        <option value="1"
                                                            {{ old('is_admin', $edit->is_admin) == '1' ? 'selected' : '' }}>
                                                            Super Admin</option>
                                                    </select>
                                                    @error('is_admin')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama"
                                                        value="{{ old('nama', $edit->nama) }}"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Masukkan Nama">
                                                    @error('nama')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email"
                                                        value="{{ old('email', $edit->email) }}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Masukkan Email">
                                                    @error('email')
                                                        <span class="invalid-feedback alert-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>HP</label>
                                                    <input type="text" onkeypress="return hanyaAngka(event)"
                                                        name="hp" value="{{ old('hp', $edit->hp) }}"
                                                        class="form-control @error('hp') is-invalid @enderror"
                                                        placeholder="Masukkan Nomor HP">
                                                    @error('hp')
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
                                            <button type="submit" class="btn btn-success text-white" id="simpanButton">
                                                Perbaharui
                                            </button>
                                            <a href="{{ route('user.index') }}">
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
@endsection
