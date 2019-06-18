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
                        <div class="block-options">
                            <span>Total Credit : <strong>{{$totalCredit}} Taka</strong></span>
                        </div>
                        <h3 class="block-title">Ladger History</h3>
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
                                <th>Credit</th>
                                <th>Cash/Cheque</th>
                                <th>Balance</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ladgerHistory as $ladger)
                                <tr class="{{$ladger->status==0?'text-danger':($ladger->status==2?'text-success':'')}}">
                                    <td>{{$ladger->date}}</td>
                                    <td>{{$ladger->ledger->supplier->name}}</td>
                                    <td>{{$ladger->ledger->memo}}</td>
                                    <td>{{$ladger->ledger->particulars}}</td>
                                    <td>{{$ladger->ledger->debit}}</td>
                                    <td>{{$ladger->credit}}</td>
                                    <td>{{$ladger->payment_method==0?'Cash':'Cheque='.$ladger->check_no}}</td>
                                    <td>{{$ladger->balance_due}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            {{--<a href="{{route('ledger.edit',$ladger->id)}}" class="btn btn-xs btn-default" data-toggle="tooltip"
                                                    title="Edit Transection"><i class="fa fa-pencil"></i></a>--}}
                                            @if($ladger->status==1)
                                                <form class="transection-remove"
                                                      action="{{route('ledger.destroy',$ladger->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-xs btn-default" type="submit"
                                                            data-toggle="tooltip"
                                                            title="Remove Transection"><i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            @elseif($ladger->status==0)
                                                <span class="label label-danger">Removed</span>
                                            @elseif($ladger->status==2)
                                                <span class="label label-success">Addjusted</span>
                                            @endif
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

            CustomScript.onSubmitSweetAlert(data,'.transection-remove');
        });
    </script>
@endsection

@section('custom-styles')
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/sweetalert/sweetalert.min.css')}}">
@endsection