<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class EmployeeAssigned extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'emp_id',
        'manu_id',
        'manuscript_id',
        'user_id',
        'emp_username',
        'description',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Employee Assigned')
        ->logOnly(['emp_username', 'description']);
        // Chain fluent methods for configuration options
    }
}
