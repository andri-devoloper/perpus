@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Add User</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Add User</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Import Buku</h6>
                </div>
                <div class="card-body p-24">
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <form action="{{ route('import.book.data') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 mb-4">
                                <label class="form-label">Medium Size File Input </label>
                                <input class="form-control" type="file" name="file">
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11">
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Download Tempate</h6>
                </div>
                <div class="card-body p-24">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ route('books.downloadTemplate') }}"
                            class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11">
                            Unduh Template
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Download Tempate</h6>
                </div>
                <div class="card-body p-24">

                </div>
            </div>
        </div>
    </div>
@endsection
