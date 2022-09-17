@extends('admin.index')
@section('title', 'DevsWeb : Brand')
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
                                        <h4>Brand Page</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.brandIndex') }}">Brand Page</a>
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
                                        <h5>Add Brand</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                 
                                    <div class="card-block">
                                        <form method="post"
                                        action=" @if ($single_info) {{ route('admin.updateBrand', [$single_info->slug]) }} @else {{ route('admin.insertBrand') }} @endif"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="brand_name">Brand Name</label>
                                                    <input type="text" name="brand_name"
                                                        class="form-control @error('brand_name') is-invalid @enderror"
                                                        placeholder="Brand Name"
                                                        value="{{ old('brand_name', $single_info ? $single_info->brand_name : '') }}">
                                                    @error('brand_name')
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

                            @if (!$single_info)
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id=""
                                                        class="table table-striped table-bordered nowrap project-table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Brand</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($all_info as $single_info)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $single_info['brand_name'] }}</td>
                                                                    <td>
                                                                        <a href="{{ route('admin.editBrand', [$single_info->slug]) }}"
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
                                                                <th>Categories</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
