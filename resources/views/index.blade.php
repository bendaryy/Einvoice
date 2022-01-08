@extends('layouts.main')


@section('content')
<div class="page-content">


    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">@lang('site.products')</p>
                            <h4 class="my-1">{{ $products }}</h4>

                        </div>
                        <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bx-cube-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">@lang('site.Active Products')</p>
                            <h4 class="my-1">{{ $approved }}</h4>
                         </div>
                        <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bx-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">@lang('site.Pending Products')</p>
                            <h4 class="my-1">{{ $pending }}</h4>
                         </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bx-timer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">@lang('site.Rejected Products')</p>
                            <h4 class="my-1">0</h4>
                        </div>
                        <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class="bx bx-eraser"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








  </div>
@endsection

@push('js')
<script src="{{ asset('main/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ asset('main/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('main/plugins/highcharts/js/highcharts.js')}}"></script>
<script src="{{ asset('main/plugins/highcharts/js/exporting.js')}}"></script>
<script src="{{ asset('main/plugins/highcharts/js/variable-pie.js')}}"></script>
<script src="{{ asset('main/plugins/highcharts/js/export-data.js')}}"></script>
<script src="{{ asset('main/plugins/highcharts/js/accessibility.js')}}"></script>

@endpush
