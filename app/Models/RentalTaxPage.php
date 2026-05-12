<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class RentalTaxPage extends Model
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
    ];

    protected $casts = [
        'tax_reference_table' => 'array',
        'sidebar_tips' => 'array',
    ];

    public static function settings()
    {
        return self::first() ?: new self([
            'h1_title' => 'Rental Income Tax Calculator (2025-26)',
            'sub_title' => 'Calculate tax on income from unmovable property (Land/Buildings) under Section 15 of the Income Tax Ordinance.',
        ]);
    }
}
