<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SlabPage extends Model
{
    use LogsActivity;
    protected $fillable = [
        'article_title',
        'lead_text',
        'article_content',
        'table_title',
        'note',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_flex_grow',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
    ];

    /**
     * Get the singleton slab page settings row.
     */
    public static function settings(): self
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('slab_pages')) {
            return new self([
                'article_title' => 'Income Tax Slabs for Salaried Individuals in Pakistan (2025-2026)',
                'lead_text' => 'The finalized income tax slabs for the fiscal year 2024-2025 have been introduced. Starting from July 1, 2025, individuals earning more than Rs. 600,000 per year will face updated tax rates.',
                'table_title' => 'Updated Income Tax Slabs - 2025-26',
                'note' => 'Note: The active progressive system subtracts the base exemption sequentially. You do not pay 35% on your entire salary; you only pay 35% on the distinct amount extending past 4.1M.',
                'meta_title' => 'Income Tax Slabs 2025-2026 | PakTools',
            ]);
        }

        return self::firstOrCreate([], [
            'article_title' => 'Income Tax Slabs for Salaried Individuals in Pakistan (2025-2026)',
            'lead_text' => 'The finalized income tax slabs for the fiscal year 2024-2025 have been introduced. Starting from July 1, 2025, individuals earning more than Rs. 600,000 per year will face updated tax rates.',
            'table_title' => 'Updated Income Tax Slabs - 2025-26',
            'note' => 'Note: The active progressive system subtracts the base exemption sequentially. You do not pay 35% on your entire salary; you only pay 35% on the distinct amount extending past 4.1M.',
            'meta_title' => 'Income Tax Slabs 2025-2026 | PakTools',
        ]);
    }

    public function slabs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Slab::class);
    }
}
