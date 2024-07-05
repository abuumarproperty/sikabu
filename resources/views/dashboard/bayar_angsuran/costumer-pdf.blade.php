<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan</title>

    <!-- MY CSS -->
    <style>
        * {
            font-size: 8pt !important;
            margin: 0;
            padding: 0;
        }

        table tr {
            height: 100px !important;
        }

        .underline-hitam {
            text-decoration: underline;
            color: black;
        }

        .justify-text {
            text-align: justify;
        }
    </style>

</head>

<body>

    <div>

        <table style="margin: 0;">
            <tr>
                {{-- <td style="padding: 10px;">www.abuumarproperty.com</td> --}}
                <td>www.abuumarproperty.com</td>
                <td style="color: white;">
                    ............................................................................
                </td>
                {{-- <td style="padding: 10px;">Lembar 1 : Konsumen</td> --}}
                <td>Lembar 1 : Konsumen</td>
                <td style="color: white;">
                    ............................................................................
                </td>
                {{-- <td style="padding: 10px;">Lembar 2 : Abu Umar Property</td> --}}
                <td>Lembar 2 : Abu Umar Property</td>
            </tr>
        </table>

        <div class="header" style="border: 2px solid black;">

            <table style="display: table; margin: 0;">
                <tr>
                    <td style="width: 200px">
                        <strong>
                            NO. REKENING VIA TRANSFER (TRF)
                        </strong>

                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/images/maps/kiri.png'))) }}"
                            width="150">
                    </td>
                    <td style="color: white;">
                        {{-- <td> --}}
                        ............................................
                    </td>
                    <td style="width: 130px;">
                        <h1>
                            <strong class="link-underline-dark underline-hitam"
                                style="font-weight: bold; text-align: center">
                                SLIP SETORAN
                            </strong>
                        </h1>
                        <p>Nomor : {{ $data->costumer->no_akad }}</p>
                        <p>Tanggal : {{ $data->tanggal_pembayaran }}</p>
                    </td>
                    <td style="color: white;">
                        {{-- <td> --}}
                        ............................................
                    </td>
                    <td style="width: 200px">
                        <strong>
                            NO. REKENING VIA TRANSFER (TRF)
                        </strong>
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/images/maps/kanan.png'))) }}"
                            width="150">
                    </td>
                </tr>
                {{-- <tr></tr> --}}
            </table>

            <table border="1" style="margin-left: auto; margin-right: auto; margin-top: 0;" cellspacing="1">
                <tr style="height: 10pt !important;">
                    <td style="border-left: 0; border-top: 0; border-right: 0;" rowspan="2">
                        Disetorkan Untuk :
                    </td>
                    @if ($data->deposit->nama == 'Angsuran')
                        <td style="border: 0;" colspan="2">
                            <input type="checkbox" checked> Angsuran
                        </td>
                        <td style="border-left: 0; border-bottom: 0;" colspan="2">
                            <input type="checkbox"> DP
                        </td>
                    @elseif ($data->deposit->nama == 'Dp')
                        <td style="border: 0;" colspan="2">
                            <input type="checkbox"> Angsuran
                        </td>
                        <td style="border-left: 0; border-bottom: 0;" colspan="2">
                            <input type="checkbox" checked> DP
                        </td>
                    @else
                        <td style="border: 0;" colspan="2">
                            <input type="checkbox"> Angsuran
                        </td>
                        <td style="border-left: 0; border-bottom: 0;" colspan="2">
                            <input type="checkbox"> DP
                        </td>
                    @endif

                    <td style="border: 0; text-align: right;" rowspan="2">
                        Jenis Pembayaran
                    </td>

                    @if ($data->payment->nama == 'Tunai')
                        <td style="border: 0; text-align: center;" rowspan="2">
                            <input type="checkbox" checked> Tunai / Cash
                        </td>

                        <td style="border-left: 0; border-bottom: 0; text-align: left; border: 0;" rowspan="2">
                            <input type="checkbox"> Transfer
                        </td>
                    @elseif($data->payment->nama == 'Transfer')
                        <td style="border: 0; text-align: center;" rowspan="2">
                            <input type="checkbox"> Tunai / Cash
                        </td>

                        <td style="border-left: 0; border-bottom: 0; text-align: left; border: 0;" rowspan="2">
                            <input type="checkbox" checked> Transfer
                        </td>
                    @else
                        <td style="border: 0; text-align: center;" rowspan="2">
                            <input type="checkbox"> Tunai / Cash
                        </td>

                        <td style="border-left: 0; border-bottom: 0; text-align: left; border: 0;" rowspan="2">
                            <input type="checkbox"> Transfer
                        </td>
                    @endif
                </tr>
                <tr>
                    @if ($data->deposit->nama == 'Panjar (Booking)')
                        <td style="border-left: 0; border-top: 0; border-right: 0;" colspan="2">
                            <input type="checkbox" checked> Panjar (Booking)
                        </td>

                        <td style="border-left: 0; border-top: 0;" colspan="2">
                            <input type="checkbox"> Pelunasan
                        </td>
                    @elseif($data->deposit->nama == 'Pelunasan')
                        <td style="border-left: 0; border-top: 0; border-right: 0;" colspan="2">
                            <input type="checkbox"> Panjar (Booking)
                        </td>

                        <td style="border-left: 0; border-top: 0;" colspan="2">
                            <input type="checkbox" checked> Pelunasan
                        </td>
                    @else
                        <td style="border-left: 0; border-top: 0; border-right: 0;" colspan="2">
                            <input type="checkbox"> Panjar (Booking)
                        </td>

                        <td style="border-left: 0; border-top: 0;" colspan="2">
                            <input type="checkbox"> Pelunasan
                        </td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: grey; font-weight: bold; font-size: 10pt; color: white; border: 1px solid black; text-align: center;"
                        colspan="4">
                        Data Konsumen (Costumer)
                    </td>
                    <td
                        style="background-color: grey; font-weight: bold; font-size: 10pt; color: white; border: 1px solid black; text-align: center;">
                        Rincian Setoran
                    </td>
                    <td style="background-color: grey; font-weight: bold; font-size: 10pt; color: white; border: 1px solid black; text-align: center;"
                        colspan="3">
                        Jumlah
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 0; border-right: 0; border-bottom: 0;">
                        Nama
                    </td>
                    <td style="border: 0;" colspan="3">
                        : {{ $data->costumer->nama }}
                    </td>
                    <td style="border-right: 0;">
                        Angsuran Ke
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        : {{ $data->angsuran_ke }}
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 0; border-right: 0; border-top: 0;">
                        No. Kavling / Lahan
                    </td>
                    <td style="border: 0;" colspan="3">
                        : {{ $data->costumer->land->nama }}
                    </td>
                    <td style="border-right: 0;">
                        Angsuran
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :
                        @if ($data->deposit->nama == 'Angsuran')
                            Rp. {{ number_format($data->nominal, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="background-color: grey; font-weight: bold; font-size: 20px; color: white; border: 1px solid black; text-align: center;"
                        colspan="4">
                        Keterangan
                    </td>
                    <td style="border: 0;">
                        Pelunasan
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :
                        @if ($data->deposit->nama == 'Pelunasan')
                            Rp. {{ number_format($data->nominal, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px;" colspan="4" rowspan="4">
                        {{ $data->keterangan }}
                    </td>
                    <td style="border-right: 0;">
                        DP
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :
                        @if ($data->deposit->nama == 'Dp')
                            Rp. {{ number_format($data->nominal, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>

                <tr>
                    <td style="border-right: 0;">
                        Panjar (Booking)
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :

                        @if ($data->deposit->nama == 'Panjar (Booking)')
                            Rp. {{ number_format($data->nominal, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>

                <tr>
                    <td style="border-right: 0;">
                        Total
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :

                        Rp. {{ number_format($data->nominal, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td style="border-right: 0;">
                        <i>Terbilang</i>
                    </td>
                    <td style="border-left: 0;" colspan="3">
                        :
                        <i>
                            {{ $terbilang }} ribu rupiah
                        </i>
                    </td>
                </tr>
            </table>

            <table style="display:table; margin: auto;">
                <tr>
                    <td>
                        <u>
                            <b>
                                Catatan :
                            </b>
                        </u>
                    </td>
                    <td style="color: white">
                        ............................................................................................
                        ..............................................
                    </td>
                    <td style="text-align: center">
                        Petugas
                    </td>
                    <td style="color: white">
                        ...............................................
                    </td>
                    <td style="text-align: center">
                        Penyetor
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        1. Slip setoran ini sebagai bukti pembayaran yang Sah.
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        2. Pembatalan Panjar (Booking) uang hangus 100%.
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        3. Pembatalan akad dipotong 50% dari uang yang masuk (S&KB).
                    </td>
                </tr>
                <tr>
                    <td>
                        4. Konsultasi di nomer 0852-1035-1600 (WA).
                    </td>
                    <td>
                        {{-- ............................................................................................ --}}
                    </td>
                    <td style="text-align: center">
                        {{ $data->petugas }}
                    </td>
                    <td style="color: white">
                        ...............................................
                    </td>
                    <td>
                        ........................
                    </td>
                </tr>
            </table>

            <br>

        </div>

        <table style="display: table; margin: auto">
            <tr>
                <td style="padding: 10px;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/images/maps/96.png'))) }}"
                        width="50">
                </td>
                <td style="padding: 10px">
                    <u>
                        <strong>
                            Kantor Pusat
                        </strong>

                        <p>Jl. Melati Indah, Komplek Ruko Jasmine City Garden No. 11</p>
                        <p>Kel. Tobek Gadang Kec. Bina Widya - Kota Pekanbaru</p>
                    </u>
                </td>
                <td style="padding: 10px;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/images/maps/96.png'))) }}"
                        width="50">
                </td>
                <td style="padding: 10px">
                    <u>
                        <strong>
                            Kantor Cabang Rokan Hulu
                        </strong>

                        <p>Jl. Syekh Ismail, Simpang Tangun</p>
                        <p>Desa Pematang Berangan Kec. Rambah, Kab. Rokan Hulu</p>
                    </u>
                </td>
                <td style="padding: 10px">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/images/maps/96.png'))) }}"
                        width="50">
                </td>
                <td>
                    <u>
                        <strong>
                            Kantor Cabang Kota Dumai
                        </strong>

                        <p>Jl. Soekarno-Hatta Sp. Panam</p>
                        <p>Kel. Bukit Kapur Kec. Bukit Kapur, Kota Dumai</p>
                    </u>
                </td>
            </tr>
            {{-- <tr>
                <td>
                    <p style="color: white">hidden</p>
                </td>
                <td>
                    <p>Jl. Melati Indah, Komplek Ruko Jasmine City Garden No. 11</p>
                    <p>Kel. Tobek Gadang Kec. Bina Widya - Kota Pekanbaru</p>
                </td>
                <td>
                    <p style="color: white">hidden</p>
                </td>
                <td>
                    <p>Jl. Syekh Ismail, Simpang Tangun</p>
                    <p>Desa Pematang Berangan Kec. Rambah, Kab. Rokan Hulu</p>
                </td>
                <td>
                    <p style="color: white">hidden</p>
                </td>
                <td>
                    <p>Jl. Soekarno-Hatta Sp. Panam</p>
                    <p>Kel. Bukit Kapur Kec. Bukit Kapur, Kota Dumai</p>
                </td>
            </tr> --}}
        </table>
</body>

</html>
