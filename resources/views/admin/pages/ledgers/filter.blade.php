@extends('admin.master')
@section('title')
    Filter Ladgers
@endsection
@section('maincontent')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-8">
                <h1 class="page-heading">
                    Filter Ledger
                </h1>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{route('ledger.index')}}">Ledgers</a></li>
                    <li class="link-effect">Filter Ledger</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <div class="row">
            <div class="col-md-12">
                <!-- Static Labels -->
                <div class="block">
                    <div class="block-content block-content-narrow">
                        <form class="form-horizontal push-10-t ledger-filter" action="{{route('ledger.index')}}"
                              method="get">
                            {{--@csrf--}}
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control" id="supplier_id" name="supplier_id"
                                                data-placeholder="Please Select a Supplier (Optional)">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="supplier_id">Select Supplier</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control" id="ledger_id" name="ledger_id"
                                                data-placeholder="Please Select a Memo (Optional)">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        </select>

                                        <label for="ledger_id">Select Memo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <div class="input-daterange input-group" data-date-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" id="from-daterange"
                                                   name="from_daterange" placeholder="From">
                                            <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                            <input class="form-control" type="text" id="to-daterange"
                                                   name="to_daterange" placeholder="To">
                                        </div>
                                        <label for="from-daterange">Date Range</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Static Labels -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('custom-js')
    <script src="{{asset('public/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('public/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('.js-select2').select2();

            jQuery('#supplier_id').on('change', function () {
                var base_url = '{{url('/')}}';
                var supplier_id = this.value;
                var url = base_url + '/all-ledgers-by-id/' + supplier_id;

                if (supplier_id) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            $('select[name="ledger_id"]').empty();
                            $('select[name="ledger_id"]').append('<option></option>');
                            $.each(data, function (key, value) {
                                // console.log(value);
                                $('select[name="ledger_id"]').append('<option value="' + value.id + '">' + value.memo
                                    + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="ledger_id"]').empty();
                }
            });
            jQuery('.input-daterange').datepicker({
                weekStart: 1,
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
@section('custom-styles')
    <link rel="stylesheet"
          href="{{asset('public/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/select2/select2-bootstrap.min.css')}}">
@endsection