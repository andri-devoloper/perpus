@extends('dashboard.layouts.main')


@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps New Books</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    New Books
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">New Books</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Input New Books</h5>
                </div>
                <div class="card-body ">
                    <form class="row" action="{{ route('create.books') }}" method="POST">
                        @csrf
                        <div class="col-md-6 gay-6">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" name="isbn_books" class="form-control" placeholder="Enter ISBN" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Book Title</label>
                                    <input type="text" name="judul_books" class="form-control"
                                        placeholder="Enter Book Title" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Author&#39s name</label>
                                    <input type="text" name="autor_books" class="form-control"
                                        placeholder="Enter Author&#39s name" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Year of Publication</label>
                                    <input type="text" name="year_books" class="form-control"
                                        placeholder="Enter Year of Publication" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Publisher Name</label>
                                    <input type="text" name="publisher_books" class="form-control"
                                        placeholder="Enter Year Publisher Name" />
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 gay-6">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">Number of Books</label>
                                    <input type="text" name="number_books" class="form-control"
                                        placeholder="Enter Number of Books" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Category Code</label>
                                    <input type="text" name="code_category" id="code_category" class="form-control"
                                        placeholder="Enter Category Code" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="name_category" id="name_category" class="form-control"
                                        placeholder="Enter Category Name" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Shelf Number</label>
                                    <select name="id_rack" id="rak" class="form-select">
                                        <option selected disabled>&#60&#61&#61&#61&#61 Number &#61&#61&#61&#61&#62</option>
                                        @foreach ($rack_all as $racks)
                                            <option value="{{ $racks->id }}">{{ $racks->name_rack }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sub Number</label>
                                    <select name="name_rack" id="subs" class="form-select">
                                        <option selected disabled>&#60&#61&#61&#61&#61 Number &#61&#61&#61&#61&#62</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 gay-6 mt-3">
                            <button type="submit" id="uploadButton" class="btn btn-primary-600">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
