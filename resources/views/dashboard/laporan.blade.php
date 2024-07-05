@extends('dashboard.layouts.main')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Semua Laporan</h1>
        </div>
    </div><!--//row-->

    <div class="row g-4">

        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <span class="icon-holder">
                        <i class="fas fa-file-pdf pdf-file"></i>
                    </span>
                    <a class="app-card-link-mask" href="#file-link"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">

                    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Laporan Penjualan
                            eleifend</a></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">Type:</span> PDF</li>
                        </ul>
                    </div><!--//app-doc-meta-->

                    <div class="app-card-actions">

                        <a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                        </a>
                    </div><!--//app-card-actions-->

                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div><!--//col-->

    </div><!--//row-->
<! @endsection
