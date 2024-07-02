<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Jumlah yang harus dibayarkan</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unduhPDF as $row)
                <tr>
                    <td> {{ $loop->iteration }}</td>
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
                </tr>
            @endforeach
        </tbody>

    </table>

</html>
</body>
