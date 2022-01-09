@extends('layouts.main')

@section('content')


<div class="page-content">

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@lang("site.dashboard")</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang("site.products")</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('products.create') }}" class="btn btn-outline-success px-5 radius-30">
                    <i class="bx bx-message-square-edit mr-1"></i>@lang('site.create_product') </a>

            </div>
        </div>
    </div>

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>@lang('site.egs-code') </th>
                            <th>@lang('site.gpc_code') </th>
                            <th>@lang('site.name_ar') </th>
                            <th>@lang('site.desc_ar') </th>
                            <th>@lang('site.name_en') </th>
                            <th>@lang('site.desc_en') </th>
                            <th>@lang('site.active_from') </th>
                            <th>@lang('site.active_to') </th>
                            <th>@lang('site.status') </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $index => $product)

                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $product['itemCode']}}</td>
                            <td>{{ $product['parentItemCode']}}</td>
                            <td>{{ $product['codeNameSecondaryLang']}}</td>
                            <td>{{ $product['descriptionSecondaryLang']}}</td>
                            <td>{{ $product['codeNamePrimaryLang']}}</td>
                            <td>{{ $product['descriptionPrimaryLang']}}</td>
                            <td>{{ $product['activeFrom']}}</td>
                            <td>{{ $product['activeTo']}}</td>
                            <td>{{ $product['status']}}</td>




                            {{-- <td>
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <form style="display: contents;" method="post"
                                        action="{{ route('products.destroy', $product->id ) }}">

                                        @method('DELETE')
                                        @csrf
                                        <button type="sumbit" class="btn btn-outline-danger"><i
                                                class="bx bxs-trash me-0"></i></button>
                                    </form>

                                    <a href="{{ route('products.edit', $product->id ) }}"
                                        class="btn btn-outline-primary"><i class="bx bxs-edit me-0"></i></a>

                                    <a href="{{ route('products.show', $product->id ) }}"
                                        class="btn btn-outline-info"><i class="bx bx-show-alt me-0"></i></a>
                                </div>
                            </td> --}}
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

<script src="{{ asset('main/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('main/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
			$('#example').DataTable();
		  } );
</script>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>

@endpush
