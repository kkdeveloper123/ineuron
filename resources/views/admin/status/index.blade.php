@if ($toggleStatusFirst == $currentStatus)
<a class="badge {{ currentStatusValue($toggleStatusFirst)['COLOR'] }} text-white cursor-pointer" onclick="confirm_box_status('PENDING','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Category','Categories')"><strong>{{ currentStatusValue($toggleStatusFirst)['KEY'] }}</strong></a>
@else
<a class="badge {{ currentStatusValue($toggleStatusSecond)['COLOR'] }} text-white cursor-pointer" onclick="confirm_box_status('INACTIVE','{{ $single_info->slug }}','{{ route('admin.changeStatus') }}',this,'Category','Categories')"><strong>{{ currentStatusValue($toggleStatusSecond)['KEY'] }}</strong></a>
@endif