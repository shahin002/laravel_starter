@extends('admin.master')

@section('title')
    Inactive Supplier
@endsection
@section('maincontent')
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-content">
                <div class="block-header">
                    <h3 class="block-title col-md-6">Inactive Supplier List</h3>
                    <a href="{{route('suppliers.create')}}" class="pull-right btn btn-primary btn-rounded">Add
                        Supplier</a>
                </div>
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                <table class="table table-bordered table-striped js-dataTable-full">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="hidden-xs">Location</th>
                        <th class="hidden-xs">Date</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td class="font-w600">{{$supplier->name}}</td>
                            <td class="hidden-xs">{{$supplier->location}}</td>
                            <td class="hidden-xs">{{$supplier->created_at->format('d,M-Y')}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    {{--<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                            title="Edit Client"><i class="fa fa-pencil"></i></button>--}}
                                    <form class="supplier-activate" action="{{route('suppliers.destroy',$supplier->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-xs btn-default" type="submit" data-toggle="tooltip"
                                           title="Activate Supplier"><i class="fa fa-check"></i></button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
@section('custom-js')
    <script src="{{asset('public/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
{{--    <script src="{{asset('public/assets/js/pages/base_tables_datatables.js')}}"></script>--}}
    <script src="{{asset('public/assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Page JS Code -->
    {{--<script src="assets/js/pages/base_ui_activity.js"></script>--}}
    <script>
        jQuery(function () {
            let data = {
                title: 'Are you sure?',
                text: 'To Activate This Supplier!!',
                confirmButtonText: 'Yes, Activate!',
            };

            CustomScript.onSubmitSweetAlert(data,'.supplier-activate');
            CustomScript.dataTableWithPrint('.js-dataTable-full');
        });
    </script>
@endsection
@section('custom-styles')
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/sweetalert/sweetalert.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@endsection