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
                                <form action="/dinein" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID User</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror"
                                                name="user_id" id="user">
                                                <option value="" selected>-- Pilih ID User --</option>
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
                                            <label>ID Customer</label>
                                            <select class="form-control @error('customer_id') is-invalid @enderror"
                                                name="customer_id" id="customer">
                                                <option value="" selected>-- Pilih ID Customer --</option>
                                                @foreach ($customer as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nama_customer }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Tanggal Dine In</label>
                                                <input type="date" name="tanggal_dinein"
                                                    value="{{ old('tanggal_dinein') }}"
                                                    class="form-control @error('tanggal_dinein') is-invalid @enderror"
                                                    placeholder="Masukkan Tanggal Dine In">
                                                @error('tanggal_dinein')
                                                    <span class="invalid-feedback alert-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Jam Booking</label>
                                            <input type="time" name="jam_dinein" value="{{ old('jam_dinein') }}"
                                                class="form-control @error('jam_dinein') is-invalid @enderror"
                                                placeholder="Masukkan Harga Makanan">
                                            @error('jam_dinein')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <select name="pembayaran_dinein"
                                                class="form-control @error('pembayaran_dinein') is-invalid @enderror">
                                                <option value="">-- Pilih Pembayaran --</option>
                                                <option value="0">Cash</option>
                                                <option value="1">Transfer</option>
                                            </select>
                                            @error('pembayaran_dinein')
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
                                            <a href="{{ route('dinein.index') }}">
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
