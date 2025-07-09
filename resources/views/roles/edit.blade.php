@extends('layouts.master')
@section('content')

<div class="page-heading">
    <h1 class="page-title">Edit Role</h1>

</div>
<div class="page-content fade-in-up">
    <div class="row p-5">
        <div class="col-md-12 ">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Roles</div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route('roles.update') }}/{{ $role->id }}" method="POST">
                        @csrf
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Role Name</label>
                                <input class="form-control" type="text" value="{{ $role->name }}" name="name" placeholder="Rolet Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
