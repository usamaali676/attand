@extends('layouts.master')
@section('css')

@endsection
@section('content')

@php
    use Illuminate\Support\Carbon;
@endphp
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Check In Sheet</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Check In Sheet</div>
            </div>
            <div class="ibox-body">
                <table  cellspacing="5" cellpadding="5" >
                    <tbody>
                        <tr>
                        <td>Minimum date:</td>
                        <td><input type="text" id="min" name="min"></td>
                        <td>Maximum date:</td>
                        <td><input type="text" id="max" name="max"></td>
                    </tr>

                </tbody></table>
                <table class="display nowrap"  id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Date</th>
                            <th>Working Hour</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Date</th>
                            <th>Working Hour</th>

                        </tr>
                    </tfoot>
                    <tbody>

                        @if (Auth::user()->role_id == 1)
                        @foreach ($atnd as $item )
                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->check->name  }}</td>
                            <td>{{ $item->timein }}</td>
                            <td>{{ $item->timeout }}</td>
                            <td>{{  Carbon::parse($item->date)->format('Y/m/d')}}</td>
                            @if (isset($item->timeout))
                            <td>{{ $item->workhours   }}</td>
                            @else
                            <td></td>
                             @endif


                        </tr>
                        @endforeach
                        @endif

                        @if (Auth::user()->role_id != 1)
                        @foreach ($atnd as $item )
                        @if ($item->user_id == Auth::user()->id)
                        <tr>
                            <td>{{ $srno++ }}</td>
                            <td>{{ $item->check->name }}</td>
                            <td>{{ $item->timein }}</td>
                            <td>{{ $item->timeout }}</td>
                            <td>{{ $item->date }}</td>
                            @if (isset($item->timeout))
                            <td>{{ $item->workhours  }}</td>
                            @else
                            <td></td>
                             @endif

                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            @include('roles.delete')
        </div>

    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('js')
<script type="text/javascript">
function fn_role_delete(role_id) {

$('#role-id').val(role_id);
$('#delete_data_modal').modal('show');
}
</script>
{{-- <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );

        }

    } );
} );

</script> --}}
@endsection

