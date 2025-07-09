@extends('layouts.master')

@section('content')

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Department</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Department</div>
                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <a href="{{ route('dept.create') }}" class="btn btn-primary">Add New Department</a>
                @endif
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($dept as $item )


                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->name }}</td>

                            <td>
                                <a class="badge badge-warning" href="{{ route('dept.edit',$item->id) }}"><i class="fa fa-pencil p-1" style="color:#fff" aria-hidden="true"></i></a>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="javascript:void(0);" class="text-muted font-16 badge badge-danger"
                                        onclick="fn_dept_delete({{ $item->id }})">
                                        <i class="fa fa-trash-o p-1" style="color: #fff" aria-hidden="true"></i></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('dept.delete')
        </div>

    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('js')
<script type="text/javascript">
function fn_dept_delete(dept_id) {

$('#dept-id').val(dept_id);
$('#delete_data_modal').modal('show');
}
</script>
@endsection
