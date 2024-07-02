@extends('backend.v_layouts.app')
@section('content')
<!-- template -->

<div class="col-xs-12">

    <div class="box-content">

        <h4 class="box-title"> {{$judul}} <br><br>
            <a href="/anggota/create">
                <button type="button" class="btn btn-icon btn-icon-left btn-info btn-xs waves-effect waves-light">
                    <i class="ico fa fa-plus"></i>Tambah</button>
            </a>
        </h4>

        <!-- /.box-title -->

        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($index as $row)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{$row->user->email}} </td>
                    <td> {{$row->user->nama}} </td>
                    <td> {{$row->user->hp}} </td>
                    <td>
                        <!-- <a href="/anggota/{{ $row->id }}/edit/">
                                <button type="button">Ubah</button>
                            </a>
                            <form id="delete-form-{{ $row->id }}" action="/anggota/{{ $row->id }}" method="POST" style="display: inline-block;">
                                @method('delete')
                                @csrf
                                <button type="submit">Hapus</button>
                            </form> -->

                        <a href="/anggota/{{ $row->id }}/edit" title="Ubah Data">
                            <span class="label label-primary"><i class="fa fa-edit"></i> Ubah</span>
                        </a>
                        <form method="POST" action="{{ route('anggota.destroy', $row->id) }}" style="display: inline-block;">
                            @method('delete')
                            @csrf
                            <button type="button" class="label label-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' data-konf-delete="{{ $row->nama }}"><i class="fa fa-trash"></i>Hapus</button></button>
                        </form>
                        <!-- |
                            <a href="#" title="Ubah Data">
                                <span class="badge bg-primary">
                                    <i class="fa fa-edit"></i>Ubah 2</span>
                            </a>
                            |
                            <a href="#" title="Ubah Data">
                                <span class="badge bg-primary">
                                    <i class="bi bi-pencil-square"></i> Ubah 3</span>
                            </a>
                            <a href="#" title="Hapus Data">
                                <span class="badge bg-danger"><i class="bi bi-trash"></i> Hapus 3</span>
                            </a>
                            |
                            <a href="#" title="Ubah Data">
                                <span class="badge badge-primary"><i class="fa fa-edit"></i> Ubah 4</span>
                            </a>
                            <a href="#" title="Hapus Data">
                                <span class="badge badge-danger"><i class="fa fa-trash"></i> Hapus 4</span>
                            </a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>



<!-- end template-->
@endsection