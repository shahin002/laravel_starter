@extends('admin.master')

@section('title')
    Add Transection
@endsection
@section('maincontent')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-8">
                <h1 class="page-heading">
                    Existing Ledger Add Transection
                </h1>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{route('ledger.index')}}">Ledgers</a></li>
                    <li class="link-effect">Existing Ledger Add Transection</li>
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
                        <form class="form-horizontal push-10-t existing-ledger-form"
                              action="{{route('exesting-ledger-add-transection')}}"
                              method="post">
                            @csrf
                            <div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control" id="supplier_id" name="supplier_id"
                                                data-placeholder="Please Select a Supplier" required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="supplier_id">Select Supplier</label>
                                    </div>
                                    @if ($errors->has('supplier_id'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('supplier_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ledger_id') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control" id="ledger_id" name="ledger_id"
                                                data-placeholder="Please Select a Memo" required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        </select>

                                        <label for="ledger_id">Select Memo</label>
                                    </div>
                                    @if ($errors->has('ledger_id'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('ledger_id') }}</div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="js-datepicker form-control" type="text" id="date"
                                               name="date" placeholder="Select Date" value="{{old('date')}}" required
                                               readonly>
                                        <label for="date">Date</label>
                                    </div>
                                    @if ($errors->has('date'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('date') }}</div>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{$errors->has('credit')?' has-error':''}}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" id="credit"
                                               name="credit" placeholder="Enter Credit"
                                               value="{{old('credit')}}" required>
                                        <label for="credit">Credit</label>
                                    </div>
                                    @if ($errors->has('credit'))
                                        <div id="supplier-location-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('credit') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="payment-method form-control js-select2" id="payment_method"
                                                name="payment_method" data-placeholder="Please Select Payment Type"
                                                required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="0">Cash</option>
                                            <option value="1">Cheque</option>
                                        </select>

                                        <label for="payment_method">Select Payment Type</label>
                                    </div>
                                    @if ($errors->has('payment_method'))
                                        <div id="payment_method-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('payment_method') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="checkno-show-hide"></div>
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
            CustomScript.formValidation('.existing-ledger-form');
            CustomScript.select2Validate('.js-select2');
            jQuery('#supplier_id').on('change', function () {
                var base_url = '{{url('/')}}';
                var supplier_id = this.value;
                var url = base_url + '/ledgers-by-id/' + supplier_id;

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
            CustomScript.onChangeAddField('.payment-method');
            CustomScript.jsDatePicker('.js-datepicker');
        });
    </script>
@endsection
@section('custom-styles')
    <link rel="stylesheet"
          href="{{asset('public/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/js/plugins/select2/select2-bootstrap.min.css')}}">
@endsection