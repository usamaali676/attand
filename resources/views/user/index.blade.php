@extends('layouts.master')
@section('content')

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Users</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Users</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Users</div>
                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add New User</a>
                @endif
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Dept</th>
                            <th>Designation</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Dept</th>
                            <th>Designation</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                @foreach ($user as $item )
                    @if ($item->role_id != 1)
                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->department->name }}</td>
                            <td>{{ $item->designation->name}}</td>
                            <td>{{ $item->roles->name }}</td>
                            <td>

                                <a class="badge badge-warning" href="{{ route('user.edit',$item->id) }}"><i class="fa fa-pencil p-1" style="color:#fff" aria-hidden="true"></i></a>
                                <a class="badge badge-success" href="{{ route('user.show',$item->id) }}"><i class="fa fa-eye p-1" style="color:#fff" aria-hidden="true"></i></a>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="javascript:void(0);" class="text-muted font-16 button badge badge-danger"
                                    onclick="fn_user_delete({{ $item->id }})">
                                    <i class="fa fa-trash-o p-1" style="color: #fff" aria-hidden="true"></i></a>
                                 @endif

                            </td>

                        </tr>
                    @endif
                    @if (Auth::user()->role_id == 1)
                    @if ($item->role_id == 1)
                    <tr>
                        <td>{{ $srno++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->department->name }}</td>
                        <td>{{ $item->designation->name}}</td>
                        <td>{{ $item->roles->name }}</td>
                        @if (Auth::user()->role_id == 1)
                        <td>
                            <a class="badge badge-warning" href="{{ route('user.edit',$item->id) }}"><i class="fa fa-pencil p-1" style="color:#fff" aria-hidden="true"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endif


                @endforeach
                    </tbody>
                </table>
            </div>
            @include('user.delete')
        </div>

    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('js')
<script type="text/javascript">
function fn_user_delete(user_id) {
$('#user-id').val(user_id);
$('#delete_data_modal').modal('show');
}
</script>
@endsection
