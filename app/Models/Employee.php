<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Employee extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id',
        'emp_username',
        'emp_email',
        'emp_fname',
        'emp_lname',
        'emp_role',
        'emp_affiliation',
        'emp_address',
        'emp_contact',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Employee')
        ->logOnly(['emp_email', 'emp_role', 'file']);
        // Chain fluent methods for configuration options
    }


}
