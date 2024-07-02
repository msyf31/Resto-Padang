@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/kategori" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $sub }}</h4>

                        <div class="form-group">
                            <label>ID Promo</label>
                            <select class="form-control @error('id_promo') is-invalid @enderror" name="id_promo"
                                id="promo">
                                <option value="" selected>-- Pilih ID Promo --</option>
                                @foreach ($promo as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_promo }}</option>
                                @endforeach
                            </select>
                            @error('id_promo')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori"
                                value="{{ old('nama_kategori', $edit->nama_kategori) }}"
                                class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan Nama Kategori">
                            @error('nama_kategori')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Jenis Kategori</label>
                            <input type="text" name="jenis_kategori"
                                value="{{ old('jenis_kategori', $edit->jenis_kategori) }}"
                                class="form-control @error('jenis_kategori') is-invalid @enderror"
                                placeholder="Masukkan Jenis Kategori">
                            @error('jenis_kategori')
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
                            <a href="{{ route('kategori.index') }}">
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
    <!-- end template-->
    <script>
        document.getElementById('promo').addEventListener('change', function() {
            var Idpromo = this.value;
            if (Idpromo) {
                fetch(`/get-promo/${Idpromo}`);
                .then(response => response.json())
                    .then(data => {
                        document.getElementById('nama_promo').value = data.nama_promo;
                    });
            } else {
                document.getElementById('nama_promo').value = '';
            }
        });
    </script>
@endsection
