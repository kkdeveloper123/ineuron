@extends('admin.index')
@section('title', 'DevsWeb : Dashboard')
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
                                        <h4>User Profile</h4>
                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{route('admin.getProfile')}}">User Profile</a>
                                        </li>
                                        <li class="breadcrumb-item"><a>User Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!--profile cover start-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cover-profile">
                                    <div class="profile-bg-img">
                                        <img class="profile-bg-img img-fluid"
                                            src="{{ asset('templates\libraries\assets\images\user-profile\bg-img1.jpg') }}"
                                            alt="bg-img">
                                        <div class="card-block user-info">
                                            <div class="col-md-12">
                                                <div class="media-left">
                                                    <a href="#" class="profile-image">
                                                        <img class="user-img img-radius show-img-icon"
                                                            src="{{ $user_info->avatar }}" alt="user-img">
                                                    </a>
                                                </div>
                                                <div class="media-body row">
                                                    <div class="col-lg-12">
                                                        <div class="user-title">
                                                            <h2>{{ $user_info->fullname }}</h2>
                                                            <span class="text-white">{{ $user_info->email }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--profile cover end-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- tab header start -->
                                <div class="tab-header card">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#personal"
                                                role="tab">Personal Info</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- tab header end -->
                                <!-- tab content start -->
                                <div class="tab-content">
                                    <!-- tab panel personal start -->
                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                        <!-- personal card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">About Me</h5>
                                                <button id="edit-btn" type="button"
                                                    class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                    <i class="icofont icofont-edit"></i>
                                                </button>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table m-0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Full Name</th>
                                                                                        <td>{{ $user_info->fullname }}</td>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Birth Date</th>
                                                                                        <td>{{ date('d M, Y', strtotime($user_info->dob)) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                    <div class="col-lg-12 col-xl-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">Email</th>
                                                                                        <td>{{ $user_info->email }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">Mobile Number</th>
                                                                                        <td>{{ $user_info->mobile }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end of table col-lg-6 -->
                                                                </div>
                                                                <!-- end of row -->
                                                            </div>
                                                            <!-- end of general info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of view-info -->
                                                <div class="edit-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <form method="post"
                                                                    action="{{ route('admin.setProfile') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-addon"><i
                                                                                                        class="icofont icofont-user"></i></span>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder="Full Name"
                                                                                                    name="fullname"
                                                                                                    value="{{ $user_info->fullname }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-addon"><i
                                                                                                        class="icofont icofont-mobile-phone"></i></span>
                                                                                                <input type="date"
                                                                                                    class="form-control"
                                                                                                    name="dob"
                                                                                                    placeholder="Date of Birth"
                                                                                                    value="{{ $user_info->dob }}">
                                                                                            </div>
                                                                                            @error('dob')
                                                                                                <div class="form-valid-error">
                                                                                                    {{ $message }}</div>
                                                                                            @enderror
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-addon"><i
                                                                                                        class="icofont icofont-user"></i></span>
                                                                                                <input type="file"
                                                                                                    class="form-control"
                                                                                                    name="image" value="">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- end of table col-lg-6 -->
                                                                        <div class="col-lg-6">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-addon"><i
                                                                                                        class="icofont icofont-mobile-phone"></i></span>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder="Email"
                                                                                                    name="email"
                                                                                                    value="{{ $user_info->email }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-addon"><i
                                                                                                        class="icofont icofont-mobile-phone"></i></span>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder="Mobile Number"
                                                                                                    name="mobile"
                                                                                                    value="{{ $user_info->mobile }}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- end of table col-lg-6 -->
                                                                    </div>

                                                                    <!-- end of row -->
                                                                    <div class="text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-primary m-b-0">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- end of edit info -->
                                                        </div>
                                                        <!-- end of col-lg-12 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of edit-info -->
                                            </div>
                                            <!-- end of card-block -->
                                        </div>
                                        <!-- personal card end-->
                                    </div>
                                    <!-- tab pane personal end -->



                                </div>
                                <!-- tab content end -->
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
            <!-- Main body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
    </div>

@endsection
