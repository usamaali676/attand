<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','role_id', 'email', 'password', 'dept_id', 'desg_id',  'gardian_name', 'cnic_no', 'contact_no', 'off_email', 'joining_date', 'dob', 'pers_email', 'current_address', 'perm_address', 'last_degree', 'current_degree', 'vehicle_id', 'emg_name', 'emg_contact_no', 'emg_relation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
    	return $this->belongsTo(Roles::class,'role_id');
    }
    public function department()
    {
    	return $this->belongsTo(Department::class,'dept_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'desg_id');
    }
    public function attandance()
    {
        return $this->belongsTo(Attandance::class, 'user_id');
    }

}
