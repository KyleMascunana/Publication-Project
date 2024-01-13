<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ReviewedStatus extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'manu_id',
        'manuscript_id',
        'au_id',
        'au_fname',
        'au_lname',
        'rev_id',
        'user_id',
        'rev_stat_status'
    ];

    protected static $logName = 'Manuscript Status';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Manuscript Status')
        ->logOnly(['manuscript_id', 'rev_stat_status']);
        // Chain fluent methods for configuration options
    }

    public function manuscripts()
    {
        return $this->belongsTo(Manuscript::class);
    }

    public function authors()
    {
        return $this->belongsTo(Author::class);
    }

    public function reviewers()
    {
        return $this->belongsTo(Reviewer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
