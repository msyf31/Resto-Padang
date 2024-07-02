@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/produk/{{ $edit->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <h4 class="card-title">{{ $sub }}</h4>

                        <div class="row">
                            <div class="col-md-4">
                                {{-- div left --}}
                                <div class="form-group">
                                    <label>Foto</label>
                                    {{-- view image --}}

                                    <img src="{{ asset('storage/img-produk/' . $edit->foto) }}" class="foto-preview"
                                        width="100%">
                                    <p></p>

                                    {{-- file foto --}}
                                    <input type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
                                    @error('foto')
                                        <div class="invalid-feedback alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{-- div right --}}

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori_id">
                                        <option value="" selected>--Pilih Kategori--</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}"> {{ $k->nama_kategori }} </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_produk"
                                        value="{{ old('nama_produk', $edit->nama_produk) }}"
                                        class="form-control @error('nama_produk') is-invalid @enderror"
                                        placeholder="Masukkan Nama Prod">
                                    @error('nama_produk')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Detail</label><br>
                                    <textarea name="detail_produk" class="form-control @error('detail_produk') is-invalid @enderror" id="ckeditor">{{ old('detail_produk', $edit->detail_produk) }}</textarea>
                                    @error('detail_produk')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" name="harga_produk"
                                        value="{{ old('harga_produk', $edit->harga_produk) }}"
                                        class="form-control @error('harga_produk') is-invalid @enderror"
                                        placeholder="Masukkan Harga Produk">
                                    @error('harga_produk')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" name="stok_produk"
                                        value="{{ old('stok_produk', $edit->stok_produk) }}"
                                        class="form-control @error('stok_produk') is-invalid @enderror"
                                        placeholder="Masukkan Stok Produk">
                                    @error('stok_produk')
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
                            <a href="{{ route('produk.index') }}">
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
    <!-- template end-->
@endsection
