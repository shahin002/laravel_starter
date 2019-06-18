@extends('admin.master')
@section('title')
    Ledgers
@endsection

@section('maincontent')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <a href="{{route('ledger.excel',request()->all())}}" class="btn btn-info btn-rounded">Download Excel</a>
        <a href="{{route('ledger.create')}}" class="btn btn-primary btn-rounded">Add
            Ladger</a>
        <a href="{{route('ledger.existing.trans')}}" class="btn btn-default btn-rounded">Add
            Transection</a>
        <a href="{{route('ledger.filter')}}" class="btn btn-warning btn-rounded">Filter
            Transection</a>
    </div>
    <!-- END Page Header -->


    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <!-- Striped Table -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Ladger List</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Supplier Name</th>
                                <th>Memo No</th>
                                <th>Particulars</th>
                                <th>Debit</th>
                                <th>Balance Due</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ladgers as $ladger)
                                <tr>
                                    <td>{{$ladger->date}}</td>
                                    <td>{{$ladger->supplier->name}}</td>
                                    <td>{{$ladger->memo}}</td>
                                    <td>{{$ladger->particulars}}</td>
                                    <td>{{$ladger->debit}}</td>
                                    <td>{{$ladger->balance_due}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">

                                            <a class="btn btn-xs btn-default"
                                               href="{{route('ledger.index',['ledger_id'=>$ladger->id])}}"
                                               data-toggle="tooltip"
                                               title="View Transections"><i class="fa fa-eye"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Striped Table -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection


@section('custom-js')
    <script src="{{asset('public/assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Page JS Code -->
    {{--<script src="assets/js/pages/base_ui_activity.js"></script>--}}
    <script>
        jQuery(function () {
            let data = {
                title: 'Are you sure?',
                text: 'To Remove This Transection',
                confirmButtonText: 'Yes, Remove!',
            };

            CustomScript.onSubmitSweetAlert(data, '.transection-remove');
        });
    </script>
@endsection

@section('custom-styles')
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/sweetalert/sweetalert.min.css')}}">
@endsection