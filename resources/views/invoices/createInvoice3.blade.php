@extends('layouts.main')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">@lang("site.addInvoice")</div>


        </div>
    </div>
    <!--end breadcrumb-->

    <!--Choose / Add Reciever-->
    <div class="card">
        <div class="card-body p-6">
            <div class="form-body mt-6">
                <div class="row">
                    @if(request()->routeIs('createInvoice3'))
                    <div class="col-6">
                        <form action="{{route('createInvoice4')}}" method="GET">
                            <label for="inputCollection" class="form-label">@lang("site.chooseReceiver")</label>
                            <select class="single-select" name="receiverName" class="form-control" id="receiverName">
                                <option selected disabled>@lang("site.chooseReceiver")</option>
                                @foreach ($allCompanies as $companies)
                                <option value="{{ $companies->id }}" class="form-control">{{ $companies->name }}
                                </option>
                                @endforeach


                            </select>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"
                                    style="margin-right: 50px;margin-top: 8px;">@lang("site.fillDetails")</button>
                            </div>
                        </form>
                    </div>
                    @else
                    <div style="text-align: center">
                        <a href="{{ route('createInvoice3') }}" class="btn btn-success"
                            style="text-align: center">الرجوع لاختيار
                            الشركة</a>
                    </div>
                    @endif

                    <div class="col-3">
                        </br><a href="{{ route('customer.create') }}" class="btn btn-info"
                            style="margin-right: 50px;margin-top: 8px;">
                            @lang("site.addReceiver") </a> </div>


                    <div class="row">
                        <div class="col-6">
                            <label for="payment-method-country" class="form-label">@lang("site.Reciever_type")</label>
                            <select name="receiverType" class="form-control form-control-sm form-select">
                                <option value="B" style="font-size: 20px">@lang("site.Company")</option>
                                <option value="P" style="font-size: 20px">@lang("site.Person")</option>
                                <option value="F" style="font-size: 20px">@lang("site.Forign")</option>

                            </select>
                        </div>
                        @if(request()->routeIs('createInvoice3'))
                        <div class="col-6">
                            <div class="form-group">
                                <label for="recieverName" class="form-label">@lang("site.Reciever_Name")</label>
                                <input type="text" class="form-control" name="receiverName" placeholder="@lang("
                                    site.Reciever_Name")" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="receiverId" class="form-label"
                            style="margin-top:.5rem;">@lang("site.Reciever_Registration_Number_ID")</label>
                        <input type="number" class="form-control" name="receiverId" placeholder="@lang("
                            site.Reciever_Registration_Number_ID")" value="">
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="recieverCountry" class="form-label"
                                style="margin-top:.5rem;">@lang("site.Country")</label>
                            <input type="text" class="form-control" name="receiverCountry" placeholder="@lang("
                                site.Country")" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="receiverGovernate" class="form-label"
                            style="margin-top:.5rem;">@lang("site.Governorate")</label>
                        <input type="text" class="form-control" name="receiverGovernate" placeholder="@lang("
                            site.Governorate")" value="">
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="receiverRegionCity" class="form-label"
                                style="margin-top:.5rem;">@lang("site.City")</label>
                            <input type="text" class="form-control" name="receiverRegionCity" placeholder="@lang("
                                site.City")" value="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="recieverStreet" class="form-label"
                            style="margin-top:.5rem;">@lang("site.StreetName")</label>
                        <input type="text" class="form-control" name="street" placeholder="@lang(" site.StreetName")"
                            value="">
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="receiverPostalCode" class="form-label"
                                style="margin-top:.5rem;">@lang("site.PostalCode")</label>
                            <input type="number" class="form-control" name="receiverPostalCode" placeholder="@lang("
                                site.PostalCode")" value="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label for="receiverFloor" class="form-label"
                        style="margin-top:.5rem;">@lang("site.FloorNo")</label>
                    <input type="text" class="form-control" name="receiverFloor" placeholder="@lang(" site.FloorNo")"
                        value="">
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="receiverRoom" class="form-label"
                            style="margin-top:.5rem;">@lang("site.FlatNo")</label>
                        <input type="number" class="form-control" name="receiverRoom" placeholder="@lang("
                            site.FlatNo")" value="">
                    </div>


                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="receiverLandmark" class="form-label"
                            style="margin-top:.5rem;">@lang("site.landmark")</label>
                        <input type="text" class="form-control" name="receiverLandmark" placeholder="@lang("
                            site.landmark")" value="">
                    </div>

                    <div class="col-6">
                        <div class="form-group row">
                            <label for="receiverAdditionalInformation" class="form-label"
                                style="margin-top:.5rem;">@lang("site.AdditionalInformation")</label>
                            <input type="number" class="form-control" name="receiverAdditionalInformation"
                                placeholder="@lang(" site.AdditionalInformation")" value="">
                        </div>
                    </div>
                </div>

            </div>
            @else
            @foreach ($companiess as $com)
            <div class="col-6">
                <div class="form-group">
                    <label for="recieverName" class="form-label">@lang("site.Reciever_Name")</label>
                    <input type="text" class="form-control" name="receiverName" placeholder="@lang("
                        site.Reciever_Name")" value="{{ $com->name }}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="receiverId" class="form-label"
                style="margin-top:.5rem;">@lang("site.Reciever_Registration_Number_ID")</label>
            <input type="number" class="form-control" name="receiverId" placeholder="@lang("
                site.Reciever_Registration_Number_ID")" value="{{ $com->tax_id }}">
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="recieverCountry" class="form-label" style="margin-top:.5rem;">@lang("site.Country")</label>
                <input type="text" class="form-control" name="receiverCountry" placeholder="@lang(" site.Country")"
                    value="{{ $com->country }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="receiverGovernate" class="form-label"
                style="margin-top:.5rem;">@lang("site.Governorate")</label>
            <input type="text" class="form-control" name="receiverGovernate" placeholder="@lang(" site.Governorate")"
                value="{{ $com->governate }}">
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="receiverRegionCity" class="form-label" style="margin-top:.5rem;">@lang("site.City")</label>
                <input type="text" class="form-control" name="receiverRegionCity" placeholder="@lang(" site.City")"
                    value="{{ $com->regionCity }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="recieverStreet" class="form-label" style="margin-top:.5rem;">@lang("site.StreetName")</label>
            <input type="text" class="form-control" name="street" placeholder="@lang(" site.StreetName")"
                value="{{ $com->street }}">
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="receiverPostalCode" class="form-label"
                    style="margin-top:.5rem;">@lang("site.PostalCode")</label>
                <input type="number" class="form-control" name="receiverPostalCode" placeholder="@lang("
                    site.PostalCode")" value="{{ $com->postalCode }}">
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-6">
        <label for="receiverFloor" class="form-label" style="margin-top:.5rem;">@lang("site.FloorNo")</label>
        <input type="text" class="form-control" name="receiverFloor" placeholder="@lang(" site.FloorNo")"
            value="{{ $com->floor }}">
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="receiverRoom" class="form-label" style="margin-top:.5rem;">@lang("site.FlatNo")</label>
            <input type="text" class="form-control" name="receiverRoom" placeholder="@lang(" site.FlatNo")"
                value="{{ $com->room }}">
        </div>


    </div>
    <div class="row">
        <div class="col-6">
            <label for="receiverLandmark" class="form-label" style="margin-top:.5rem;">@lang("site.landmark")</label>
            <input type="text" class="form-control" name="receiverLandmark" placeholder="@lang(" site.landmark")"
                value="{{ $com->landmark }}">
        </div>

        <div class="col-6">
            <div class="form-group row">
                <label for="receiverAdditionalInformation" class="form-label"
                    style="margin-top:.5rem;">@lang("site.AdditionalInformation")</label>
                <input type="text" class="form-control" name="receiverAdditionalInformation" placeholder="@lang("
                    site.AdditionalInformation")" value="{{ $com->additionalInformation }}">
            </div>
        </div>
    </div>

</div>
@endforeach
@endif

<hr>




<div class="row">
    <div class="col-6">
        <label for="payment-method-country" class="form-label" style="margin-bottom: 5px; ">
            @lang("site.Tax Activity Code")</label>
        <select name="taxpayerActivityCode" class="form-select">
            @foreach ($ActivityCodes as $code)
            <option value="{{ $code->code }}"> {{ $code->Desc_ar }} </option>
            @endforeach
        </select>
    </div>



    <div class="col-6">
        <label for="payment-method-country" class="form-label">@lang("site.Document Type")</label>
        <select name="DocumentType" class="form-control form-control-sm form-select">
            <option value="I" selected>فاتورة</option>
            <option value="C">إشعار دائن</option>
            <option value="D">إشعار مدين</option>
        </select>
    </div>

    <div class="row">
        <div class="col-6">
            <label class="form-label">@lang("site.Internal ID")</label>

            <input type="text" class="form-control form-control-sm text-center" style="float: left; " id="internalId"
                name="internalId" placeholder="@lang(" site.Internal ID")">

            <button onClick="randomTest();" class="btn btn-sm btn-outline-secondary"
                type="button">@lang("site.Generate")</button>

        </div>



        <div class="col-6">
            <label class="form-label" style="margin-top: 5px;"> @lang("site.Document Date")</label>

            <input type="date" value="{{ date(" Y-m-d") }}" class="form-control form-control-sm text-center" name="date"
                placeholder="">

        </div>

    </div>

    <!--end page wrapper -->
    <div class="accordion" id="accordionExample" style="padding-top: 20px;">

        <div class="accordion-item">
            <h2 class="accordion-header" id="bankDetails">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false"
                    aria-controls="collapseThree">@lang("site.bank") </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="bankDetails"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">@lang("site.Bank Name")</label>
                            <input type="text" class="form-control form-control-sm text-center" name="bankName"
                                placeholder="  @lang(" site.Bank Name")">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">@lang("site.Bank Address")</label>
                            <input type="text" class="form-control form-control-sm text-center" name="bankAddress"
                                placeholder="  @lang(" site.Bank Address")">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"> @lang("site.Bank Account No")</label>
                                <input type="text" class="form-control form-control-sm text-center" name="bankAccountNo"
                                    placeholder="  @lang(" site.Bank Account No")">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"> @lang("site.Bank Account IBAN")</label>
                                <input type="text" class="form-control form-control-sm text-center"
                                    name="bankAccountIBAN" placeholder=" @lang(" site.Bank Account IBAN")">

                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"> @lang("site.Swift Code")</label>
                                    <input type="text" class="form-control form-control-sm text-center" name="swiftCode"
                                        placeholder="  @lang(" site.Swift Code")">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"> @lang("site.Payment Terms")</label>
                                    <input type="text" class="form-control form-control-sm text-center" name="Bankterms"
                                        placeholder="  @lang(" site.Payment Terms")">

                                </div>



                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="form-body mt-4">
    <div class="row">
        <div class="col-lg-8">

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="lineDetails">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            @lang("site.Line Items")</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="lineDetails"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">@lang("site.Line
                                        Items")</label>

                                    <select name="itemCode[]" id="itemCode"
                                        class="form-control form-control-sm form-select">
                                        <option disabled selected>اختر النشاط</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product['itemCode'] }}" style="font-size: 20px">
                                            {{$product['codeNameSecondaryLang']}}
                                            @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">@lang("site.Line
                                        Decription")</label>
                                    <textarea name="invoiceDescription[]" class="form-control"
                                        id="inputProductDescription" rows="2"></textarea>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="linePrice" class="form-label">Price</label>
                                        <input class="form-control" step="any" id="linePrice" type=number step="any"
                                            name="amountEGP[]" id="amountEGP"
                                            onkeyup="operation(this.value),findTotalSalesAmount();;"
                                            onmouseover="operation(this.value),findTotalSalesAmount();;">
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="lineQuantity" class="form-label">Quantity</label>
                                        <input class="form-control" type="number" step="any" name="quantity[]"
                                            id="quantity" onkeyup="proccess(this.value),findTotalSalesAmount();"
                                            onmouseover="proccess(this.value),findTotalSalesAmount();">
                                    </div>
                                </div>
                                <div class=" row g-3">
                                    <div class="col-md-6">
                                        <label for="inputProductTitle" class="form-label">@lang("site.Tax
                                            added Type")</label>

                                        <select name="itemCode[]" id="itemCode"
                                            class="form-control form-control-sm form-select">
                                            <option disabled selected>@lang("site.Tax added Type")</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineTaxAdd" class="form-label">@lang("site.Tax_added")</label>
                                        <input type="number" class="form-control" id="lineTaxAdd" placeholder="@lang("
                                            site.Tax_added")">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputProductTitle" class="form-label">@lang("site.Tax t4
                                            Type")</label>
                                        <select name="itemCode[]" id="itemCode"
                                            class="form-control form-control-sm form-select">
                                            <option disabled selected>@lang("site.Tax t4 Type")</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineTaxT4" class="form-label">@lang("site.Tax t4
                                            Value")</label>
                                        <input type="number" class="form-control" id="lineTaxT4" placeholder="@lang("
                                            site.Tax t4 Value")">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="lineDiscount" class="form-label">@lang("site.Discount")</label>
                                        <input type="number" class="form-control" id="linePrice" placeholder=" @lang("
                                            site.Discount")">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lineDiscountAfterTax"
                                            class="form-label">@lang("site.Discount_After_Tax") </label>
                                        <input type="number" class="form-control" id="lineDiscountAfterTax"
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
                                            <input type="number" class="form-control" id="TotalTaxableFees"
                                                placeholder="@lang(" site.Total Taxable Fees")">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Totalt4Amount"
                                                class="form-label">@lang("site.Totalt4Amount")</label>
                                            <input type="number" class="form-control" id="Totalt4Amount"
                                                placeholder="@lang(" site.Totalt4Amount")">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="Subtotal" class="form-label">@lang("site.Sub
                                                total")</label>
                                            <input type="number" class="form-control" id="Subtotal" placeholder="@lang("
                                                site.Sub total")">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="NetTotal" class="form-label">@lang("site.Net
                                                Total")</label>
                                            <input type="number" class="form-control" id="NetTotal" placeholder="@lang("
                                                site.Net Total")">
                                        </div>
                                    </div>
                                    <div class="row g-3">

                                        <div class="col-md-12">
                                            <label for="lineTotal" class="form-label">@lang("site.lineTotal")</label>
                                            <input type="number" class="form-control" id="lineTotal"
                                                placeholder="@lang(" site.lineTotal")">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="z-index:1;text-align: center">
                    <button onclick="addLine()">Add Line</button>

                </div>

            </div>
        </div>







        <div class="col-lg-4">
            <div class="border border-3 p-4 rounded">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="findTotalt2Amount" class="form-label">@lang("site.Total T2
                            Amount")</label>
                        <input type="number" readonly class="form-control" id="findTotalt2Amount">
                    </div>
                    <div class="col-md-6">
                        <label for="findTotalt4Amount" class="form-label">@lang("site.Total T4
                            Amount")</label>
                        <input type="number" readonly class="form-control" id="findTotalt4Amount">
                    </div>
                    <div class="col-md-6">
                        <label for="salesTotal" class="form-label">@lang("site.Sales Total")</label>
                        <input type="number" readonly class="form-control" id="salesTotal">
                    </div>
                    <div class="col-md-6">
                        <label for="netTotal" class="form-label">@lang("site.Net Total")</label>
                        <input type="number" readonly class="form-control" id="netTotal">
                    </div>
                    <div class="col-md-6">
                        <label for="findTotalNetAmount" class="form-label">@lang("site.Total Net
                            Amount")</label>
                        <input type="number" readonly class="form-control" id="findTotalNetAmount">
                    </div>
                    <div class="col-md-6">
                        <label for="TotalDiscount" class="form-label">@lang("site.Total Discount")</label>
                        <input type="number" readonly class="form-control" id="TotalDiscount">
                    </div>


                    <div class="col-12">
                        <label for="ExtraInvoiceDiscount" class="form-label">@lang("site.Extra Invoice
                            Discount") </label>
                        <input type="number" class="form-control" id="ExtraInvoiceDiscount">
                    </div>
                    <div class="col-12">
                        <label for="findTotalAmount" class="form-label">@lang("site.Total Paid Amount")
                        </label>
                        <input type="number" readonly class="form-control" id="findTotalAmount">
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary">Submit Document</button>
                        </div>
                    </div>

                </div>

            </div>
            <!--end row-->
