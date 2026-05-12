<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class FreelancerTaxPage extends Model
{
    use LogsActivity;
    protected $fillable = [
        'h1_title',
        'sub_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'pseb_facts',
        'fbr_gateways',
        'comparison_title',
        'comparison_subtitle',
        'comparison_first_column_label',
        'comparison_amounts',
        'pseb_rate_label',
        'pseb_rate_value',
        'non_pseb_rate_label',
        'non_pseb_rate_value',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
        'faqs',
    ];

    protected $casts = [
        'pseb_facts' => 'array',
        'fbr_gateways' => 'array',
        'comparison_amounts' => 'array',
        'pseb_rate_value' => 'decimal:4',
        'non_pseb_rate_value' => 'decimal:4',
        'faqs' => 'array',
    ];

    public static function settings()
    {
        return self::first() ?: new self();
    }
}
