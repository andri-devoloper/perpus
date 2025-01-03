@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Rack</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Rack</li>
        </ul>
    </div>

    <div class="row gy-4" id="some">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Book Rack</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('create.rak') }}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Code Rack</label>
                                <input type="text" name="code_rack" class="form-control" placeholder="Input Rack code">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Name Rack</label>
                                <input type="text" name="name_rack" class="form-control" placeholder="Input Rack name">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Upload
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Table Rack</h5>
                </div>
                <div class="card-body">
                    @include('dashboard/components/tables/rack/tabel-rack')
                </div>
            </div>
        </div>
       
    </div>
@endsection
