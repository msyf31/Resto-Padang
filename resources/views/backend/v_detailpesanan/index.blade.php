@extends('backend.v_layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $sub }}<br><br>
                        <a href="/detailpesanan/create" title="Tambah Data">
                            <span class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</span>
                        </a>
                        <a href="/unduh-pdf" title="Tambah Data" target="_blank">
                            <span class="btn btn-secondary"><i class="fa fa-print"></i> Cetak PDF</span>
                        </a>
                    </h5>
                    <br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table-striped table-bordered table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pesanan</th>
                                    <th>Nama Produk</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $row->pesanan->id }}</td>
                                        <td>{{ $row->pesanan->produk->nama_produk }}</td>
                                        <td>{{ $row->pesanan->user->nama }}</td>
                                        <td>Rp. {{ number_format($row->pesanan->produk->harga_produk, 0, ',', '.') }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            @if ($row->status == 2)
                                                Paket Diterima
                                            @elseif ($row->status == 1)
                                                Dalam Perjalanan
                                            @else
                                                Sedang Proses
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('detailpesanan.edit', $row->id) }}" title="Ubah Data">
                                                <span class="btn btn-success btn-sm show_edit"><i
                                                        class="fa fa-edit"></i>Ubah</span>
                                            </a>
                                            <form method="POST" action="{{ route('detailpesanan.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-danger btn-sm show_confirm"
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
            </div>
        </div>
    </div>
@endsection
