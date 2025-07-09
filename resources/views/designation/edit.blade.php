@extends('layouts.master')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Edit Desig</h1>

</div>
<div class="page-content fade-in-up">
    <div class="row p-5">
        <div class="col-md-12 ">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Desig</div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route('desg.update') }}/{{ $desg->id }}" method="POST">
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
                                <label>Desig Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $desg->name }}" placeholder="Desig Name">
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
