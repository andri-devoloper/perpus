@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Books</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Books</li>
        </ul>
    </div>

    <div class="card ">
        <div class="card-header d-flex flex-wrap align-items-center  justify-content-between gap-4">
            <div>
                <h5 class="card-title mb-0">Default Datatables</h5>
            </div>
            <div class="">
                <form method="GET" action="{{ route('books') }}" id="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control flex-grow-1" placeholder="Search...."
                            value="{{ request('search') }}" id="search-input">
                        <select name="category" class="form-select input-group-text w-90 flex-grow-0" id="category-select">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-4">

            @foreach ($book as $books)
                <a href="{{ route('books.show', $books->id) }}" class="col">
                    <div class="card p-3 m-0 position-relative"
                        style="width: auto; display: flex; justify-content: center; align-items: center; border: 1px solid white;">
                        <div class="text-black text-center">
                            <img src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Informatika-BS-KLS-X-Cover.png"
                                width="150" class="img-fluid rounded-top" alt="Why Choose Us?">
                            <div class="bg-base pt-4 text-start">
                                <h6 class="text-black text-sm long-text">{{ $books->judul_books }}
                                </h6>
                                <p class="text-sm">ISBN: <br> <span>{{ $books->isbn_books }}</span></p>
                            </div>
                            <div class="position-absolute" style="top: 2%; right: 2%">
                                <div
                                    class="w-40-px h-40-px
                    {{ $books->number_books == 0 ? 'bg-danger text-white' : 'bg-info text-info-800' }}
                    rounded-circle d-inline-flex align-items-center justify-content-center text-sm">
                                    {{ $books->number_books }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <script>
        // Auto-submit the form on keyup in the search input
        document.getElementById('search-input').addEventListener('keyup', function() {
            document.getElementById('search-form').submit();
        });
        document.getElementById('category-select').addEventListener('change', function() {
            document.getElementById('search-form').submit();
        });
    </script>
@endsection
