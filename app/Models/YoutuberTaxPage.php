<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class YoutuberTaxPage extends Model
{
    use LogsActivity;
    protected $fillable = [
        'h1_title',
        'sub_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'tax_reference_table',
        'key_tax_rules',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
    ];

    protected $casts = [
        'tax_reference_table' => 'array',
        'key_tax_rules' => 'array',
    ];

    public static function settings()
    {
        return self::first() ?: new self();
    }
}
