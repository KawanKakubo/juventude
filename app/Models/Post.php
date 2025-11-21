<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'post_date',
        'published'
    ];

    protected $casts = [
        'post_date' => 'date',
        'published' => 'boolean',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('order');
    }
}
