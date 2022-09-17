@extends('admin.index')
@section('title', 'DevsWeb : Users')
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
                                        <h4>USERS</h4>
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
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Show</a>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Users</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="" class="table table-striped table-bordered nowrap project-table">
                                                <thead>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Full Name</th>
                                                        <th>Avatar</th>
                                                        <th>Login Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_info as $key => $single_info)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $single_info->username }}</td>
                                                            <td>{{ $single_info->email }}</td>
                                                            <td>{{ $single_info->fullname }}</td>
                                                            <td><img src="{{ $single_info->avatar }}" class="show-img-icon mt-2"></td>
                                                            <td>{{ $single_info->login_type }}</td>
                                                            <td>
                        <a
                            href={{ route('admin.deleteBlogs', [$single_info->id]) }}><button
                                class="btn btn-danger btn-osutline-danger"><i
                                    class="icofont icofont-trash"></i></button></a>
                        <a href="{{ route('admin.editUsers', [$single_info->id]) }}"
                            target="_blank"><button
                                class="btn btn-info btn-outlsine-info"><i
                                    class="icofont icofont-pencil"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Full Name</th>
                                                        <th>Avatar</th>
                                                        <th>Login Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
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
