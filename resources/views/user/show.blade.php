@extends('layouts.master')
@section('content')

<div class="container pt-5">
    <div class="row py-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2>User Details</h2>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 " style="padding-left: 20px;">
                    <p><b>Name:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->name }}</p>
                    <p><b>Department:</b> &nbsp;&nbsp;&nbsp;{{ $user->department->name }}</p>
                    <p><b>Role:</b> &nbsp;&nbsp;&nbsp;{{ $user->roles->name }}</p>
                    <p><b>Designation:</b> &nbsp;&nbsp;&nbsp;{{ $user->designation->name }}</p>
                    <p><b>Father/Husband's Name:</b> &nbsp;&nbsp;&nbsp;{{ $user->gardian_name }}</p>
                    <p><b>CNIC No:</b> &nbsp;&nbsp;&nbsp;{{ $user->cnic_no }}</p>
                    <p><b>Contact Number:</b> &nbsp;&nbsp;&nbsp;{{ $user->contact_no }}</p>
                    <p><b>Office Email:</b> &nbsp;&nbsp;&nbsp;{{ $user->off_email }}</p>
                    <p><b>Personal Email:</b> &nbsp;&nbsp;&nbsp;{{ $user->pers_email }}</p>
                    <p><b>Date of Joining:</b> &nbsp;&nbsp;&nbsp;{{ $user->joining_date }}</p>
                    <p><b>Date of Birth:</b> &nbsp;&nbsp;&nbsp;{{ $user->dob }}</p>
                    <p><b>Current Address:</b> &nbsp;&nbsp;&nbsp;{{ $user->current_address }}</p>
                    <p><b>Permanent Address:</b> &nbsp;&nbsp;&nbsp;{{ $user->perm_address }}</p>
                    <p><b>Last Degree:</b> &nbsp;&nbsp;&nbsp;{{ $user->last_degree }}</p>
                    <p><b>Running Qualifications:</b> &nbsp;&nbsp;&nbsp;{{ $user->current_degree }}</p>
                    <p><b>Vehicle:</b> &nbsp;&nbsp;&nbsp;{{ $user->vehicle->number }}</p>
                    <p><b>Emergency Contact Name:</b> &nbsp;&nbsp;&nbsp;{{ $user->emg_name }}</p>
                    <p><b>Emergency Contact No:</b> &nbsp;&nbsp;&nbsp;{{ $user->emg_contact_no }}</p>
                    <p><b>Emergency Contact Relation:</b> &nbsp;&nbsp;&nbsp;{{ $user->emg_relation }}</p>
                    <p><b>Username</b> &nbsp;&nbsp;&nbsp;{{ $user->email }}</p>



                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
