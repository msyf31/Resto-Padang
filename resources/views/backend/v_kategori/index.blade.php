@extends('backend.v_layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $sub }}<br><br>

                        <a href="/kategori/create" title="Tambah Data">
                            <span class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</span>
                        </a>
                    </h5>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table-striped table-bordered table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Jenis Kategori</th>
                                    <th>Id Promo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $row->nama_kategori }} </td>
                                        <td> {{ $row->jenis_kategori }} </td>
                                        <td> {{ $row->id_promo }} </td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $row->id) }}" title="Ubah Data">
                                                <span class="btn btn-success btn-sm show_edit"><i
                                                        class="fa fa-edit"></i>Ubah</span>
                                            </a>
                                            <form method="POST" action="{{ route('kategori.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-danger btn-sm show_confirm"
                                                    data-toggle="tooltip" title='Delete'
                                                    data-konf-delete="{{ $row->nama_kategori }}"><i
                                                        class="fa fa-trash"></i>Hapus</button></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
