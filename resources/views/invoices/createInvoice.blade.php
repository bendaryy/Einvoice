@extends('layouts.main')
@section('content')


{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}
<style>
    th,
    td {
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

    input[type="number"] {
        width: 130;
        text-align: center
    }

    input[name="totalItemsDiscount[]"],
    input[name="totalAmount2"],
    input[name="totalAmount"] {
        width: 250;
    }

    input[readonly] {
        background-color: #ccc
    }

    hr {
        border: 4px solid orange;
    }
</style>
<div class="row">

    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">إنشاء فاتورة جديدة</h6>
        <br />

        @if(request()->routeIs('createInvoice'))
        <form action="{{route('createInvoice2')}}" method="GET">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <div class="mb-3">
                            <label class="form-label">اختر اسم الشركة</label>
                            <select class="single-select" name="receiverName" class="form-control" id="receiverName">
                                <option selected disabled>اختر اسم الشركة</option>
                                @foreach ($allCompanies as $companies)
                                <option value="{{ $companies->id }}" class="form-control">{{ $companies->name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ملئ بيانات الشركة</button>
            </div>
        </form>
        @else
        <div style="text-align: center">
            <a href="{{ route('createInvoice') }}" class="btn btn-success" style="text-align: center">الرجوع لاختيار
                الشركة</a>
        </div>
        @endif
    </div>

    <div style="margin-bottom: 50px">

        <form method="POST" action="{{ route('storeInvoice') }}">
            @method("POST")
            @csrf

            <div class="row justify-content-center">



                <div class="col-xl-5 invoice-address-client">

                    <h3 style="text-align: center;margin:40px">الفاتورة الى</h3>

                    @if(request()->routeIs('createInvoice2'))
                    @foreach ($companiess as $com)


                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">اسم الشركة</label>
                        <input type="text" class="form-control form-control-sm text-center" name="receiverName"
                            placeholder="اسم الشركة" value="{{ $com->name }}">
                        <div class="valid-feedback">Looks good!</div>
                    </div>


                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">الرقم الضريبى</label>
                        <input style="width: 200px" type="number" class="form-control form-control-sm text-center"
                            name="receiverId" placeholder="الرقم الضريبى" value="{{ $com->tax_id }}">
                        <div class="valid-feedback">Looks good!</div>
                    </div>




                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">عنوان الشركة</label>
                        <input type="text" class="form-control form-control-sm text-center" name="street"
                            placeholder="عنوان الشركة" value="{{ $com->company_address }}">
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    @endforeach
                    @else


                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">اسم الشركة</label>
                        <input type="text" class="form-control form-control-sm text-center" name="receiverName"
                            placeholder="اسم الشركة">
                        <div class="valid-feedback">Looks good!</div>
                    </div>


                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">الرقم الضريبى</label>
                        <input style="width: 200px" type="number" class="form-control form-control-sm text-center"
                            name="receiverId" placeholder="الرقم الضريبى">
                        <div class="valid-feedback">Looks good!</div>
                    </div>




                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">عنوان الشركة</label>
                        <input type="text" class="form-control form-control-sm text-center" name="street"
                            placeholder="عنوان الشركة">
                        <div class="valid-feedback">Looks good!</div>
                    </div>

                    @endif


                    <div class="col-md-10">
                        <label for="inputState" class="form-label">نوع المتلقى</label>
                        <select name="receiverType" class="form-select">
                            <option value="B" style="font-size: 20px">أعمال</option>
                            <option value="P" style="font-size: 20px">شخص</option>
                            <option value="F" style="font-size: 20px">أجنبى</option>
                        </select>
                    </div>



                    <div class="col-md-10">
                        <label for="inputState" class="form-label">كود النشاط الضريبى</label>
                        <select name="taxpayerActivityCode" class="form-select">

                            @foreach ($ActivityCodes as $code)
                            <option value="{{ $code->code }}"> {{ $code->Desc_ar }} </option>
                            @endforeach
                        </select>
                    </div>


                    {{-- <div class="form-group row invoice-created-by">
                        <label for="payment-method-country" class="col-sm-3 col-form-label col-form-label-sm">نوع العنصر
                        </label>
                        <div class="col-sm-9">
                            <select name="itemType" class="form-control form-control-sm">
                                <option value="EGS">EGS</option>
                                <option value="GS1">GS1</option>

                            </select>
                        </div>
                    </div> --}}





                    <div class="col-md-10">
                        <label for="inputState" class="form-label">نوع الوثيقة</label>
                        <select name="DocumentType" class="form-select">
                            <option value="I" selected>فاتورة</option>
                            <option value="C">إشعار دائن</option>
                            <option value="D">إشعار مدين</option>
                        </select>
                    </div>




                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">الرقم الداخلى للفاتورة</label>
                        <input type="text" class="form-control form-control-sm text-center" name="internalId"
                            placeholder="الرقم الداخلى للفاتورة">
                        <div class="valid-feedback">Looks good!</div>
                    </div>



                    <div class="col-md-10">
                        <label class="form-label">تاريخ الفاتورة</label>
                        <input type="date" value="{{ date(" Y-m-d") }}" class="form-control" value="{{ date(" Y-m-d")
                            }}" name="date">
                    </div>
                </div>
            </div>
    </div>
</div>

<hr style="border: 1px solid white;margin:50px 20px">
<div id="newOne">

    <div class="col-9" style="text-align: center;margin:auto;margin-bottom: 25px">
        <label for="inputAddress" class="form-label">وصف تفصيلى للفاتورة</label>
        <textarea class="form-control" name="invoiceDescription[]" placeholder="وصف تفصيلى لصرف الفاتورة"
            style="height: 88px;width: 360px;text-align: center;margin:auto"></textarea>
    </div>



    <table style="margin: auto" border="1">

        <tr>

            <th>قيمة الضريبة (%)</th>
            <th>النشاط </th>
            <th>قيمة ضريبة المنبع %</th>
            <th>الكمـــية</th>
            <th>المبلغ بالجنيه المصرى</th>
            <th>الخصـــم</th>
            <th>خصــم الأصنــاف</th>
        </tr>
        <tr>
            <td>
                {{-- <select name="rate[]" id="rate" class="form-control form-control-sm" onkeyup="findTotalt2Amount()"
                    onmouseover="findTotalt2Amount()">
                    <option value=14 selected>14%</option>
                    <option value=0>0%</option>
                </select> --}}

                <input type="number" name="rate[]" id="rate" onkeyup="findTotalt2Amount()"
                    onmouseover="findTotalt2Amount()">
            </td>
            <td>
                <select name="itemCode[]" id="itemCode" class="form-control form-control-sm" style="width: 150px">
                    <option disabled selected>اختر النشاط</option>
                    @foreach ($codes as $code)
                    <option value="{{ $code->egs }}" style="font-size: 20px">{{ $code->desc_ar }} - {{
                        $code->desc_en }}
                        @endforeach
                </select>
            </td>
            <td>
                <input type="number" width="1px" name="t4rate[]" id="t4rate" onkeyup="findTotalt4Amount()"
                    onmouseover="findTotalt4Amount()">
            </td>
            <td><input type="number" step="any" name="quantity[]" id="quantity"
                    onkeyup="proccess(this.value),findTotalSalesAmount();"
                    onmouseover="proccess(this.value),findTotalSalesAmount();"></td>
            <td><input type=number step="any" name="amountEGP[]" id="amountEGP"
                    onkeyup="operation(this.value),findTotalSalesAmount();;"
                    onmouseover="operation(this.value),findTotalSalesAmount();;"></td>
            <td><input type="number" step="any" name="discountAmount[]" id="discountAmount"
                    onkeyup="discount(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()"
                    onmouseover="discount(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()">
            </td>
            <td><input type="number" step="any" name="itemsDiscount[]" id="itemsDiscount"
                    onkeyup="itemsDiscountValue(this.value),findTotalAmount(),findTotalItemsDiscountAmount()"
                    onmouseover="itemsDiscountValue(this.value),findTotalAmount(),findTotalItemsDiscountAmount()">
            </td>

        </tr>
        <tr>
            <th>قيمة الضريبة (النسبية) </th>
            <th> قيمة ضريبة (المنبع) </th>
            <th>إجمالي المبيعات</th>
            <th>الإجمالى الصافى</th>
            <th colspan="3">الإجمالى</th>
        </tr>
        <tr>
            <td> <input type="number" step="any" name="t2Amount[]" readonly id="t2" onkeyup="findTotalt2Amount()"
                    onmouseover="findTotalt2Amount()">
            </td>
            <td> <input type="number" step="any" name="t4Amount[]" readonly id="t4Amount" onkeyup="findTotalt4Amount()"
                    onmouseover="findTotalt4Amount()">

            </td>
            <td><input type=number step="any" name="salesTotal[]" readonly id="salesTotal"></td>
            <td><input type="number" step="any" readonly name="netTotal[]" id="netTotal"
                    onkeyup="nettotal(this.value),findTotalNetAmount()"
                    onmouseover="nettotal(this.value),findTotalNetAmount()"></td>
            <td colspan="3"><input type="number" step="any" name="totalItemsDiscount[]" readonly id="totalItemsDiscount"
                    onkeyup="findTotalAmount()" onmouseover="findTotalAmount()">
        </tr>

    </table>
    <hr>
</div>
<button type="button" style="width: 400px;margin:auto" class="rounded-sm btn btn-info" id="addNewOne">إضافة
    صنف</button>


<br style="margin-bottom: 50px">
<table border="1" style="margin:auto;margin-top: 20px;width:80%">
    <tr>
        <th style="margin-top: 30px">إجمالى ضريبة المنبع</th>
        <th style="margin-top: 30px">إجمالى الضريبة النسبية</th>
        <th style="margin-top: 30px">إجمالى مبلغ الخصم</th>
        <th style="margin-top: 30px">إجمالى مبلغ المبيعات</th>
        <th style="margin-top: 30px">إجمالى المبلغ الصافى</th>
        <th style="margin-top: 30px">إجمالى خصم الأصناف</th>
    </tr>


    <tr>
        <td><input type="number" step="any" name="totalt4Amount" onmouseover="findTotalt4Amount()"
                onkeyup="findTotalt4Amount()" readonly id="totalt4Amount"></td>
        <td><input type="number" step="any" name="totalt2Amount" onmouseover="findTotalt2Amount()"
                onkeyup="findTotalt2Amount()" readonly id="totalt2Amount"></td>
        <td><input type="number" step="any" name="totalDiscountAmount" onmouseover="findTotalDiscountAmount()"
                onkeyup="findTotalDiscountAmount()" readonly id="totalDiscountAmount"></td>
        <td><input type="number" step="any" name="TotalSalesAmount" onmouseover="findTotalSalesAmount()"
                onkeyup="findTotalSalesAmount()" readonly id="TotalSalesAmount"></td>
        <td><input type="number" step="any" name="TotalNetAmount" onmouseover="findTotalNetAmount()"
                onkeyup="findTotalNetAmount()" readonly id="TotalNetAmount"></td>
        <td><input type="number" step="any" name="totalItemsDiscountAmount" onmouseover="findTotalItemsDiscountAmount()"
                onkeyup="findTotalItemsDiscountAmount()" readonly id="totalItemsDiscountAmount"></td>
    </tr>
    <tr>
        <th>خصم اضافي</th>
        <th colspan="2"> المبلغ الإجمالى قبل الخصم </th>
        <th colspan="3" style="direction: ltr">(المدفوع) المبلغ الإجمالى بعد الخصم </th>
    </tr>

    <tr>
        <td><input type="number" step="any" name="ExtraDiscount" id="ExtraDiscount"
                onkeyup="Extradiscount(this.value),findTotalAmount()"
                onmouseover="Extradiscount(this.value),findTotalAmount()" required></td>
        </td>
        <td colspan="2"><input width="40" type="number" step="any" name="totalAmount" readonly id="totalAmount">
        </td>

        <td colspan="3"><input width="40" style="color: red;font-weight: bold;font-size: 20px" type="number" step="any"
                name="totalAmount2" readonly id="totalAmount2">


        </td>

    </tr>
</table>
</tr>

<div style="text-align: center;margin:50px auto">
    <button type="submit" class="btn btn-success" style="font-size: 30px">إرسال الفاتـــورة</button>
</div>

</form>
</div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        let i = 1
        $("#addNewOne").click(function() {
            i++;
            $('#newOne').append(
                `<div id="row${i}">
                    <button type="button" name="remove" id="${i}"  class="btn btn-danger btn_remove">x</button>
                    <div class="form-group row invoice-note" style="margin-top: 40px;">
                        <label for="invoice-detail-notes" class="text-center col-sm-12 col-form-label col-form-label-sm" style="text-align: center">وصف
                            الفاتورة</label>
                        <div class="col-sm-12" style="margin-bottom:25px">
                            <textarea class="form-control" name="invoiceDescription[]" placeholder="وصف تفصيلى لصرف الفاتورة" style="height: 88px;width: 360px;text-align: center;margin:auto"></textarea>
                        </div>
                    </div>

                    <table style="margin: auto" border="1">
                        <tr>
                            <th>قيمة الضريبة (%) </th>
                            <th>النشاط</th>
                            <th>قيمة ضريبة المنبع %</th>
                            <th>الكمـــية</th>
                            <th>المبلغ بالجنيه المصرى</th>
                            <th>الخصـــم</th>
                            <th>خصــم الأصنــاف</th>


                        </tr>
                        <tr>
                            <td>
                                {{--  <select name="rate[]" id="rate${i}" class="form-control form-control-sm">
                                    <option value=14 selected>14%</option>
                                    <option value=0>0%</option>
                                </select>  --}}
                                <input type="number" name="rate[]" id="rate${i}" onkeyup="findTotalt2Amount()" onmouseover="findTotalt2Amount()">
                            </td>
                            <td>
                                <select name="itemCode[]" id="itemCode" class="form-control form-control-sm" style="width: 150px">
                                    <option disabled selected>اختر النشاط</option>
                                    @foreach ($codes as $code)
                                    <option value="{{ $code->egs }}" style="font-size: 20px">{{ $code->desc_ar }} - {{
                                        $code->desc_en }}
                                        @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" width="1px" name="t4rate[]" id="t4rate${i}">

                            </td>
                            <td><input type="number" step="any" name="quantity[]" id="quantity${i}" onkeyup="proccess${i}(this.value),findTotalSalesAmount()" onmouseover="proccess${i}(this.value),findTotalSalesAmount()"></td>
                            <td><input type=number step="any" name="amountEGP[]" id="amountEGP${i}" onkeyup="operation${i}(this.value),findTotalSalesAmount();" onmouseover="operation${i}(this.value),findTotalSalesAmount();"></td>
                            <td><input type="number" step="any" name="discountAmount[]" id="discountAmount${i}" onkeyup="discount${i}(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()" onmouseover="discount${i}(this.value),findTotalDiscountAmount(),findTotalNetAmount(),findTotalt4Amount(),findTotalt2Amount()"></td>

                            <td><input type="number" step="any" name="itemsDiscount[]" id="itemsDiscount${i}" onkeyup="itemsDiscountValue${i}(this.value),findTotalAmount(),findTotalItemsDiscountAmount()" onmouseover="itemsDiscountValue${i}(this.value),findTotalAmount(),findTotalItemsDiscountAmount()">
                        </tr>
                        <tr>
                            <th>قيمة الضريبة (النسبية) </th>
                            <th> قيمة ضريبة (المنبع) </th>
                            <th>إجمالي المبيعات</th>
                            <th>الإجمالى الصافى</th>
                            <th colspan="3"> الإجمالي</th>
                        </tr>
                        <tr>
                            <td> <input type="number" step="any" name="t2Amount[]" readonly id="t2${i}" {{--
                        onkeyup="t2value(this.value)" onmouseover="t2value(this.value)" --}}>
                            </td>
                            <td> <input type="number" step="any" name="t4Amount[]" readonly id="t4Amount${i}">
                            </td>
                            <td><input type=number step="any" name="salesTotal[]" readonly id="salesTotal${i}"></td>
                            <td><input type="number" step="any" readonly name="netTotal[]" id="netTotal${i}" onkeyup="nettotal${i}(this.value),findTotalNetAmount()" onmouseover="nettotal${i}(this.value),findTotalNetAmount()"></td>
                            <td colspan="3"><input type="number" step="any" name="totalItemsDiscount[]" readonly id="totalItemsDiscount${i}">
                        </tr>
                    </table>
                <hr>
                </div> `


            )


            $('<script> function operation' + i + '(value) {var x, y, z;  var quantity = document.getElementById("quantity' + i + '").value; x = value * quantity; document.getElementById("salesTotal' + i + '").value = x.toFixed(2);};  function proccess' + i + '(value) {var x, y, z;  var amounEGP = document.getElementById("amountEGP' + i + '").value; y = value * amounEGP; document.getElementById("salesTotal' + i + '").value = y.toFixed(2);};function discount' + i + '(value) {var salesTotal, netTotal, z, t2valueEnd, t1Value, rate, t4rate, t4Amount; salesTotal = document.getElementById("salesTotal' + i + '").value; netTotal = salesTotal - value; netTotalEnd = document.getElementById("netTotal' + i + '").value = netTotal.toFixed(2); rate = document.getElementById("rate' + i + '").value; t4rate = document.getElementById("t4rate' + i + '").value;  t2valueEnd = document.getElementById("t2' + i + '").value = ((netTotalEnd * rate) / 100).toFixed(2); t4Amount = document.getElementById("t4Amount' + i + '").value = ((netTotal * t4rate) / 100).toFixed(2);}; function itemsDiscountValue' + i + '(value) {var x, netTotal, t1amount, t2amount, t4Amount;netTotal = document.getElementById("netTotal' + i + '").value;t2amount = document.getElementById("t2' + i + '").value;t4Amount = document.getElementById("t4Amount' + i + '").value;x = parseFloat(netTotal) + parseFloat(t2amount) - parseFloat(t4Amount) - parseFloat(value);document.getElementById("totalItemsDiscount' + i + '").value = x.toFixed(2);};  </' + 'script>').appendTo('#test123');
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

<script id="test123">
    // this is invoice 1

    function operation(value) {
        var x, y, z;

        var quantity = document.getElementById("quantity").value;
        x = value * quantity;
        document.getElementById("salesTotal").value = x;
    };

    function proccess(value) {
        var x, y, z;
        var amounEGP = document.getElementById("amountEGP").value;
        y = value * amounEGP;
        document.getElementById("salesTotal").value = y;
    };

    function discount(value) {
        var salesTotal, netTotal, z, t2valueEnd, t1Value, rate, t4rate, t4Amount;
        salesTotal = document.getElementById("salesTotal").value;
        netTotal = salesTotal - value;

        netTotalEnd = document.getElementById("netTotal").value = netTotal;
        rate = document.getElementById("rate").value;
        t4rate = document.getElementById("t4rate").value;
        t2valueEnd = document.getElementById("t2").value =
            (netTotalEnd * rate) / 100;
        t4Amount = document.getElementById("t4Amount").value =
            (netTotal * t4rate) / 100;
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
        document.getElementById("totalItemsDiscount").value = x.toFixed(2);
    }

    function Extradiscount(value) {
        var totalDiscount, x;
        totalDiscount = document.getElementById("totalAmount").value;
        x = totalDiscount - value;
        document.getElementById("totalAmount2").value = x.toFixed(2);
    }

    function findTotalDiscountAmount() {
        var arr = document.getElementsByName("discountAmount[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("totalDiscountAmount").value = tot;

    }

    function findTotalSalesAmount() {
        var arr = document.getElementsByName("salesTotal[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("TotalSalesAmount").value = tot;

    }

    function findTotalNetAmount() {
        var arr = document.getElementsByName("netTotal[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("TotalNetAmount").value = tot;

    }

    function findTotalt4Amount() {
        var arr = document.getElementsByName("t4Amount[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("totalt4Amount").value = tot;
    }

    function findTotalt2Amount() {
        var arr = document.getElementsByName("t2Amount[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("totalt2Amount").value = tot;
    }
    function findTotalAmount() {
        var arr = document.getElementsByName("totalItemsDiscount[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("totalAmount").value = tot;
    }
    function findTotalItemsDiscountAmount() {
        var arr = document.getElementsByName("itemsDiscount[]");
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value)) {
                tot += parseFloat(arr[i].value);
            }
        }
        document.getElementById("totalItemsDiscountAmount").value = tot;
    }

</script>

