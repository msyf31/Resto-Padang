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
                                <form action="/dinein/{{ $edit->id }}" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID User</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror"
                                                name="user_id_display" id="user" disabled>
                                                <option value=""
                                                    {{ old('user_id', $edit->user_id) == '' ? 'selected' : '' }}>-- Pilih ID
                                                    User --</option>
                                                @foreach ($user as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ old('user_id', $edit->user_id) == $row->id ? 'selected' : '' }}>
                                                        {{ $row->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="user_id"
                                                value="{{ old('user_id', $edit->user_id) }}">
                                            @error('user_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>ID Customer</label>
                                            <select class="form-control @error('customer_id') is-invalid @enderror"
                                                name="customer_id_display" id="customer" disabled>
                                                <option value=""
                                                    {{ old('customer_id', $edit->customer_id) == '' ? 'selected' : '' }}>--
                                                    Pilih ID Customer --</option>
                                                @foreach ($customer as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ old('customer_id', $edit->customer_id) == $row->id ? 'selected' : '' }}>
                                                        {{ $row->nama_customer }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="customer_id"
                                                value="{{ old('customer_id', $edit->customer_id) }}">
                                            @error('customer_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Tanggal Booking</label>
                                                <input type="date" name="tanggal_dinein"
                                                    value="{{ old('tanggal_dinein', $edit->tanggal_dinein) }}"
                                                    class="form-control @error('tanggal_dinein') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Makanan" readonly>
                                                @error('tanggal_dinein')
                                                    <span class="invalid-feedback alert-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Jam Booking</label>
                                            <input type="time" name="jam_dinein"
                                                value="{{ old('jam_dinein', $edit->jam_dinein) }}"
                                                class="form-control @error('jam_dinein') is-invalid @enderror"
                                                placeholder="Masukkan Harga Makanan" readonly>
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
                                                <option value=""
                                                    {{ old('pembayaran_dinein', $edit->pembayaran_dinein) == '' ? 'selected' : '' }}>
                                                    -
                                                    Pilih Pembayaran -</option>
                                                <option value="0"
                                                    {{ old('pembayaran_dinein', $edit->pembayaran_dinein) == '0' ? 'selected' : '' }}>
                                                    Cash</option>
                                                <option value="1"
                                                    {{ old('pembayaran_dinein', $edit->pembayaran_dinein) == '1' ? 'selected' : '' }}>
                                                    Transfer</option>
                                            </select>
                                            @error('pembayaran_dinein')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value=""
                                                    {{ old('status', $edit->status) == '' ? 'selected' : '' }}>
                                                    -
                                                    Status -</option>
                                                <option value="0"
                                                    {{ old('status', $edit->status) == '0' ? 'selected' : '' }}>
                                                    Proses</option>
                                                <option value="1"
                                                    {{ old('status', $edit->status) == '1' ? 'selected' : '' }}>
                                                    Selesai</option>
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
