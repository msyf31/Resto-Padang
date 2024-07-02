@extends('backend.v_layouts.app')
@section('content')
<!-- template -->

<div class="col-lg-12 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">{{ $judul }}</h4>
        <!-- /.box-title -->
        <div class="card-content">
            <form action="/anggota" method="post">
                @csrf
                <div class="form-group">
                    <label>ID User</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user">
                        <option value="" selected>-- Pilih ID User --</option>
                        @foreach ($user as $row)
                        <option value="{{ $row->id }}">{{ $row->email }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" readonly>
                    @error('nama')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Gander</label>
                    <select name="gander" class="form-control @error('gander') is-invalid @enderror">
                        <option value="" {{ old('gander') == '' ? 'selected' : '' }}> - Pilih Gender
                            -
                        </option>
                        <option value="L" {{ old('gander') == 'L' ? 'selected' : '' }}> Laki-Laki</option>
                        <option value="P" {{ old('gander') == 'P' ? 'selected' : '' }}> Perempuan
                        </option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir">
                    @error('tgl_lahir')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Lengkap">
                    @error('alamat')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text" name="kode_pos" id="" value="{{ old('kode_pos') }}" class="form-control form-control-lg @error('kode_pos') is-invalid @enderror" placeholder="Masukkan kode_pos">
                    @error('kode_pos')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <br>
                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Simpan</button>
                <a href="{{ route('anggota.index') }}">
                    <button type="button" class="btn waves-effect btn-sm waves-effect waves-light">Kembali</button>
                </a>

            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>

<script>
    document.getElementById('user').addEventListener('change', function() {
        var userId = this.value;
        if (userId) {
            fetch(`/get-user/${userId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama').value = data.nama;
                });
        } else {
            document.getElementById('nama').value = '';
        }
    });
</script>
<!-- end template-->
@endsection