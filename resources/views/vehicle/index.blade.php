@extends('layouts.master')

@section('content')

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">DataTables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">DataTables</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
                <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Add New Vehicle</a>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Number</th>
                            <th>Description</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Number</th>
                            <th>Description</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($veh as $item )


                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->vehicletype->name }}</td>
                            <td>{{ $item->number }}</td>
                            <td style="max-width: 70px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->description }}</td>

                            <td>
                                <a class="badge badge-warning" href="{{ route('vehicle.edit',$item->id) }}"><i class="fa fa-pencil p-1" style="color:#fff" aria-hidden="true"></i></a>
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a href="javascript:void(0);" class="text-muted font-16 badge badge-danger"
                                        onclick="fn_veh_delete({{ $item->id }})">
                                        <i class="fa fa-trash-o p-1" style="color: #fff" aria-hidden="true"></i></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('vehicle.delete')
        </div>

    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('js')
<script type="text/javascript">
function fn_veh_delete(veh_id) {

$('#veh-id').val(veh_id);
$('#delete_data_modal').modal('show');
}
</script>
@endsection

