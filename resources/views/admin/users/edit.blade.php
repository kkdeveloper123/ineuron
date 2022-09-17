@extends('admin.index')
@section('title', 'DevsWeb : Edit Users')
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
                                        <h4>Users</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.usersIndex') }}">Users</a>
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
                                        <h5>Edit Users</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form method="post"
                                            action="{{ route('admin.updateUsers', [$single_data->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Name</label>
                                                    <input type="text" name="fullname" class="form-control"
                                                        placeholder="Full Name" value="{{ $single_data->fullname }}">
                                                    @error('fullname')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">UserName</label>
                                                    <input type="text" name="username" class="form-control"
                                                        placeholder="UserName" value="{{ $single_data->username }}">
                                                    @error('username')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email" value="{{ $single_data->email }}">
                                                    @error('email')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Password">
                                                    @error('password')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Mobile</label>
                                                    <input type="number" name="mobile" class="form-control"
                                                        placeholder="Mobile" value="{{ $single_data->mobile }}">
                                                    @error('mobile')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Date of Birth</label>
                                                    <input type="date" name="dob" class="form-control disableFuturedate"
                                                        placeholder="Date of Birth" value="{{ $single_data->dob }}">
                                                    @error('dob')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="country">Country</label>
                                                    <select class="js-example-placeholder-multiple col-sm-12" name="country">
                                                        @foreach ($all_country as $key => $single_info)
                                                            <option value="">Select Country</option>
                                                            <option value="{{ $single_info->id }}" @if ($single_data->country == $single_info->id) selected @endif>
                                                                {{ $single_info->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Address</label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="Address" value="{{ $single_data->address }}">
                                                    @error('address')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Website</label>
                                                    <input type="text" name="website" class="form-control"
                                                        placeholder="Website" value="{{ $single_data->website }}">
                                                    @error('website')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Product Services</label>
                                                    <input type="text" name="product_services" class="form-control"
                                                        placeholder="Product Services" value="{{ $single_data->product_services }}">
                                                    @error('product_services')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                    
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="image" class="p-0">Avatar</label>
                                                    <input type="file" class="form-control" name="avatar">
                                                    @error('image')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                    <div class="col-sm-2 col-xl-2 text-center">
                                                        
                                                        <img src="{{ $single_data->avatar }}" class="show-img-icon mt-2">
                                                    </div>

                                                </div>

                                           
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                        <label for="status" class="p-0">Status</label>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="user_status" @if ($single_data->user_status == 1) checked @endif
                                                                    value="1">
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="user_status" @if ($single_data->user_status == 0) checked @endif
                                                                    value="0">
                                                                <i class="helper"></i>Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('user_status')
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
