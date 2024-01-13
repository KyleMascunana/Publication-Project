<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Comment extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'rev_id',
        'com_rev_fname',
        'com_rev_lname',
        'com_comment',
        'com_status',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Comments')
        ->logOnly(['com_rev_fname', 'com_rev_lname', 'com_comment']);
        // Chain fluent methods for configuration options
    }

}
