@extends('backend.v_layouts.app')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title mb-2">{{ $judul }}</h2>
                    <a href="/booking/create">
                        <button type="button" class="btn btn-outline-primary">Tambah</button>
                    </a>
                    </h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="datatables table" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Booking</th>
                                                <th>Jam Booking</th>
                                                <th>Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($index as $row)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td> {{ \Carbon\Carbon::parse($row->tanggal_booking)->format('d-m-Y') }} </td>
                                                    <td> {{ \Carbon\Carbon::parse($row->jam_booking)->format('H:i') }} WIB</td>
                                                    <td>
                                                        @if ($row->pembayaran_booking == 0)
                                                            Cash
                                                        @elseif ($row->pembayaran_booking == 1)
                                                            Transfer
                                                        @else
                                                            Error
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('booking.edit', $row->id) }}" title="Ubah Data">
                                                            <span class="btn btn-success btn-sm show_edit"><i
                                                                    class="fa fa-edit"></i>Ubah</span>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('booking.destroy', $row->id) }}"
                                                            style="display: inline-block;">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm show_confirm"
                                                                data-toggle="tooltip" title='Delete'
                                                                data-konf-delete="{{ $row->id }}"><i
                                                                    class="fa fa-trash"></i>Hapus</button></button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end section -->
@endsection
