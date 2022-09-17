@extends('admin.index')
@section('title', 'DevsWeb : Add Subadmin Access')
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
                                        <h4>SUBADMIN ACCESS</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.categoryIndex') }}">Subadmin
                                                Access</a>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Subadmin Access</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php
                                        $access_array = json_decode($access_data->access, true);
                                    @endphp

                                    <div class="card-block">
                                        <form method="post"
                                            action="{{ route('admin.subadminInsertAccess', [$subadmin_data->username]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">

                                                <div class="col-sm-12 col-xl-6 m-b-30">
                                                    <div class="checkbox-fade fade-in-primary">
                                                        <label>
                                                            <input type="checkbox" value="category_section" name="fields[]"
                                                                @if (isset($access_array) && in_array('category_section', $access_array)) checked @endif>
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Category</span>
                                                        </label>
                                                    </div>

                                                    <div class="checkbox-fade fade-in-primary">
                                                        <label>
                                                            <input type="checkbox" value="subcategory_section"
                                                                name="fields[]"
                                                                @if (isset($access_array) && in_array('subcategory_section', $access_array)) checked @endif>
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>Sub Category</span>
                                                        </label>
                                                    </div>
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
