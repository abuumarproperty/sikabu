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
            background-color: rgb(166, 166, 241);
        }

        .table-header {
            font-weight: normal;
        }

        .table-header tr:nth-child(odd) {
            background-color: rgb(40, 238, 40);
        }

        .table-header tr:nth-child(even) {
            background-color: grey;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="center">
            <p>REKAP PEMBAYARAN KONSUMEN</p>
            <p>LAHAN PERUMAHAN (KAVLING) AL-MADINAH (JL. UKA)</p>
            <p>DESA KARYA INDAH KEC. TAPUNG KAB. KAMPAR</p>
        </div>

        <div class="table-center">
            <table cellspacing="0" border="1" class="table-header">
                <tr>
                    <td>Nama</td>
                    <td>{{ $costumer->nama }}</td>
                    <td>Angsuran / Bulan</td>
                    <td>Rp. {{ number_format($costumer->besar_angsuran, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>No. Blok</td>
                    <td>{{ $costumer->blok }}</td>
                    <td>Tenor Bulan</td>
                    <td>{{ $costumer->tenor }}</td>
                </tr>
                <tr>
                    <td colspan="2">Tanggal Jatuh Tempo</td>
                    <td colspan="2">Tanggal {{ Carbon\Carbon::parse($costumer->tanggal_jatuh_tempo)->format('d') }}
                        Setiap Bulan</td>
                </tr>
                <tr>
                    <td>Harga Jual Lahan</td>
                    <td>Rp. {{ number_format($costumer->harga_jual, 0, ',', '.') }}</td>
                    <td>Harga Deal</td>
                    <td>Rp. {{ number_format($costumer->harga_setelah_pemotongan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Potongan</td>
                    <td>Rp. {{ number_format($costumer->potongan, 0, ',', '.') }}</td>
                    <td>Sisa Pembayaran</td>
                    <td>Rp.
                        {{ number_format($costumer->harga_setelah_pemotongan - $costumer->pay_installments->sum('nominal'), 0, ',', '.') }}
                    </td>
                </tr>
            </table>
        </div>

        <br>

        <div class="table-center">
            <table cellspacing="0" border="1">
                <tr>
                    <th>Pembayaran</th>
                    <th>Tanggal Setor</th>
                    <th>Jumlah</th>
                    <th>Jenis Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
                @foreach ($costumer->pay_installments as $data)
                    <tr>
                        <td>{{ $data->angsuran_ke }}</td>
                        <td>{{ $data->tanggal_pembayaran }}</td>
                        <td>{{ $data->nominal }}</td>
                        <td>{{ $data->payment->nama }}</td>
                        <td>{{ $data->deposit->nama }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                @endforeach
                <tr style="background-color: rgb(166, 166, 241); font-weight: bold">
                    <td colspan="2">Total Jumlah Uang Yang Telah Disetor</td>
                    <td colspan="4">Rp.
                        {{ number_format($costumer->pay_installments->sum('nominal'), 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
