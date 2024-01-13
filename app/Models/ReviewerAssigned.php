<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ReviewerAssigned extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'rev_stat_id',
        'manu_id',
        'rev_id',
        'rev_stat_status',
        'manuscript_id',
        'rev_fname',
        'rev_lname'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Reviewer Assigned')
        ->logOnly(['rev_stat_status', 'rev_fname', 'rev_lname']);
        // Chain fluent methods for configuration options
    }

    public function reviewers()
    {
        return $this->belongsTo(Reviewer::class);
    }

}
