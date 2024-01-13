<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\SoftDeletes;

class Manuscript extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $fillable = [
        'user_id',
        'manuscript_id',
        'manu_type',
        'manu_title',
        'manu_file_type',
        'file',
        'manu_abstract',
        'au_id',
        'au_fname',
        'au_lname',
        'au_email',
        'cover_letter'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Manuscript')
        ->logOnly(['manuscript_id', 'manu_title', 'file']);
        // Chain fluent methods for configuration options
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author_manuscripts()
    {
        return $this->hasMany(AuthorManuscript::class);
    }
}
