@extends('admin.master')

@section('title')
    Edit Transection
@endsection
@section('maincontent')
    {{--{{dd($ladger)}}--}}
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-8">
                <h1 class="page-heading">
                    Create Ledger
                </h1>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{route('ledger.index')}}">Ledgers</a></li>
                    <li class="link-effect">Edit Transection</li>
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
                        <form class="form-horizontal push-10-t add-ledger-form" action="{{route('ledger.store')}}"
                              method="post">
                            @csrf
                            <div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="js-datepicker form-control" type="text" id="date"
                                               name="date" placeholder="Select Date" value="{{old('date')}}" required
                                               readonly>
                                        <label for="supplier_id">Select Supplier</label>
                                    </div>
                                    @if ($errors->has('supplier_id'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('supplier_id') }}</div>
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
                            <div class="form-group{{$errors->has('memo')?' has-error':''}}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="text" id="memo"
                                               name="memo" placeholder="Cash Memo No"
                                               value="{{old('memo')}}" required>
                                        <label for="memo">Cash Memo No</label>
                                    </div>
                                    @if ($errors->has('memo'))
                                        <div id="supplier-location-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('memo') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('particulars')?' has-error':''}}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="text" id="particulars"
                                               name="particulars" placeholder="Supplier Particulars"
                                               value="{{old('particulars')}}" required>
                                        <label for="particulars">Particulars</label>
                                    </div>
                                    @if ($errors->has('particulars'))
                                        <div id="supplier-location-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('particulars') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('debit')?' has-error':''}}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="number" id="debit"
                                               name="debit" placeholder="Enter Debit"
                                               value="{{old('debit')}}" required>
                                        <label for="particulars">Debit</label>
                                    </div>
                                    @if ($errors->has('debit'))
                                        <div id="supplier-location-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('debit') }}</div>
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
                                        <select class="payment-method form-control" id="payment_method"
                                                name="payment_method" data-placeholder="Please Select Payment Type"
                                                required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="0">Cash</option>
                                            <option value="1">Cheque</option>
                                        </select>

                                        <label for="payment_method">Select Payment Type</label>
                                    </div>
                                    @if ($errors->has('supplier_id'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('supplier_id') }}</div>
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
        $(document).ready(function () {
            jQuery.validator.addMethod('lessThanOrEqual', function (value, element, param) {
                return (parseFloat(value) <= parseFloat(jQuery(param).val()));
            }, 'Can not greater than Debit');
            $('.add-ledger-form').validate({
                rules: {
                    credit: {lessThanOrEqual: "#debit"}
                },
                ignore: [],
                errorClass: 'help-block animated fadeInDown',
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    jQuery(e).parents('.form-group > div').append(error);
                },
                highlight: function (e) {
                    var elem = jQuery(e);

                    elem.closest('.form-group').removeClass('has-error').addClass('has-error');
                    elem.closest('.help-block').remove();
                },
                success: function (e) {
                    var elem = jQuery(e);

                    elem.closest('.form-group').removeClass('has-error');
                    elem.closest('.help-block').remove();
                }
            });
            jQuery('.js-select2').select2();
            jQuery('.js-select2').on('change', function () {
                jQuery(this).valid();
            });
            jQuery('.payment-method').select2();
            jQuery('.payment-method').on('change', function () {
                jQuery(this).valid();
                var value = $('.payment-method').val();
                if (value == 1) {
                    jQuery('.checkno-show-hide').html(`<div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="text" id="check_no"
                                               name="check_no" placeholder="Enter check no" required>
                                        <label for="check_no">Check No</label>
                                    </div>
                                </div>
                            </div>`);
                } else {
                    jQuery('.checkno-show-hide').empty();
                }

            });
            jQuery('.js-datepicker').add('.input-daterange').datepicker({
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