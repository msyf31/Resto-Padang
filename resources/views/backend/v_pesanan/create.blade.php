@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/pesanan" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $sub }}</h4>

                        <div class="form-group">
                            <label>ID Customer</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                id="user">
                                <option value="" selected>-- Pilih ID Customer --</option>
                                @foreach ($user as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <select class="form-control @error('produk_id') is-invalid @enderror" name="produk_id"
                                id="produk">
                                <option value="" selected>-- Pilih ID Customer --</option>
                                @foreach ($produk as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_produk }}</option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" class="form-control @error('harga_produk') is-invalid @enderror"
                                name="harga_produk" id="harga_produk" readonly>
                            @error('harga_produk')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status Barang</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">-- Status --</option>
                                <option value="0">Menunggu</option>
                                <option value="1"> Diterima</option>
                                <option value="2"> Selesai</option>
                            </select>
                            @error('status')
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
                            <a href="{{ route('pesanan.index') }}">
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
        document.getElementById('produk').addEventListener('change', function() {
            var produkId = this.value;
            if (produkId) {
                fetch(`/get-produk/${produkId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('harga_produk').value = data.harga_produk;
                    });
            } else {
                document.getElementById('harga_produk').value = '';
            }
        });
    </script>
@endsection
