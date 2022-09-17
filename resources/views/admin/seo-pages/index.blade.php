@extends('admin.index')
@section('title', 'DevsWeb : SEO')
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
                                        <h4>SEO</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.seoPagesIndex') }}">SEO</a>
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
                                        <h5>SEO</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="sub-title">
                                            <a href="{{ route('admin.addSeoContent') }}" target="_blank"
                                                class="mr-3"><button class="btn btn-grd-primary">Add
                                                    SEO Content</button></a>
                                            <a href="{{ route('admin.seoPages') }}" target="_blank"><button
                                                    class="btn btn-grd-primary">Add SEO Pages</button></a>
                                        </h4>

                                        <div class="card-block">
                                            <div class="table-responsive dt-responsive">
                                                <table id=""
                                                    class="table table-striped table-bordered nowrap project-table">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Meta Title</th>
                                                            <th>Meta Description</th>
                                                            <th>OG Url</th>
                                                            <th>OG Title</th>
                                                            <th>OG Description</th>
                                                            <th>Keywords</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                @foreach ($all_info as $key => $single_info)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $single_info->meta_title }}</td>
                        <td>{{ $single_info->meta_description }}</td>
                        <td>{{ $single_info->og_url }}</td>
                        <td>{{ $single_info->og_title }}</td>
                        <td>{{ $single_info->og_description }}</td>
                        <td>{{ $single_info->keywords }}</td>
                        <td>
                            <a href="{{ route('admin.editSeoContent', [$single_info->id]) }}"
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
                                                            <th>Meta Title</th>
                                                            <th>Meta Description</th>
                                                            <th>OG Url</th>
                                                            <th>OG Title</th>
                                                            <th>OG Description</th>
                                                            <th>Keywords</th>
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
