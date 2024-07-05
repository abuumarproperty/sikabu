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
            font-size: 18px;
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
            <p>LAPORAN REKAP TUNGGAKAN TANAH PERUMAHAN (KAVLING)</p>
            <h3>AL - MADINAH 1 & 2 & 3</h3>
            <p>Jl. Uka Ujung (Batas Kota) - Garuda Sakti, Panam - Pekanbaru</p>
        </div>

        <div class="table-center">

            <p>
                Bulan : <i>
                    {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('F Y') }}
                </i>
            </p>

            <table cellspacing="0" border="1">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Blok</th>
                    <th rowspan="2">QTT</th>
                    <th rowspan="2">Tenor</th>
                    <th colspan="2">Angsuran</th>
                    <th colspan="3">Setor / Pembayaran</th>
                    <th rowspan="2">Sisa Angsuran</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Lahan</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Catatan</th>
                </tr>
                <tr>
                    <th>Ke</th>
                    <th>Perbulan (Rp)</th>
                    <th>Tgl. Bayar</th>
                    <th>Nominal</th>
                    <th>Jenis Pembayaran</th>
                </tr>

                @foreach ($all_data as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->costumer->nama }}</td>
                        <td>{{ $data->costumer->blok }}</td>
                        <td>{{ $data->costumer->kuantitas }}</td>
                        <td>{{ $data->costumer->tenor }}</td>
                        <td>{{ $data->angsuran_ke }}</td>
                        <td>Rp. {{ number_format($data->costumer->besar_angsuran, 0, ',', '.') }}</td>
                        <td>{{ $data->tanggal_pembayaran }}</td>
                        <td>Rp. {{ number_format($data->nominal, 0, ',', '.') }}</td>
                        <td>{{ $data->payment->nama }}</td>
                        <td>Rp. {{ number_format($data->sisa_angsuran, 0, ',', '.') }}</td>
                        <td>{{ $data->costumer->purchase->nama }}</td>
                        <td>{{ $data->costumer->land->nama }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->catatan }}</td>
                    </tr>
                @endforeach

                <tr class="table-footer" style="background-color: rgb(214, 250, 13);">
                    <td colspan="3">Jumlah</td>
                    <td colspan="3">{{ $costumers->sum('kuantitas') }}</td>
                    <td colspan="2">Rp. {{ number_format($costumers->sum('besar_angsuran'), 0, ',', '.') }}
                    </td>
                    <td colspan="7">Rp. {{ number_format($all_data->sum('nominal'), 0, ',', '.') }}</td>
                </tr>

                <tr class="table-footer" style="background-color: rgb(32, 241, 32);">
                    <td colspan="8">Total Penerimaan Bulan Ini</td>
                    <td colspan="7">Rp. {{ number_format($all_data->sum('nominal'), 0, ',', '.') }}</td>
                </tr>

                <tr class="table-footer" style="background-color: rgb(247, 69, 69);">
                    <td colspan="8">Total Tunggakan Bulan Ini</td>
                    <td colspan="7">Rp.
                        {{ number_format($costumers->sum('besar_angsuran') - $all_data->sum('nominal'), 0, ',', '.') }}
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
