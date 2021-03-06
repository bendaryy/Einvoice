@extends('layouts.main')

@section('content')


                        <div class="page-content">

                            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                                <div class="ps-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0 p-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> @lang('site.dashboard') </a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">  @lang('site.import')  </li>
                                        </ol>
                                    </nav>
                                </div>

                            </div>
                            <hr>

                            <p class="lead text-danger">@lang('site.download-totice') </p>


                                    <div class="row row-cols-1 row-cols-2">


                                        <div class="col">


                                            <div class="card border-top border-0 border-4 border-primary">
                                                <div class="card-body p-5">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="bx bx-donate-heart me-1 font-22 text-primary"></i>
                                                        </div>
                                                        <h5 class="mb-0 text-primary">   @lang('site.import_category') </h5>
                                                    </div>
                                                    <hr>
                                                    <p class="lead"> @lang('site.click') <a href="{{ asset('files/categories.xlsx') }}" download> @lang('site.here')</a>    @lang('site.to-download') <br></p>

                                                    <form class="row g-3" method="POST" action="{{ route('categoryimport') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-md-6">
                                                            <label for="inputFirstName" class="form-label"> @lang('site.choose-file')  </label>
                                                            <input type="file" name="file" required class="form-control" id="inputFirstName">
                                                        </div>

                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary px-5">@lang('site.import') </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="card border-top border-0 border-4 border-danger">
                                                <div class="card-body p-5">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                                                        </div>
                                                        <h5 class="mb-0 text-danger">   @lang('site.import_products')</h5>
                                                    </div>
                                                    <hr>
                                                    <p class="lead"> @lang('site.click') <a href="{{ asset('files/products.xlsx') }}" download> @lang('site.here')</a>    @lang('site.to-download') <br></p>
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputFirstName" class="form-label"> @lang('site.choose-file')  </label>
                                                            <input type="file" class="form-control" id="inputFirstName">
                                                        </div>

                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-danger px-5"> @lang('site.import') </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
{{--
                                        <div class="col">

                                            <div class="card border-top border-0 border-4 border-dark">
                                                <div class="card-body p-5">

                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="fadeIn animated bx bx-band-aid me-1 font-22 text-dark"></i>
                                                        </div>
                                                        <h5 class="mb-0 text-dark">?????????????? ??????????????</h5>
                                                    </div>
                                                    <hr>
                                                    <p class="lead"> ???????? <a href="{{ asset('import/medicines.csv') }}" download> ??????</a> ???????????? ?????????? <br></p>
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputFirstName" class="form-label">???????? ??????????</label>
                                                            <input type="file" class="form-control" id="inputFirstName">
                                                        </div>

                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-dark px-5">?????????????? </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col">

                                            <div class="card border-top border-0 border-4 border-info">
                                                <div class="card-body">
                                                    <div class="border p-4 rounded">
                                                        <div class="card-title d-flex align-items-center">
                                                            <div><i class="bx bx-line-chart me-1 font-22 text-info"></i>
                                                            </div>
                                                            <h5 class="mb-0 text-info">?????????????? ????????????????</h5>
                                                        </div>
                                                        <hr/>

                                                  <hr>
                                                    <p class="lead"> ???????? <a href="{{ asset('import/doctors.csv') }}" download> ??????</a> ???????????? ?????????? <br></p>
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputFirstName" class="form-label">???????? ??????????</label>
                                                            <input type="file" class="form-control" id="inputFirstName">
                                                        </div>

                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-info px-5">?????????????? </button>
                                                        </div>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
@endsection
