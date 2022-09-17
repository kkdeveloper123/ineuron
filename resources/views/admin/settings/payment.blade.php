@extends('admin.index')
@section('title', 'DevsWeb : Add Settings')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Payment Credentials</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                        href="{{ route('admin.settingIndex') }}">Payment Credentials</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Paypal Credentials</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                @php
                                $json_data = json_decode($all_info[0]->api_keys);
                                $json_data1 = json_decode($all_info[1]->api_keys);
                                @endphp

                                <div class="card-block">
                                    <form method="post" action="{{ route('admin.insertPaymentSetting',['paypal']) }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="key">Key</label>
                                                <input type="text" name="paypal_key"
                                                class="form-control @error('paypal_key') is-invalid @enderror"
                                                placeholder="Enter Key" value="{{ old('paypal_key') ?: $json_data->key}}">
                                                @error('paypal_key')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="secret">Secret</label>
                                                <input type="text" name="paypal_secret"
                                                class="form-control @error('paypal_secret') is-invalid @enderror"
                                                placeholder="Enter secret" value="{{ old('paypal_secret') ?: $json_data->secret}}">
                                                @error('paypal_secret')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="mode">Mode</label>
                                                <select class="js-example-placeholder-multiple col-sm-12" name="payment_mode"  value="{{old('payment_mode')}}">
                                                    <option value="">Select Mode</option>
                                                    <option value="1" 
                                                    {{  old('payment_mode' , $all_info ? $all_info[0]->mode : '') == '1' ? 'selected' : ''  }}>Sandbox</option>
                                                    <option value="0" 
                                                    {{old('payment_mode' , $all_info ? $all_info[0]->mode : '') == '0' ? 'selected' : ''  }}>Production</option>
                                                </select>
                                                @error('payment_mode')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                             <div class="form-radio">
                                                <label for="status" class="p-0">Paypal Status</label>
                                                <div class="radio radio-inline">
                                                    <label>
                                                        <input type="radio" name="status"  value="1" checked="checked" {{
                                                            old('status' , $all_info ? $all_info[0]->status : '') == '1' ? 'checked' : ''  }}>
                                                            <i class="helper"></i>ON
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="status"  value="0" 
                                                            {{old('status' , $all_info ? $all_info[0]->status : '') == '0' ? 'checked' : ''  }}>
                                                            <i class="helper"></i>OFF
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('status')
                                            <div class="form-valid-error">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-12 col-xl-12">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Stripe Credentials</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <form method="post"
                                    action="{{ route('admin.insertPaymentSetting',['stripe'])}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="key">Key</label>
                                            <input type="text" name="stripe_key"
                                            class="form-control @error('stripe_key') is-invalid @enderror"
                                            placeholder="Enter Key" value="{{old('stripe_key') ?:  $json_data1->key}}">
                                            @error('stripe_key')
                                            <div class="form-valid-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="secret">Secret</label>
                                            <input type="text" name="stripe_secret"
                                            class="form-control @error('stripe_secret') is-invalid @enderror"
                                            placeholder="Enter secret" value="{{old('stripe_secret') ?: $json_data1->secret}}">
                                            @error('stripe_secret')
                                            <div class="form-valid-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="mode">Mode</label>
                                            <select class="js-example-placeholder-multiple col-sm-12" name="payment_mode" value="{{old('payment_mode')}}">
                                                <option value="">Select Mode</option>
                                                <option value="1" selected>Sandbox</option>
                                                <option value="0">Production</option>
                                            </select>
                                            @error('payment_mode')
                                            <div class="form-valid-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                         <div class="form-radio">
                                            <label for="status" class="p-0">Stripe Status</label>
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="status"  value="1" checked="checked" {{old('status' , $all_info ? $all_info[0]->status : '' ) == '1' ? 'checked' : '' }}">
                                                    <i class="helper"></i>ON
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="status"  value="0" {{old('status' , $all_info ? $all_info[1]->status : '' ) == '0' ? 'checked' : '' }}>
                                                    <i class="helper"></i>OFF
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('status')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12 col-xl-12">
                                        <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- Page body end -->
    </div>
</div>
<!-- Main-body end -->
<div id="styleSelector">

</div>
</div>
</div>
@stop
