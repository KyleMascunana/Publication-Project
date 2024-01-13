<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AcceptedManuscript extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'emp_id',
        'emp_username',
        'emp_email',
        'rev_stat_id',
        'rev_stat_status',
        'manu_id',
        'manuscript_id',
        'user_id',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Accepted Manuscript')
        ->logOnly(['emp_username', 'emp_email', 'rev_stat_status']);
        // Chain fluent methods for configuration options
    }
}
