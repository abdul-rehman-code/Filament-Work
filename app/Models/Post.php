<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use LogsActivity;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'thumbnail',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
    ];
}
