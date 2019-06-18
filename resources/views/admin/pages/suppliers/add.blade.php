@extends('admin.master')

@section('title')
    Create Supplier
@endsection
@section('maincontent')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-8">
                <h1 class="page-heading">
                    Create Supplier
                </h1>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{route('suppliers.index')}}">Suppliers</a></li>
                    <li class="link-effect">Create Supplier</li>
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
                        <form class="form-horizontal push-10-t add-supplier-form" action="{{route('suppliers.store')}}"
                              method="post">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="text" id="supplier-name"
                                               name="name" placeholder="Supplier Name" value="{{old('name')}}" required>
                                        <label for="supplier-name">Supplier Name</label>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div id="supplier-name-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('name') }}</div>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{$errors->has('location')?' has-error':''}}">
                                <div class="col-sm-12">
                                    <div class="form-material form-material-primary">
                                        <input class="form-control" type="text" id="supplier-location"
                                               name="location" placeholder="Supplier Location"
                                               value="{{old('location')}}" required>
                                        <label for="supplier-location">Supplier Location</label>
                                    </div>
                                    @if ($errors->has('location'))
                                        <div id="supplier-location-error"
                                             class="help-block animated fadeInDown">{{ $errors->first('location') }}</div>
                                    @endif
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
    <script>
        jQuery(document).ready(function () {
            CustomScript.formValidation('.add-supplier-form');
        });
    </script>
@endsection
@section('custom-styles')
@endsection