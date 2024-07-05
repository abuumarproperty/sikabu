@extends('dashboard.layouts.main')

@section('content')
    <div class="col-12 col-lg-8">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                    <div class="col-auto">
                        <div class="app-icon-holder">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                            </svg>
                        </div><!--//icon-holder-->

                    </div><!--//col-->
                    <div class="col-auto">
                        <h4 class="app-card-title">{{ $costumer->nama }}</h4>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body px-4 w-100">

                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Nomor Akad </strong></div>
                            <div class="item-data">{{ $costumer->no_akad }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Pekerjaan</strong></div>
                            <div class="item-data">{{ $costumer->pekerjaan }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Alamat</strong></div>
                            <div class="item-data">{{ $costumer->alamat }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Lahan</strong></div>
                            <div class="item-data">{{ $costumer->land->nama }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Kantor Pelayanan</strong></div>
                            <div class="item-data">{{ $costumer->kantor_pelayanan }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Blok</strong></div>
                            <div class="item-data">{{ $costumer->blok }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Status Pembelian</strong></div>
                            <div class="item-data">{{ $costumer->purchase->nama }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Tenor</strong></div>
                            <div class="item-data">{{ $costumer->tenor }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Tanggal Jatuh Tempo</strong></div>
                            <div class="item-data">{{ $costumer->tanggal_jatuh_tempo }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Harga Deal</strong></div>
                            <div class="item-data">Rp.
                                {{ number_format($costumer->harga_setelah_pemotongan, 0, ',', '.') }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Besar Angsuran</strong></div>
                            <div class="item-data">Rp. {{ number_format($costumer->besar_angsuran, 0, ',', '.') }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->

                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Foto KTP</strong></div>
                            <div class="item-data">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{ asset('storage/' . $costumer->foto_ktp) }}" target="__blank">
                                        <img src="{{ asset('storage/' . $costumer->foto_ktp) }}"
                                            alt="{{ $costumer->nama }}" class="card-img-top">
                                    </a>
                                </div>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->

                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label mb-2"><strong>Lihat atau Download Dokumen</strong></div>
                            {{-- @dd($costumer->costumer_files) --}}
                            @foreach ($costumer->costumer_files as $files)
                                {{-- @dd($files->dokumen) --}}
                                <div class="item-data mb-2">
                                    <div class="card" style="width: 18rem;">
                                        <a href="/dokumen/costumer-file/{{ $files->dokumen }}" target="__blank"
                                            class="card">
                                            Dokumen {{ $loop->iteration }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->

                {{-- <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label">
                                <a href="/dashboard/costumer/file/{{ $costumer->id }}" target="__blank">
                                    <strong>Dokumen</strong>
                                </a>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item--> --}}
                {{-- @dd($costumer->costumer_files)
                @foreach ($costumer->costumer_files as $files)
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label">

                                    <a href="{{ asset('dokumen/costumer-file/' . $files->dokumen) }}" target="__blank">
                                        <img src="{{ asset('dokumen/costumer-file/' . $files->dokumen) }}"
                                            alt="{{ $costumer->nama }}" class="card-img-top">
                                    </a>
                                </div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                @endforeach --}}

            </div><!--//app-card-body-->
            <div class="app-card-footer p-4 mt-auto">

                <a class="btn btn-warning btn-icon-split" href="/dashboard/costumers/{{ $costumer->id }}/edit">
                    <span class="icon text-white">
                        <i class="bi bi-pen-fill"></i>
                    </span>
                </a>

                @can('admin')
                    <form action="/dashboard/costumers/{{ $costumer->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf

                        <button class="btn btn-danger btn-icon-split" onclick="return confirm('Are you sure?')">
                            <span class="icon text-white">
                                <i class="fas fa-trash"></i>
                            </span>
                        </button>
                    </form>
                @endcan
            </div><!--//app-card-footer-->

        </div><!--//app-card-->
    </div><!--//col-->
@endsection
