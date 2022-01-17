@extends('layouts.main')

@section('content')


    <div class="page-content">


        @if (session()->has('success'))
            <div class="alert alert-success" style="margin: auto;text-align:center">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" style="margin: auto;text-align:center">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">@lang("site.dashboard")</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('site.Active Products')</li>
                    </ol>
                </nav>
            </div>

        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                        @csrf
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>رقم الإشعار</th>
                                    <th>الإسم</th>
                                    <th>تاريخ الإشعار</th>
                                    <th>حالة الإشعار</th>
                                    <th>نوع الإشعار</th>
                                    <th>قناة الإشعار</th>
                                    <th>عنوان الإشعار</th>

                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification['notificationId'] }}</td>
                                        <td>{{ $notification['receiverName'] }}</td>
                                        <td>{{ Carbon\Carbon::parse($notification['creationDateTime'])->format('d-m-Y') }}</td>
                                        <td>{{ $notification['status'] }}</td>
                                        <td>{{ $notification['typeName'] }}</td>
                                        <td>{{ $notification['channel'] }}</td>
                                        <td>{{ $notification['address'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('js')
    <script>
        $("#product-submit").on('click', function() {

            $("#product-form").submit();

        });
    </script>
    <script src="{{ asset('main/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('main/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>



@endpush
