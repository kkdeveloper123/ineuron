@extends('admin.index')
@section('title', 'DevsWeb : Update Email Settings')
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
                                        <h4>Email Configuration</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.emailSettingIndex') }}">Email
                                                Configuration</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a>
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

                                    <div class="card-block">
                                        <form method="post" action="{{ route('admin.emailModify') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Enter name"
                                                        value="{{ old('name', $all_info ? $all_info->name : '') }}">
                                                    @error('name')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="smtp_host">SMTP Host</label>
                                                    <input type="text" name="smtp_host"
                                                        class="form-control @error('smtp_host') is-invalid @enderror"
                                                        placeholder="Enter SMTP Host"
                                                        value="{{ old('smtp_host', $all_info ? $all_info->smtp_host : '') }}">
                                                    @error('smtp_host')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="smtp_port">SMTP Port</label>
                                                    <input type="text" name="smtp_port"
                                                        class="form-control @error('smtp_port') is-invalid @enderror"
                                                        placeholder="Enter SMTP Port"
                                                        value="{{ old('smtp_port', $all_info ? $all_info->smtp_port : '') }}">
                                                    @error('smtp_port')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="smtp_user">SMTP User</label>
                                                    <input type="text" name="smtp_user"
                                                        class="form-control @error('smtp_user') is-invalid @enderror"
                                                        placeholder="Enter SMTP User"
                                                        value="{{ old('smtp_user', $all_info ? $all_info->smtp_user : '') }}">
                                                    @error('smtp_user')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="smtp_pass">SMTP Password</label>
                                                    <input type="text" name="smtp_pass"
                                                        class="form-control @error('smtp_pass') is-invalid @enderror"
                                                        placeholder="Enter SMTP Password"
                                                        value="{{ old('smtp_pass', $all_info ? $all_info->smtp_pass : '') }}">
                                                    @error('smtp_pass')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="smtp_encryption">SMTP Encryption</label>
                                                    <input type="text" name="smtp_encryption"
                                                        class="form-control @error('smtp_encryption') is-invalid @enderror"
                                                        placeholder="Enter SMTP Encryption"
                                                        value="{{ old('smtp_encryption', $all_info ? $all_info->smtp_encryption : '') }}">
                                                    @error('smtp_encryption')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
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
