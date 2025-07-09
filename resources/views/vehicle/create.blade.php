@extends('layouts.master')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Create Vehicle</h1>

</div>
<div class="page-content fade-in-up">
    <div class="row p-5">
        <div class="col-md-12 ">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Vehicle</div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route('vehicle.store') }}" method="POST">
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
                            <div class="col-sm-6 form-group">
                                <label>Vehicle Type</label>
                                <select class="form-control" name="type_id" id="vehicle-type">
                                    <option value="">Please Select</option>
                                    @foreach ($vehicletype as  $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Number</label>
                                <input type="text" class="form-control" name="number">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
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
