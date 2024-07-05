<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .container {
            /* border: 1px solid black; */
            /* padding: 10px; */
            /* margin: 10px; */
            width: 100%;
        }

        .center {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }

        .table-center {
            display: table;
            margin: auto;
        }

        .table-center table {
            width: 100%;
        }

        .table-center td {
            padding: 10px;
            font-size: 18px;
        }

        .table-center th {
            padding: 10px;
            font-size: 18px;
            background-color: rgb(214, 250, 13);
        }

        .table-footer {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="center">
            <p>LAPORAN REKAP KEUANGAN TANAH</p>
            <h2>PERUMAHAN (KAVLING) AL - MADINAH 3</h2>
            <p>DESA KARYA INDAH, KEC. TAPUNG, KAB. KAMPAR</p>
        </div>

        <div class="table-center">

            <p>
                {{-- Bulan : <i>
                    {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('F Y') }}
                </i> --}}
                PT. Abu Umar Property
            </p>

            <table cellspacing="0" border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Blok</th>
                    <th>QTT</th>
                    <th>Harga Deal</th>
                    {{-- <th>Telah Disetor</th>
                    <th>Sisa Hutang</th> --}}
                    <th>Angsuran Bulanan</th>
                    {{-- <th>Angsuran Ke</th> --}}
                    <th>Tenor</th>
                    {{-- <th>Keterangan</th> --}}
                    <th>Status</th>
                </tr>

                @foreach ($all_data as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->blok }}</td>
                        <td>{{ $data->kuantitas }}</td>
                        <td>Rp. {{ number_format($data->harga_setelah_pemotongan, 0, ',', '.') }}</td>
                        {{-- <td>lkdsjfds</td>
                        <td>lskdfds</td> --}}
                        <td>Rp. {{ number_format($data->besar_angsuran, 0, ',', '.') }}</td>
                        {{-- <td>{{ $data->angsuran_ke }}</td> --}}
                        <td>{{ $data->tenor }}</td>
                        {{-- <td>{{ $data->keterangan }}</td> --}}
                        <td>{{ $data->purchase->nama }}</td>
                    </tr>
                @endforeach

                <tr class="table-footer" style="background-color: rgb(214, 250, 13);">
                    <td colspan="3">Jumlah</td>
                    <td>{{ $all_data->sum('kuantitas') }}</td>
                    <td>Rp. {{ number_format($all_data->sum('harga_setelah_pemotongan'), 0, ',', '.') }}</td>
                    {{-- <td>jdsflksjfs</td>
                    <td>jdsflksjfs</td> --}}
                    <td colspan="3">Rp. {{ number_format($all_data->sum('besar_angsuran'), 0, ',', '.') }}
                    </td>
                </tr>

            </table>
            <table>
                <tr>
                    <td colspan="14" style="text-align: right">
                        <p style="margin-right: 35px; font-weight: bold;">Admin</p>
                        <p style="color: white">hidden</p>
                        <p style="font-weight: bold;">Arifa Ramadhan</p>
                    </td>
                </tr>
            </table>
        </div>

    </div>

</body>

</html>
