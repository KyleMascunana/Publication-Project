<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Reviewer extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id',
        'rev_fname',
        'rev_lname',
        'rev_email',
        'rev_affiliation',
        'rev_address',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Reviewer')
        ->logOnly(['rev_fname', 'rev_lname', 'rev_email', 'file']);
        // Chain fluent methods for configuration options
    }


}
