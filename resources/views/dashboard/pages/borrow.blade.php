@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Borrow Books</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Borrow Books</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Input New Books</h5> <span>{{ $user->id }}</span>
                </div>
                <div class="card-body ">
                    <form class="row" action="{{ route('borrow.submit') }}" method="POST">
                        @csrf
                        <div class="col-md-6 gay-6">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">Borrow Name</label>
                                    <input type="text" name="name_borrow" class="form-control"
                                        placeholder="Enter Borrow Name" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" name="number_id" class="form-control"
                                        placeholder="Enter ID Number" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Phome</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Class &#47; Position</label>
                                    <input type="text" name="class_position" class="form-control"
                                        placeholder="Enter Class &#47; Position" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Indentitas Buku</label>
                                    <input type="text" name="book_identity" class="form-control"
                                        placeholder="Enter Indentitas Buku" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 gay-6">
                            <label class="form-label">Books borrowed</label>

                            <div class="row mt-24 gy-0 border rounded book-info-template books-container"
                                style="display: none;">
                                <input type="text" class="id_books">
                                <div class="col-xxl-3 col-sm-6 pe-0">
                                    <div class="card-body p-10 bg-base  d-flex flex-column justify-content-center">
                                        <span class="fw-semibold text-primary-light mb-1">ISBN</span>
                                        <p class="text-sm mb-0 isbn_pinjam"></p>

                                    </div>
                                </div>
                                <div class="col-xxl-3 col-sm-6 px-0">
                                    <div class="card-body p-10 bg-base  d-flex flex-column justify-content-center">
                                        <span class="fw-semibold text-primary-light mb-1">Judu Buku</span>
                                        <p class="text-sm mb-0 judul_buku"></p>

                                    </div>
                                </div>
                                <div class="col-xxl-3 col-sm-6 px-0">
                                    <div class="card-body p10 bg-base  d-flex flex-column justify-content-center">
                                        <span class="fw-semibold text-primary-light mb-1">Rack & Sub</span>
                                        <p class="text-sm mb-0 rack_buku"></p>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-sm-6 ps-0">
                                    <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
                                        <span class="fw-semibold text-primary-light mb-1">Jumlah Buku</span>
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <div class="btn btn-icon btn-minus">
                                                &#45;
                                            </div>
                                            <span class="mx-2 counter">1</span>
                                            <input type="hidden" class="counter_value" value="1">
                                            <div class="btn btn-icon btn-plus">
                                                &#43;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 gay-6 mt-3">
                            <button type="submit" class="btn btn-primary-600">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-4 mt-10">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="col-sm-6">
                        <div class="mb-20 mt-20">
                            <input type="text" class="form-control radius-8" id="search" name="search"
                                placeholder="Search ISBN & Judul Buku">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div id="bookResults"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
