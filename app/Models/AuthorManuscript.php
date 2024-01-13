<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AuthorManuscript extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'au_id',
        'manu_id',
        'manuscript_id',
        'au_manu_Lname',
        'au_manu_email',
        'au_manu_affiliation',
        'user_id'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Co-Author')
        ->logOnly(['au_manu_Lname', 'au_manu_email', 'manuscript_id']);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
