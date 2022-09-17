@extends('admin.index')
@section('title', 'DevsWeb : Faqs')
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
                                        <h4>FAQS</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.faqIndex') }}">Faqs</a>
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
                                        <h5>Faqs</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="sub-title">
                                            <a href="{{ route('admin.addFaqsPage') }}" target="_blank"
                                                class="mr-3"><button class="btn btn-grd-primary">Add
                                                    Faqs</button></a>
                                            <a href="{{ route('admin.faqCategory') }}" target="_blank"><button
                                                    class="btn btn-grd-primary">Add Category</button></a>
                                        </h4>

                                        <div class="card-block">
                                            <div class="table-responsive dt-responsive">
                                                <table id=""
                                                    class="table table-striped table-bordered nowrap project-table">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Heading</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($all_info as $key => $single_info)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $single_info->heading }}</td>
                                                                <td>{{ $single_info->heading }}</td>
                                                                <td>
                                                                    @if ($single_info->status == 1)
                                                                        <a class="badge badge-success text-white cursor-pointer"
                                                                            onclick="confirm_box_status('inactive','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Faqs','Faqs')"><strong>Active</strong></a>
                                                                    @else
                                                                        <a class="badge badge-danger text-white cursor-pointer"
                                                                            onclick="confirm_box_status('active','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Faqs','Faqs')"><strong>Inactive</strong></a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href={{ route('admin.deleteData', ['Faqs', $single_info->slug]) }}
                                                                        class="delete-data"><button
                                                                            class="btn btn-danger btn-osutline-danger"><i
                                                                                class="icofont icofont-trash"></i></button></a>
                                                                    <a href="{{ route('admin.editFaqs', [$single_info->slug]) }}"
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
                                                            <th>Heading</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
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
