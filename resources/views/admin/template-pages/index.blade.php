@extends('admin.index')
@section('title', 'DevsWeb : Template Page')
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
                                        <h4>Template Page</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.templatePages') }}">Template
                                                Page</a>
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
                                        <h5>Template Page</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="sub-title">
                                            <a href="{{ route('admin.addTemplate') }}" target="_blank"
                                                class="mr-3"><button class="btn btn-grd-primary">Add
                                                    Template</button></a>
                                        </h4>

                                        <div class="card-block">

                                            <div class="row">
                                                @php
                                                    $color = ['bg-c-blue', 'bg-c-pink', 'bg-c-green', 'bg-c-yellow'];
                                                    
                                                @endphp
                                                @foreach ($all_info as $key => $single_info)

                                                    <div class="col-md-6 col-xl-3">
                                                        <div class="card user-widget-card {{ $color[array_rand($color)] }}">
                                                            <div class="card-block">
                                                                <i
                                                                    class="feather icon-user bg-simple-c-blue card1-icon"></i>
                                                                <h4>652</h4>
                                                                <p>{{ $single_info->temp_name }}</p>
                                                                <a href="{{ route('admin.editTemplate', [$single_info->temp_slug]) }}"
                                                                    class="more-info" target="_blank">More Info</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                {{-- <div class="col-md-6 col-xl-3">
                                                    <div class="card user-widget-card bg-c-pink">
                                                        <div class="card-block">
                                                            <i class="feather icon-home bg-simple-c-pink card1-icon"></i>
                                                            <h4>652</h4>
                                                            <p>Latest User</p>
                                                            <a href="#!" class="more-info">More Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card user-widget-card bg-c-green">
                                                        <div class="card-block">
                                                            <i
                                                                class="feather icon-alert-triangle bg-simple-c-green card1-icon"></i>
                                                            <h4>652</h4>
                                                            <p>Latest User</p>
                                                            <a href="#!" class="more-info">More Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card user-widget-card bg-c-yellow">
                                                        <div class="card-block">
                                                            <i
                                                                class="feather icon-twitter bg-simple-c-yellow card1-icon"></i>
                                                            <h4>652</h4>
                                                            <p>Latest User</p>
                                                            <a href="#!" class="more-info">More Info</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>


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
