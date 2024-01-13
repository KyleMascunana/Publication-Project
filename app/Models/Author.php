<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Author extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'user_id',
        'au_fname',
        'au_lname',
        'au_email',
        'au_affiliation',
        'au_address',
        'file'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Author')
        ->logOnly(['au_fname', 'au_lname', 'au_email', 'file']);
        // Chain fluent methods for configuration options
    }


    public function author_manuscripts()
    {
        return $this->hasMany(AuthorManuscript::class);
    }
}
