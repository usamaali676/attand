@extends('layouts.master')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Create User</h1>

</div>
<div class="page-content fade-in-up">
    <div class="row p-5">
        <div class="col-md-12 ">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Basic form</div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route('user.store') }}" method="POST">
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
                        <div class="row py-2">
                            <div class="col-sm-6 form-group">
                                <label>Department</label>
                            <select class="form-control" name="dept_id" id="role">
                                <option value="">Please Select</option>
                                @foreach ($dept as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Role</label>
                            <select class="form-control" name="role_id" id="role">
                                <option value="">Please Select</option>
                                @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6">
                                <label>Designation</label>
                                <select class="form-control" name="desg_id" id="desig">
                                    <option value="">Please Select</option>
                                    @foreach ($desg as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-sm-6 form-group">
                                <label>Father/Husband's Name</label>
                                <input class="form-control" type="text" name="gardian_name" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>CNIC Num</label>
                                <input class="form-control" type="text" name="cnic_no" placeholder="XXXXX-XXXXXXX-X"  autocomplete="cnic">
                            </div>

                            </div>
                        <div class="row py-2">
                            <div class="col-sm-6 form-group">
                                <label>Contact Number</label>
                                <input class="form-control" type="text" name="contact_no" placeholder="Contact Number" required autocomplete="phone-Numbrer">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Office Email</label>
                                <input class="form-control" type="email" name="off_email" placeholder="Office Email"  >
                            </div>
                        </div>

                            <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Date of Joining</label>
                                    <input class="form-control" type="date" id="start" name="joining_date" value="2020-09-01" min="2020-09-01" max="2030-12-31">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" id="start" name="dob" value="2015-07-22" min="1980-01-01" max="2020-12-31">
                                </div>

                            </div>
                            <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Personal Email</label>
                                    <input class="form-control" type="email" name="pers_email" placeholder="Personal Email"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Current Address</label>
                                    <input class="form-control" type="text" name="current_address" placeholder="Current Address">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Permanent Address</label>
                                    <input class="form-control" type="text" name="perm_address" placeholder="Permanent Address"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Last Degree</label>
                                    <input class="form-control" type="text" name="last_degree" placeholder="Last Degree">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Running Qualifications</label>
                                    <input class="form-control" type="text" name="current_degree" placeholder="Running Qualifications"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Vehicle</label>
                                <select class="form-control" name="vehicle_id" id="role">
                                    <option value="">Please Select</option>
                                    @foreach ($veh as $item)
                                    <option value="{{ $item->id }}">{{ $item->number }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Emergency Contact Name</label>
                                    <input class="form-control" type="text" name="emg_name" placeholder="Emergency Contact Name"  >
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Emergency Contact Num</label>
                                    <input class="form-control" type="text" name="emg_contact_no" placeholder="Emergency Contact Num">
                                </div>
                            </div>
                                <div class="row py-2">
                                <div class="col-sm-6 form-group">
                                    <label>Emergency Contact Relation</label>
                                    <input class="form-control" type="text" name="emg_relation" placeholder="Emergency Contact Relation">
                                </div>
                            </div>
                         <div class="row py-2">
                            <div class="col-sm-6 form-group">
                                <label>User Name</label>
                                <input class="form-control" type="email" name="email" placeholder="Email"  autocomplete="Eamil">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
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
