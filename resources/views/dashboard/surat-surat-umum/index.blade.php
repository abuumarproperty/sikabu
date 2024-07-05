@extends('dashboard.layouts.main')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            @if (Auth::user()->is_admin == 0)
                <h1 class="app-page-title mb-0">My Docs</h1>
            @else
                <h1 class="app-page-title mb-0 text-white">My Docs</h1>
            @endif
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    {{-- <div class="col-auto">
                        <form class="docs-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs"
                                    placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>

                    </div><!--//col--> --}}
                    @can('create-doc')
                        <div class="col-auto">
                            @if (Auth::user()->is_admin == 0)
                                <a class="btn app-btn-primary" href="/dashboard/docs/create">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload me-2"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg>
                                    Upload File
                                </a>
                            @else
                                <a class="btn app-btn-secondary" href="/dashboard/docs/create">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload me-2"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg>
                                    Upload File
                                </a>
                            @endif
                        </div>
                    @endcan
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <div class="row g-4">

        @foreach ($docs as $doc)
            @if (substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) == 'pdf')
                <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                    <div class="app-card app-card-doc shadow-sm h-100">
                        <div class="app-card-thumb-holder p-3">
                            <span class="icon-holder">
                                <i class="fas fa-file-pdf pdf-file"></i>
                            </span>
                            <a class="app-card-link-mask" href="#file-link"></a>
                        </div>
                        <div class="app-card-body p-3 has-card-actions">

                            <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{ $doc->judul }}</a></h4>
                            <div class="app-doc-meta">
                                <ul class="list-unstyled mb-0">
                                    <li><span class="text-muted">Type:</span>
                                        {{ substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) }}</li>
                                    {{-- <li><span class="text-muted">Size:</span> 3MB</li> --}}
                                    <li><span class="text-muted">Uploaded:</span> {{ $doc->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div><!--//app-doc-meta-->

                            <div class="app-card-actions">
                                <div class="dropdown">
                                    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-three-dots-vertical" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </div><!--//dropdown-toggle-->
                                    <ul class="dropdown-menu">
                                        @can('edit-doc')
                                            <li>
                                                <a class="dropdown-item" href="/dashboard/docs/{{ $doc->id }}/edit">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                        class="bi bi-pencil me-2" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                            </li>
                                        @endcan

                                        <li>
                                            <a class="dropdown-item" href="{{ asset('storage/' . $doc->dokumen) }}"
                                                target="__blank">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-download me-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg>
                                                Download
                                            </a>
                                        </li>

                                        @can('delete-doc')
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>
                                                <form action="/dashboard/docs/{{ $doc->id }}" method="post">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                            class="bi bi-trash me-2" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        @endcan

                                    </ul>
                                </div><!--//dropdown-->
                            </div><!--//app-card-actions-->

                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div><!--//col-->
            @elseif (substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) == 'docx' ||
                    substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) == 'doc')
                <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                    <div class="app-card app-card-doc shadow-sm h-100">
                        <div class="app-card-thumb-holder p-3">
                            <span class="icon-holder">
                                <i class="fas fa-file-alt text-file"></i>
                            </span>

                            <span class="badge bg-success">NEW</span>

                            <a class="app-card-link-mask" href="#file-link"></a>
                        </div>
                        <div class="app-card-body p-3 has-card-actions">

                            <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{ $doc->judul }}</a></h4>
                            <div class="app-doc-meta">
                                <ul class="list-unstyled mb-0">
                                    <li><span class="text-muted">Type:</span>
                                        {{ substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) }}
                                    </li>
                                    <li><span class="text-muted">Size:</span>
                                        {{ $doc->dokumen_size }}
                                    </li>
                                    <li><span class="text-muted">Uploaded:</span> {{ $doc->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div><!--//app-doc-meta-->

                            <div class="app-card-actions">
                                <div class="dropdown">
                                    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-three-dots-vertical" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </div><!--//dropdown-toggle-->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dashboard/docs/{{ $doc->id }}/edit"><svg
                                                    width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-pencil me-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>Edit</a></li>
                                        <li><a class="dropdown-item" href="{{ asset('storage/' . $doc->dokumen) }}"
                                                target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-download me-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg>Download</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="/dashboard/docs/{{ $doc->id }}" method="post">
                                                @method('delete')
                                                @csrf

                                                <button type="submit" class="dropdown-item text-danger">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                        class="bi bi-trash me-2" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div><!--//dropdown-->
                            </div><!--//app-card-actions-->

                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div><!--//col-->
            @elseif (substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) == 'xlsx' ||
                    substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) == 'xls')
                <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                    <div class="app-card app-card-doc shadow-sm h-100">
                        <div class="app-card-thumb-holder p-3">
                            <span class="icon-holder">
                                <i class="fas fa-file-excel excel-file"></i>
                            </span>
                            <a class="app-card-link-mask" href="#file-link"></a>
                        </div>
                        <div class="app-card-body p-3 has-card-actions">

                            <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{ $doc->judul }}</a></h4>
                            <div class="app-doc-meta">
                                <ul class="list-unstyled mb-0">
                                    <li><span class="text-muted">Type:</span>
                                        {{ substr($doc->dokumen, strrpos($doc->dokumen, '.') + 1) }}</li>
                                    <li><span class="text-muted">Size:</span> 64KB</li>
                                    <li><span class="text-muted">Uploaded:</span> {{ $doc->updated_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div><!--//app-doc-meta-->

                            <div class="app-card-actions">
                                <div class="dropdown">
                                    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-three-dots-vertical" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </div><!--//dropdown-toggle-->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dashboard/docs/{{ $doc->id }}/edit"><svg
                                                    width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-pencil me-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>Edit</a></li>
                                        <li><a class="dropdown-item" href="{{ asset('storage/' . $doc->dokumen) }}"
                                                target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-download me-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg>Download</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="/dashboard/docs/{{ $doc->id }}" method="post">
                                                @method('delete')
                                                @csrf

                                                <button type="submit" class="dropdown-item text-danger">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                        class="bi bi-trash me-2" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div><!--//dropdown-->
                            </div><!--//app-card-actions-->

                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div><!--//col-->
            @endif
        @endforeach

    </div><!--//row-->
    <nav class="app-pagination mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
<! @endsection
