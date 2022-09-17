@extends('admin.index')
@section('title', 'DevsWeb : Add Exam Events')
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
                                    <h4>Exam Events</h4>
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.subcategoryIndex') }}">Exam Events</a>
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
                                    <h5>Add Exam Events</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form method="post" action="{{ route('admin.insertExamEvents') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                                                @error('name')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="cat_id">Sub categories</label>
                                                <select class="js-example-placeholder-multiple col-sm-12" name="subcategories[]" value="{{old('subcate_id')}}" multiple>
                                                    @foreach ($subcats as $key => $sub_info)
                                                    <option value="">Select Subcategory</option>
                                                    <option value="{{ $sub_info->id }}">
                                                        {{ $sub_info->subcate_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('event_ids')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <div class="form-radio">
                                                    <label for="status" class="p-0">Status</label>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="status" checked="checked" {{old('status') == 1 ? 'checked' : '' }} value="1">
                                                            <i class="helper"></i>Active
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="status" {{old('status') == 0 ? 'checked' : '' }} value="0">
                                                            <i class="helper"></i>Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('status')
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

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="" class="table table-striped table-bordered nowrap project-table">
                                                <thead>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Exam Event Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_info as $key => $single_info)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $single_info->event_name }}</td>

                                                        <td>
                                                            @if ($single_info->status == 1)
                                                            <a class="badge badge-success text-white cursor-pointer" onclick="confirm_box_status('INACTIVE','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Exam Events','ExamEvents')"><strong>Active</strong></a>
                                                            @else
                                                            <a class="badge badge-danger text-white cursor-pointer" onclick="confirm_box_status('ACTIVE','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Exam Events','ExamEvents')"><strong>Inactive</strong></a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- <a href={{ route('admin.deleteData', ['Categories', $single_info->slug]) }}
                                                            class="delete-data"><button class="btn btn-danger btn-osutline-danger"><i class="icofont icofont-trash"></i></button></a> --}}
                                                            <a href="{{ route('admin.editExamEvents', [$single_info->slug]) }}" target="_blank"><button class="btn btn-info btn-outlsine-info"><i class="icofont icofont-pencil"></i></button></a>
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Exam Events</th>
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