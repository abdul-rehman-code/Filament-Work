<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class CapitalGainTaxPage extends Model
{
    use LogsActivity;
    protected $fillable = [
        'h1_title',
        'sub_title',
        'content',
        'tax_reference_table',
        'sidebar_tips',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
        'purchase_price',
        'sale_price',
    ];

    protected $casts = [
        'tax_reference_table' => 'array',
        'sidebar_tips' => 'array',
    ];

    public static function settings()
    {
        return self::first() ?: new self([
            'h1_title' => 'Real Estate Capital Gain Tax (CGT) Calculator 2025-26',
            'sub_title' => 'Calculate tax on property sales profit based on holding period and Filer/Non-Filer status under Finance Act 2025.',
        ]);
    }
}
