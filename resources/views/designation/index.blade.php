@extends('layouts.master')

@section('content')

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Designations</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <a href="{{ route('desg.create') }}" class="btn btn-primary">Add New Desig</a>
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
                        @foreach ($desg as $item )


                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->name }}</td>

                            <td>
                                <a class="badge badge-warning" href="{{ route('desg.edit',$item->id) }}"><i class="fa fa-pencil p-1" style="color:#fff" aria-hidden="true"></i></a>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="javascript:void(0);" class="text-muted font-16 badge badge-danger"
                                        onclick="fn_desg_delete({{ $item->id }})">
                                        <i class="fa fa-trash-o p-1" style="color: #fff" aria-hidden="true"></i></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('designation.delete')
        </div>

    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('js')
<script type="text/javascript">
function fn_desg_delete(desg_id) {

$('#desg-id').val(desg_id);
$('#delete_data_modal').modal('show');
}
</script>
@endsection

