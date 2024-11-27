@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Book</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Book</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-start">
                <h5 class="card-title mb-0">Input Custom Styles</h5>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pajamas:go-back" class="text-xl"></iconify-icon>
                    Kembali
                </a>
                <a href="javascript:void(0)" id="editButton"
                    class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Edit
                </a>
                <a href="javascript:void(0)" id="cancelButton" style="display: none;"
                    class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:times-circle" class="text-xl"></iconify-icon>
                    Cancel
                </a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center text-2xl mb-4">{{ $books->judul_books ? $books->judul_books : 'N/A' }}</h5>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6 d-flex justify-content-end ">
                            <img src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Informatika-BS-KLS-X-Cover.png"
                                class="img-fluid rounded" width="250" alt="">
                        </div>
                        <div class="col-md-6  w-full d-flex justify-content-start">
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">ISBN</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->isbn_books ? $books->isbn_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Penyusun</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->autor_books ? $books->autor_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Penerbit</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->publisher_books ? $books->publisher_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Tahun</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->year_books ? $books->year_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300" style="width: 170px;   display: inline-block;">
                                                    <span class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Jumlah
                                                        Halaman</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">Buku Matematik</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Jumlah
                                                        Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->number_books ? $books->number_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Kategori</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->category->name_category ? $books->category->name_category : 'N/A' }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Rak Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->rack->name_rack ? $books->rack->name_rack : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Sub Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li class="text-white">
                                                        {{ $books->name_rack ? $books->name_rack : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
