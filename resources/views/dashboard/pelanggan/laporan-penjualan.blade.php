<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .container {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
        }

        .header {
            margin-bottom: 170px;
        }

        .left {
            float: left;
            width: 100%;
            margin-top: 27px;
            margin-left: 25px;
        }

        .center {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            float: right;
            width: 100%;
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
            background-color: rgb(166, 166, 241);
        }
    </style>
</head>

<body>
    {{-- 
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/dots.png'))) }}"
        alt=""> --}}

    <div class="container">
        <div class="header">
            <div class="left">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/logo_perusahaan.png'))) }}"
                    width="100">
            </div>
            <div class="center">
                <p>DATA PENJUALAN</p>
                <h2>LAHAN PERUMAHAN (KAVLING) AL-MADINAH</h2>
                <p>JL. UKA - PERUM BUMI SIDAM DAMAI (BSD), DESA KARYA INDAH - KAMPAR</p>
            </div>
        </div>
        <div class="table-center">
            <table cellspacing="0" border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Blok / Lahan</th>
                    <th>QTT</th>
                    <th>Harga Deal</th>
                    <th>Status</th>
                    <th>Tenor</th>
                    <th>Agen / Mediator</th>
                    <th>No. HP / WA</th>
                    {{-- <th>Keterangan</th> --}}
                </tr>
                @foreach ($costumers as $costumer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $costumer->nama }}</td>
                        <td>{{ $costumer->blok }} / {{ $costumer->land->nama }}</td>
                        <td>{{ $costumer->kuantitas }}</td>
                        <td>Rp. {{ number_format($costumer->harga_setelah_pemotongan, 0, ',', '.') }}</td>
                        <td>{{ $costumer->purchase->nama }}</td>
                        <td>{{ $costumer->tenor }}</td>
                        <td>{{ $costumer->agen }}</td>
                        <td>{{ $costumer->no_hp_satu }} / {{ $costumer->no_hp_dua }}</td>
                        {{-- <td>{{ $costumer->keterangan }}</td> --}}
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ $costumers->sum('kuantitas') }}</td>
                    <td colspan="5">Rp.
                        {{ number_format($costumers->sum('harga_setelah_pemotongan'), 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>

    </div>

</body>

</html>
