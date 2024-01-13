<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ReviewerManuscript extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'rev_id',
        'manu_id',
        'manuscript_id',
        'user_id',
        'description',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Send Manuscript')
        ->logOnly([
            'rev_id',
            'manu_id',
            'manuscript_id',
            'user_id',
            'description',
            'file'
        ]);
        // Chain fluent methods for configuration options
    }


    public function reviewers()
    {
        return $this->belongsTo(Reviewer::class);
    }

}
