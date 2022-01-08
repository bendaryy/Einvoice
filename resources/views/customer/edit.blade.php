@extends('layouts.main')


@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@lang('site.dashboard')</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('site.customers')</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-2">


        <div class="col-md-9">

            <hr/>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">@lang('site.create-customer')</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('customer.update', $customer->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="inputLastName1" class="form-label">@lang('site.customer-type')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <select name="type"   class="form-control border-start-0" id="inputLastName1">
                                    <option @if($customer->type == 'bussiness')  selected @endif value="bussiness">@lang('site.bussiness')</option>
                                    <option @if($customer->type == 'pserson')  selected @endif value="pserson">@lang('site.pserson')</option>
                                    <option @if($customer->type == 'foreign')  selected @endif value="foreign">@lang('site.foreign')</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="inputLastName1" class="form-label">@lang('site.full-name')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                <input name="name"   value="{{ $customer->name }}" type="text" class="form-control border-start-0" id="inputLastName1" placeholder="@lang('site.full-name')" />
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">@lang('site.phone')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
                                <input name="phone"  value="{{ $customer->phone }}" type="text" class="form-control border-start-0" id="inputPhoneNo" placeholder="@lang('site.phone')" />
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">@lang('site.reg-numer')/@lang('site.id')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" value="{{ $customer->reg_numer }}" name="reg_numer"   class="form-control border-start-0" id="inputEmailAddress" placeholder="@lang('site.reg-numer')" />
                            </div>
                        </div>


                        <div class="col-6">
                            <label for="Country" class="form-label">@lang('site.Country')</label>

                            <select class="form-control" id="type" name="country">

                                <option disabled> @lang('site.choose')</option>

                                @foreach($countries as $country)

                                <option @if($customer->country == $country->code) selected @endif value="{{ $country->code}}">
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                    {{ $country->code}} {{ $country->Desc_en}}
                                    @else
                                    {{ $country->code}} {{ $country->Desc_ar}}
                                    @endif </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="col-6">
                            <label for="Governorate" class="form-label">@lang('site.Governorate')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="governorate" value="{{ $customer->governorate }}"   class="form-control border-start-0" id="Governorate" placeholder="@lang('site.Governorate')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="City" class="form-label">@lang('site.City')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="city" value="{{ $customer->city }}"   class="form-control border-start-0" id="City" placeholder="@lang('site.City')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="street" class="form-label">@lang('site.Street Name')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="street" value="{{ $customer->street }}"   class="form-control border-start-0" id="street" placeholder="@lang('site.Street Name')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="building" class="form-label">@lang('site.Building Name/No')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="building" value="{{ $customer->building }}"   class="form-control border-start-0" id="building" placeholder="@lang('site.Building Name/No')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="floor" class="form-label">@lang('site.Floor No')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="floor" value="{{ $customer->floor }}"   class="form-control border-start-0" id="floor" placeholder="@lang('site.Floor No')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="flat" class="form-label">@lang('site.Flat No')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="flat" value="{{ $customer->flat }}"   class="form-control border-start-0" id="flat" placeholder="@lang('site.Flat No')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="additional" class="form-label">@lang('site.Additional Information')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="additional" value="{{ $customer->additional }}"   class="form-control border-start-0" id="additional" placeholder="@lang('site.Additional Information')" />
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="post" class="form-label">@lang('site.Postal Code')</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                <input type="text" name="post" value="{{ $customer->post }}"   class="form-control border-start-0" id="post" placeholder="@lang('site.Postal Code')" />
                            </div>
                        </div>




                        <div class="col-12">
                            <button type="submit" class="btn btn-info px-5">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>

</div>


@endsection
