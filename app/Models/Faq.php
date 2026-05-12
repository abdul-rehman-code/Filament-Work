<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use LogsActivity;
    protected $fillable = [
        'question',
        'answer',
        'is_active',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
    ];

}
