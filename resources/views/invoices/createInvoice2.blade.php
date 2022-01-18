@extends('layouts.main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function randomTest() {
        var internalValue = document.getElementById('internalId');
        internalValue.value = Math.floor(Math.random() * 105140);
    }
</script>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<title>الفاتورة الإلكترونية </title>
<link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
<link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
<script src="../assets/js/loader.js"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
<link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
<link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
<script src="../assets/js/loader.js"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">




<style>
    th,
    td,
    tr,
    table {
        padding: 5px;
        text-align: center;
    }

    .borderNone {
        border: none
    }

    .borderNone:focus {
        outline: none;
    }

    .online-actions {
        display: none;
    }

    .navbar-expand-sm {
        justify-content: center
    }

    {{-- input[type="number"] {
        width: 130;
        text-align: center
    } --}} {{-- input[name="totalItemsDiscount[]"],
    input[name="totalAmount2"],
    input[name="totalAmount"] {
        width: 250;
    } --}} input[readonly] {
        background-color: #ccc
    }

    hr {
        border: 4px solid orange;
    }

</style>





@section('content')
    <h5 style="text-align: center;margin:50px;text-align: right">

        إضافة وثيقة
    </h5>
    <div class="wrapper" style="background-color: white">


        @if (request()->routeIs('createInvoice'))

            <form action="{{ route('createInvoice2') }}" method="GET">
                <div class="card text-center" style="margin: auto;margin-bottom: 50px">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">اختر اسم الشركة</label>
                                <select class="single-select" name="receiverName" class="form-control" id="receiverName">
                                    <option selected disabled>اختر اسم الشركة</option>
                                    @foreach ($allCompanies as $companies)
                                        <option value="{{ $companies->id }}" class="form-control">
                                            {{ $companies->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-2" style="margin-top: 23">

                                <a href="{{ route('customer.create') }}" class="btn btn-info mt-1" style="">
                                    اضافة عميل جديد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="text-align: right;margin-right: 40px">
                        <button type="submit" class="btn btn-success">ملئ بيانات الشركة</button>
                    </div>
            </form>
        @else
            <div style="text-align: center">
                <a href="{{ route('createInvoice') }}" class="btn btn-success" style="text-align: center">الرجوع لاختيار
                    الشركة</a>
            </div>
        @endif



        <div style="margin-bottom: 50px">
            <form method="POST" action="{{ route('storeInvoice') }}">
                @method("POST")
                @csrf

                <div class="row justify-content-center">



                    <div class="col-xl-10 invoice-address-client">

                        <div class="row">

                            <div class="col-6">
                                <label for="payment-method-country" class="form-label">نوع
                                    المتلقى</label>
                                <div>
                                    <select name="receiverType" class="form-control text-center form-select">
                                        <option value="B" style="font-size: 20px">أعمال</option>
                                        <option value="P" style="font-size: 20px">شخص</option>
                                        <option value="F" style="font-size: 20px">أجنبى</option>

                                    </select>
                                </div>
                            </div>

                            @if (request()->routeIs('createInvoice2'))
                                @foreach ($companiess as $com)
                                    <div class="col-6">
                                        <label class="form-label">اسم الشركة</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverName"
                                                placeholder="اسم الشركة" value="{{ $com->name }}">
                                        </div>
                                    </div>
                        </div>



                        <div class="invoice-address-client-fields">
                            <div class="row">

                                <div class="form-group col-4">
                                    <label class="form-label">الرقم الضريبى / الرقم القومى</label>
                                    <div class="">
                                        <input type="number" style="width:300px" class="form-control text-center"
                                            name="receiverId" placeholder="الرقم الضريبى" value="{{ $com->tax_id }}">
                                    </div>
                                </div>

                                <div class="form-group col-4">
                                    <label class="form-label">اسم البلد</label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="receiverCountry"
                                            placeholder="اسم البلد" value="{{ $com->country }}">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label">اسم المحافظة</label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="receiverGovernate"
                                            placeholder="اسم المحافظة" value="{{ $com->governate }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">اسم المنطقة</label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="receiverRegionCity"
                                            placeholder="اسم المنطقة" value="{{ $com->regionCity }}">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label class="form-label">اسم الشارع </label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="street"
                                            placeholder="الشارع" value="{{ $com->street }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">



                                <div class="form-group col-6">
                                    <label class="form-label">رقم المبنى</label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="receiverBuildingNumber"
                                            placeholder="رقم المبنى" value="{{ $com->buildingNumber }}">
                                    </div>
                                </div>


                                <div class="form-group col-6">
                                    <label class="form-label"> الرقم البريدى (اختيارى)</label>
                                    <div class="">
                                        <input type="text" class="form-control text-center" name="receiverPostalCode"
                                            placeholder="الرقم البريدى (اختيارى) " value="{{ $com->postalCode }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label"> الدور (اختيارى)</label>
                                    <div class="">
                                        <input type="text" class="form-control  text-center" name="receiverFloor"
                                            placeholder="  (اختيارى) الدور" value="{{ $com->floor }}">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label class="form-label"> الغرفة (اختيارى)</label>
                                    <div class="">
                                        <input type="text" class="form-control  text-center" name="receiverRoom"
                                            placeholder="(اختيارى) الغرفة" value="{{ $com->room }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label"> علامة مميزة (اختيارى)</label>
                                    <div class="">
                                        <input type="text" class="form-control  text-center" name="receiverLandmark"
                                            placeholder="(اختيارى) علامة مميزة" value="{{ $com->landmark }}">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label class="form-label"> بيانات إضافية (اختيارى)</label>
                                    <div class="">
                                        <input type="text" class="form-control  text-center"
                                            name="receiverAdditionalInformation" placeholder="(اختيارى) بيانات إضافية "
                                            value="{{ $com->additionalInformation }}">
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        @else

                            <div class="col-6">
                                <label class="form-label">اسم الشركة</label>
                                <div class="">
                                    <input type="text" class="form-control text-center" name="receiverName"
                                        placeholder="اسم الشركة">
                                </div>
                            </div>
                            <div class="invoice-address-client-fields">

                                <div class="row">

                                    <div class="col-4">
                                        <label class="form-label">الرقم الضريبى / الرقم القومى</label>
                                        <div class="">
                                            <input type="number" style="width:350px" class="form-control text-center"
                                                name="receiverId" placeholder="الرقم الضريبى">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">اسم البلد</label>
                                        <div class="">
                                            <input type="text" class="form-control  text-center" name="receiverCountry"
                                                placeholder="اسم البلد">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">اسم المحافظة</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverGovernate"
                                                placeholder="اسم المحافظة">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <label class="form-label">اسم المنطقة</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverRegionCity"
                                                placeholder="اسم المنطقة">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">اسم الشارع </label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="street"
                                                placeholder="الشارع">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">


                                    <div class="col-6">
                                        <label class="form-label">رقم المبنى</label>
                                        <div class="">
                                            <input type="text" class="form-control  text-center"
                                                name="receiverBuildingNumber" placeholder="رقم المبنى">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <label class="form-label"> الرقم البريدى (اختيارى)</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverPostalCode"
                                                placeholder="الرقم البريدى (اختيارى) ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label"> الدور (اختيارى)</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverFloor"
                                                placeholder="  (اختيارى) الدور">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label"> الغرفة (اختيارى)</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center" name="receiverRoom"
                                                placeholder="(اختيارى) الغرفة">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label"> علامة مميزة (اختيارى)</label>
                                        <div class="">
                                            <input type="text" class="form-control  text-center" name="receiverLandmark"
                                                placeholder="(اختيارى) علامة مميزة">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label"> بيانات إضافية (اختيارى)</label>
                                        <div class="">
                                            <input type="text" class="form-control text-center"
                                                name="receiverAdditionalInformation" placeholder="(اختيارى) بيانات إضافية ">
                                        </div>
                                    </div>
                                </div>



                                @endif


                                <div class="row">
                                    <div class="col-6">
                                        <label for="payment-method-country" class="form-label">
                                            كود النشاط الضريبى</label>
                                        <div class="">
                                            <select name="taxpayerActivityCode" class="form-select">

                                                @foreach ($ActivityCodes as $code)
                                                    <option value="{{ $code->code }}"> {{ $code->Desc_ar }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="payment-method-country" class="form-label">نوع
                                            الوثيقة
                                        </label>
                                        @livewire('type')
                                    </div>

                                </div>






                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label"> تاريخ الفاتورة</label>
                                        <div class="">
                                            <input type="date" value="{{ date(' Y-m-d') }}"
                                                class="form-control text-center" name="date" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">الرقم الداخلى للفاتورة</label>

                                        <input type="text" class="form-control text-center" id="internalId"
                                            name="internalId" placeholder="الرقم الداخلى للفاتورة">


                                    </div>
                                    <div class="col-2" style="margin-top: 27px">


                                        <button onClick="randomTest();" class="btn btn-info"
                                            type="button">generate</button>

                                    </div>


                                </div>





                                <hr>
                                <div class="accordion" id="accordionExample" style="padding-top: 20px;">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="bankDetails">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">@lang("site.bank")
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="bankDetails" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">


                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">@lang("site.Bank Name")</label>
                                                        <input type="text" class="form-control form-control-sm text-center"
                                                            name="bankName" placeholder="  @lang(" site.Bank Name")">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">@lang("site.Bank Address")</label>
                                                        <input type="text" class="form-control form-control-sm text-center"
                                                            name="bankAddress" placeholder="  @lang(" site.Bank Address")">
                                                    </div>

                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"> @lang("site.Bank Account
                                                                No")</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-center"
                                                                name="bankAccountNo" placeholder="  @lang(" site.Bank
                                                                Account No")">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label"> @lang("site.Bank Account
                                                                IBAN")</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-center"
                                                                name="bankAccountIBAN" placeholder=" @lang(" site.Bank
                                                                Account IBAN")">

                                                        </div>
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label"> @lang("site.Swift
                                                                    Code")</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm text-center"
                                                                    name="swiftCode" placeholder="  @lang(" site.Swift
                                                                    Code")">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label"> @lang("site.Payment
                                                                    Terms")</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm text-center"
                                                                    name="Bankterms" placeholder="  @lang(" site.Payment
                                                                    Terms")">

                                                            </div>



                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <hr>









                            </div>

                        </div>


                    </div>
                    <hr style="border: 1px solid white;margin:50px 20px">
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="lineDetails">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                @lang("site.Line Items")</button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="lineDetails" data-bs-parent="#accordionExample">
                                            <div class="accordion-body" id="newOne">

                                                <div class="border border-3 p-4 rounded">
                                                    <div class="mb-3">
                                                        <label for="inputProductTitle"
                                                            class="form-label">@lang("site.Line
                                                            Items")</label>

                                                        <select name="itemCode[]" id="itemCode"
                                                            class="form-control form-control-sm form-select" required>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product['itemCode'] }}"
                                                                    style="font-size: 20px">
                                                                    {{ $product['codeNameSecondaryLang'] }}
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputProductDescription"
                                                            class="form-label">@lang("site.Line
                                                            Decription")</label>
                                                        <textarea name="invoiceDescription[]" class="form-control"
                                                            id="inputProductDescription" rows="2"></textarea>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="linePrice" class="form-label">Price</label>
                                                            <input class="form-control" step="any" type="number"
                                                                step="any" name="amountEGP[]" id="amountEGP"
                                                                onkeyup="operation(this.value),findTotalSalesAmount();;"
                                                                onmouseover="operation(this.value),findTotalSalesAmount();;">
                                                        </div>
                                                        <div class=" col-md-6">
                                                            <label class="form-label">Quantity</label>
                                                            <input class="form-control" type="number" step="any"
                                                                name="quantity[]" id="quantity"
                                                                onkeyup="proccess(this.value),findTotalSalesAmount();"
                                                                onmouseover="proccess(this.value),findTotalSalesAmount();">
                                                        </div>
                                                    </div>
                                                    <div class=" row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputProductTitle"
                                                                class="form-label">@lang("site.Tax
                                                                added Type")</label>

                                                            <select name="t1subtype[]" required id="t1subtype"
                                                                class="form-control form-control-sm form-select">
                                                                <option disabled selected
                                                                    style="font-size: 15px;width: 100px;">نوع الضريبة
                                                                </option>
                                                                @foreach ($taxTypes as $type)
                                                                    @if ($type->parent === 'T1')
                                                                        <option value="{{ $type->code }}"
                                                                            style="font-size: 15px;width: 100px;">
                                                                            {{ $type->name_ar }}

                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lineTaxAdd"
                                                                class="form-label">@lang("site.Tax_added")</label>
                                                            <input type="number" class="form-control" name="rate[]"
                                                                id="rate" class="form-control form-control-sm"
                                                                onkeyup="findTotalt2Amount()"
                                                                onmouseover="findTotalt2Amount()" placeholder="@lang("
                                                                site.Tax_added")">
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputProductTitle"
                                                                class="form-label">@lang("site.Tax t4
                                                                Type")</label>
                                                            <select name="t4subtype[]" required id="t4subtype"
                                                                class="form-control form-control-sm form-select">
                                                                <option disabled selected>@lang("site.Tax t4 Type")</option>
                                                                @foreach ($taxTypes as $type)
                                                                    @if ($type->parent === 'T4')
                                                                        <option value="{{ $type->code }}"
                                                                            style="font-size: 15px;width: 100px;">
                                                                            {{ $type->name_ar }}

                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lineTaxT4" class="form-label">@lang("site.Tax
                                                                t4
                                                                Value")</label>
                                                            <input type="number" class="form-control" name="t4rate[]"
                                                                id="t4rate" onkeyup="findTotalt4Amount()"
                                                                onmouseover="findTotalt4Amount()" placeholder="@lang("
                                                                site.Tax t4 Value")">
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="lineDiscount"
                                                                class="form-label">@lang("site.Discount")</label>

                                                            <input class="form-control" placeholder=" @lang("
                                                                site.Discount")" type="number" step="any"
                                                                name="discountAmount[]" id="discountAmount"
                                                                onkeyup="discount(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()"
                                                                onmouseover="discount(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lineDiscountAfterTax"
                                                                class="form-label">@lang("site.Discount_After_Tax")
                                                            </label>
                                                            <input type="number" class="form-control" step="any"
                                                                name="itemsDiscount[]" id="itemsDiscount"
                                                                onkeyup="itemsDiscountValue(this.value),findTotalAmount(),findTotalItemsDiscountAmount()"
                                                                onmouseover="itemsDiscountValue(this.value),findTotalAmount(),findTotalItemsDiscountAmount()"
                                                                placeholder="@lang(" site.Discount_After_Tax")">
                                                        </div>
                                                    </div>
                                                </div></BR>
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="mb-3">
                                                        @lang("site.Line Total")
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="TotalTaxableFees"
                                                                    class="form-label">@lang("site.Total
                                                                    Taxable
                                                                    Fees")</label>
                                                                <input type="number" readonly class="form-control"
                                                                    step="any" name="t2Amount[]" id="t2"
                                                                    onkeyup="findTotalt2Amount()"
                                                                    onmouseover="findTotalt2Amount()" placeholder="@lang("
                                                                    site.Total Taxable Fees")">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="Totalt4Amount"
                                                                    class="form-label">@lang("site.Totalt4Amount")</label>
                                                                <input type="number" class="form-control"
                                                                    name="t4Amount[]" readonly id="t4Amount"
                                                                    onkeyup="findTotalt4Amount()"
                                                                    onmouseover="findTotalt4Amount()" placeholder="@lang("
                                                                    site.Totalt4Amount")">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="Subtotal"
                                                                    class="form-label">@lang("site.Sub
                                                                    total")</label>
                                                                <input type="number" class="form-control"
                                                                    name="salesTotal[]" readonly id="salesTotal"
                                                                    placeholder="@lang(" site.Sub total")">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="NetTotal"
                                                                    class="form-label">@lang("site.Net
                                                                    Total")</label>
                                                                <input type="number" class="form-control" readonly
                                                                    name="netTotal[]" id="netTotal"
                                                                    onkeyup="nettotal(this.value),findTotalNetAmount()"
                                                                    onmouseover="nettotal(this.value),findTotalNetAmount()"
                                                                    placeholder="@lang(" site.Net Total")">
                                                            </div>
                                                        </div>
                                                        <div class="row g-3">

                                                            <div class="col-md-12">
                                                                <label for="lineTotal"
                                                                    class="form-label">@lang("site.lineTotal")</label>
                                                                <input type="number" class="form-control"
                                                                    name="totalItemsDiscount[]" readonly
                                                                    id="totalItemsDiscount" onkeyup="findTotalAmount()"
                                                                    onmouseover="findTotalAmount()" placeholder="@lang("
                                                                    site.lineTotal")">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div style="z-index:1;text-align: center">
                                                <button id="addNewOne" type="button" class="btn btn-info"
                                                    style="width: 200px">Add
                                                    Line</button>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>







                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="findTotalt2Amount" class="form-label">@lang("site.Total T2
                                                Amount")</label>
                                            <input type="number" class="form-control" step="any" name="totalt2Amount"
                                                onmouseover="findTotalt2Amount()" onkeyup="findTotalt2Amount()" readonly
                                                id="totalt2Amount">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="findTotalt4Amount" class="form-label">@lang("site.Total T4
                                                Amount")</label>
                                            <<input class="form-control" type="number" step="any" name="totalt4Amount"
                                                onmouseover="findTotalt4Amount()" onkeyup="findTotalt4Amount()" readonly
                                                id="totalt4Amount">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="salesTotal" class="form-label">@lang("site.Sales
                                                Total")</label>
                                            <input type="number" class="form-control" name="totalDiscountAmount"
                                                onmouseover="findTotalDiscountAmount()" onkeyup="findTotalDiscountAmount()"
                                                readonly id="totalDiscountAmount">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="netTotal" class="form-label">@lang("site.Net Total")</label>
                                            <input type="number" class="form-control" step="any" name="TotalSalesAmount"
                                                onmouseover="findTotalSalesAmount()" onkeyup="findTotalSalesAmount()"
                                                readonly id="TotalSalesAmount">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="findTotalNetAmount" class="form-label">@lang("site.Total Net
                                                Amount")</label>
                                            <input type="number" step="any" class="form-control" name="TotalNetAmount"
                                                onmouseover="findTotalNetAmount()" onkeyup="findTotalNetAmount()" readonly
                                                id="TotalNetAmount">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="TotalDiscount" class="form-label">@lang("site.Total
                                                Discount")</label>
                                            <input type="number" step="any" name="totalItemsDiscountAmount"
                                                class="form-control" onmouseover="findTotalItemsDiscountAmount()"
                                                onkeyup="findTotalItemsDiscountAmount()" readonly
                                                id="totalItemsDiscountAmount">
                                        </div>


                                        <div class="col-12">
                                            <label for="ExtraInvoiceDiscount" class="form-label">@lang("site.Extra
                                                Invoice
                                                Discount") </label>
                                            <input type="number" class="form-control" step="any" name="ExtraDiscount"
                                                id="ExtraDiscount" onkeyup="Extradiscount(this.value),findTotalAmount()"
                                                onmouseover="Extradiscount(this.value),findTotalAmount()" required>
                                        </div>


                                        <div class="col-12">
                                            <label for="findTotalAmount" class="form-label">إجمالى المبلغ (قبل الخصم)
                                            </label>
                                            <input class="form-control" type="number" step="any" name="totalAmount"
                                                readonly id="totalAmount">
                                        </div>


                                        <div class="col-12">
                                            <label for="findTotalAmount" class="form-label">إجمالى المبلغ (بعد الخصم)
                                            </label>
                                            <input type="number" class="form-control"
                                                style="color: red;font-weight: bold;font-size: 20px" type="number"
                                                step="any" name="totalAmount2" readonly id="totalAmount2">
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Submit Document</button>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

    @endsection







    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let i = 1
            $("#addNewOne").click(function() {
                i++;
                $('#newOne').append(
                    `<div id="row${i}">
                                <button type="button" style="margin-right:30px" name="remove" id="${i}"  class="btn btn-danger btn_remove">x</button>


                               <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">@lang("site.Line
                                        Items")</label>

                                    <select name="itemCode[]" id="itemCode" class="form-control form-control-sm form-select" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product['itemCode'] }}" style="font-size: 20px">
                                                {{ $product['codeNameSecondaryLang'] }}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">@lang("site.Line
                                        Decription") ${i}</label>
                                    <textarea name="invoiceDescription[]" class="form-control" id="inputProductDescription" rows="2"></textarea>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="linePrice" class="form-label">Price</label>
                                        <input class="form-control" step="any" type="number" step="any" name="amountEGP[]" id="amountEGP${i}"
                                            onkeyup="operation${i}(this.value),findTotalSalesAmount();;"
                                            onmouseover="operation${i}(this.value),findTotalSalesAmount();;">
                                    </div>
                                    <div class=" col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input class="form-control" type="number" step="any" name="quantity[]" id="quantity${i}"
                                            onkeyup="proccess${i}(this.value),findTotalSalesAmount();"
                                            onmouseover="proccess${i}(this.value),findTotalSalesAmount();">
                                    </div>
                                </div>
                                <div class=" row g-3">
                                    <div class="col-md-6">
                                        <label for="inputProductTitle" class="form-label">@lang("site.Tax
                                            added Type")</label>

                                        <select name="t1subtype[]" required id="t1subtype" class="form-control form-control-sm form-select">
                                            <option disabled selected style="font-size: 15px;width: 100px;">نوع الضريبة
                                            </option>
                                            @foreach ($taxTypes as $type)
                                                @if ($type->parent === 'T1')
                                                    <option value="{{ $type->code }}" style="font-size: 15px;width: 100px;">
                                                        {{ $type->name_ar }}

                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineTaxAdd" class="form-label">@lang("site.Tax_added")</label>
                                        <input type="number" class="form-control" name="rate[]" id="rate${i}" class="form-control form-control-sm"
                                            onkeyup="findTotalt2Amount()" onmouseover="findTotalt2Amount()" placeholder="@lang(" site.Tax_added")">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputProductTitle" class="form-label">@lang("site.Tax t4
                                            Type")</label>
                                        <select name="t4subtype[]" required id="t4subtype" class="form-control form-control-sm form-select">
                                            <option disabled selected>@lang("site.Tax t4 Type")</option>
                                            @foreach ($taxTypes as $type)
                                                @if ($type->parent === 'T4')
                                                    <option value="{{ $type->code }}" style="font-size: 15px;width: 100px;">
                                                        {{ $type->name_ar }}

                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineTaxT4" class="form-label">@lang("site.Tax t4
                                            Value")</label>
                                        <input type="number" class="form-control" name="t4rate[]" id="t4rate${i}" onkeyup="findTotalt4Amount()"
                                            onmouseover="findTotalt4Amount()" placeholder="@lang(" site.Tax t4 Value")">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="lineDiscount" class="form-label">@lang("site.Discount")</label>

                                        <input class="form-control" placeholder=" @lang(" site.Discount")" type="number" step="any"
                                            name="discountAmount[]" id="discountAmount${i}"
                                            onkeyup="discount${i}(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()"
                                            onmouseover="discount${i}(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineDiscountAfterTax" class="form-label">@lang("site.Discount_After_Tax") </label>
                                        <input type="number" class="form-control" step="any" name="itemsDiscount[]" id="itemsDiscount${i}"
                                            onkeyup="itemsDiscountValue${i}(this.value),findTotalAmount(),findTotalItemsDiscountAmount()"
                                            onmouseover="itemsDiscountValue${i}(this.value),findTotalAmount(),findTotalItemsDiscountAmount()"
                                            placeholder="@lang(" site.Discount_After_Tax")">
                                    </div>
                                </div>
                            </div></BR>
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    @lang("site.Line Total")
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="TotalTaxableFees" class="form-label">@lang("site.Total
                                                Taxable
                                                Fees")</label>
                                            <input type="number" readonly class="form-control" step="any" name="t2Amount[]" id="t2${i}"
                                                onkeyup="findTotalt2Amount()" onmouseover="findTotalt2Amount()" placeholder="@lang(" site.Total
                                                Taxable Fees")">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Totalt4Amount" class="form-label">@lang("site.Totalt4Amount")</label>
                                            <input type="number" class="form-control" name="t4Amount[]" readonly id="t4Amount${i}"
                                                onkeyup="findTotalt4Amount()" onmouseover="findTotalt4Amount()" placeholder="@lang("
                                                site.Totalt4Amount")">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="Subtotal" class="form-label">@lang("site.Sub
                                                total")</label>
                                            <input type="number" class="form-control" name="salesTotal[]" readonly id="salesTotal${i}"
                                                placeholder="@lang(" site.Sub total")">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="NetTotal" class="form-label">@lang("site.Net
                                                Total")</label>
                                            <input type="number" class="form-control" readonly name="netTotal[]" id="netTotal${i}"
                                                onkeyup="nettotal${i}(this.value),findTotalNetAmount()"
                                                onmouseover="nettotal${i}(this.value),findTotalNetAmount()" placeholder="@lang(" site.Net Total")">
                                        </div>
                                    </div>
                                    <div class="row g-3">

                                        <div class="col-md-12">
                                            <label for="lineTotal" class="form-label">@lang("site.lineTotal")</label>
                                            <input type="number" class="form-control" name="totalItemsDiscount[]" readonly id="totalItemsDiscount${i}"
                                                onkeyup="findTotalAmount()" onmouseover="findTotalAmount()" placeholder="@lang(" site.lineTotal")">
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <hr>
                        </div> `


                )


                $('<script> function operation' + i +
                    '(value) {var x, y, z;  var quantity = document.getElementById("quantity' + i +
                    '").value; x = value * quantity; document.getElementById("salesTotal' + i +
                    '").value = x.toFixed(5);};  function proccess' + i +
                    '(value) {var x, y, z;  var amounEGP = document.getElementById("amountEGP' + i +
                    '").value; y = value * amounEGP; document.getElementById("salesTotal' + i +
                    '").value = y.toFixed(5);};function discount' + i +
                    '(value) {var salesTotal, netTotal, z, t2valueEnd, t1Value, rate, t4rate, t4Amount; salesTotal = document.getElementById("salesTotal' +
                    i +
                    '").value; netTotal = salesTotal - value; netTotalEnd = document.getElementById("netTotal' +
                    i + '").value = netTotal.toFixed(5); rate = document.getElementById("rate' + i +
                    '").value; t4rate = document.getElementById("t4rate' + i +
                    '").value;  t2valueEnd = document.getElementById("t2' + i +
                    '").value = ((netTotalEnd * rate) / 100).toFixed(5); t4Amount = document.getElementById("t4Amount' +
                    i +
                    '").value = ((netTotal * t4rate) / 100).toFixed(5);}; function itemsDiscountValue' +
                    i +
                    '(value) {var x, netTotal, t1amount, t2amount, t4Amount;netTotal = document.getElementById("netTotal' +
                    i + '").value;t2amount = document.getElementById("t2' + i +
                    '").value;t4Amount = document.getElementById("t4Amount' + i +
                    '").value;x = parseFloat(netTotal) + parseFloat(t2amount) - parseFloat(t4Amount) - parseFloat(value);document.getElementById("totalItemsDiscount' +
                    i + '").value = x.toFixed(5);};  </' + 'script>').appendTo('#test123');
                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $("#row" + button_id + "").remove()
                    findTotalDiscountAmount();
                    findTotalSalesAmount();
                    findTotalNetAmount();
                    findTotalt4Amount();
                    findTotalt2Amount();
                    findTotalAmount();
                    findTotalItemsDiscountAmount();
                })
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <script id="test123">
        // this is invoice 1

        function operation(value) {
            var x, y, z;

            var quantity = document.getElementById("quantity").value;
            x = value * quantity;
            document.getElementById("salesTotal").value = x.toFixed(5);
        };

        function proccess(value) {
            var x, y, z;
            var amounEGP = document.getElementById("amountEGP").value;
            y = value * amounEGP;
            document.getElementById("salesTotal").value = y.toFixed(5);
        };

        function discount(value) {
            var salesTotal, netTotal, z, t2valueEnd, t1Value, rate, t4rate, t4Amount;
            salesTotal = document.getElementById("salesTotal").value;
            netTotal = salesTotal - value;

            netTotalEnd = document.getElementById("netTotal").value = netTotal.toFixed(5);
            rate = document.getElementById("rate").value;
            t4rate = document.getElementById("t4rate").value;
            t2valueEnd = document.getElementById("t2").value =
                ((netTotalEnd * rate) / 100).toFixed(5);
            t4Amount = document.getElementById("t4Amount").value =
                ((netTotal * t4rate) / 100).toFixed(5);
        }

        function itemsDiscountValue(value) {
            var x, netTotal, t1amount, t2amount, t4Amount;
            netTotal = document.getElementById("netTotal").value;
            t2amount = document.getElementById("t2").value;
            t4Amount = document.getElementById("t4Amount").value;
            x =
                parseFloat(netTotal) +
                parseFloat(t2amount) -
                parseFloat(t4Amount) -
                parseFloat(value);
            document.getElementById("totalItemsDiscount").value = x.toFixed(5);
        }

        function Extradiscount(value) {
            var totalDiscount, x;
            totalDiscount = document.getElementById("totalAmount").value;
            x = totalDiscount - value;
            document.getElementById("totalAmount2").value = x.toFixed(5);
        }

        function findTotalDiscountAmount() {
            var arr = document.getElementsByName("discountAmount[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("totalDiscountAmount").value = tot.toFixed(5);

        }

        function findTotalSalesAmount() {
            var arr = document.getElementsByName("salesTotal[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("TotalSalesAmount").value = tot.toFixed(5);

        }

        function findTotalNetAmount() {
            var arr = document.getElementsByName("netTotal[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("TotalNetAmount").value = tot.toFixed(5);

        }

        function findTotalt4Amount() {
            var arr = document.getElementsByName("t4Amount[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("totalt4Amount").value = tot.toFixed(5);
        }

        function findTotalt2Amount() {
            var arr = document.getElementsByName("t2Amount[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("totalt2Amount").value = tot.toFixed(5);
        }

        function findTotalAmount() {
            var arr = document.getElementsByName("totalItemsDiscount[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("totalAmount").value = tot.toFixed(5);
        }

        function findTotalItemsDiscountAmount() {
            var arr = document.getElementsByName("itemsDiscount[]");
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value)) {
                    tot += parseFloat(arr[i].value);
                }
            }
            document.getElementById("totalItemsDiscountAmount").value = tot.toFixed(5);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
