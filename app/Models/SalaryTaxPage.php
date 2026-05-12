<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;

class SalaryTaxPage extends Model implements HasRichContent
{
    use InteractsWithRichContent;
    use LogsActivity;

    protected $fillable = [
        'h1_title',
        'sub_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
        'faqs',
    ];

    protected $casts = [
        'faqs' => 'array',
    ];

    public function setUpRichContent(): void
    {
        $this->registerRichContent('content');
    }

    public static function settings(): self
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('salary_tax_pages')) {
            return new self([
                'h1_title' => 'Salary Tax Calculator Pakistan (2025-26)',
                'sub_title' => 'Verify your exact monthly deductions based on FBR\'s latest Finance Act 2025 legislation.',
                'meta_title' => 'Salary Tax Calculator Pakistan 2025-26 | PakTools',
                'meta_description' => 'Calculate your monthly and annual salary tax for 2025-26 using the latest FBR slabs.',
                'meta_keywords' => 'salary tax calculator, pakistan tax calculator 2025',
                'content' => '<h3>How to Calculate Income Tax on Salary in Pakistan</h3><p>Gone are the tedious days...</p>',
            ]);
        }

        return self::firstOrCreate([], [
            'h1_title' => 'Salary Tax Calculator Pakistan (2025-26)',
            'sub_title' => 'Verify your exact monthly deductions based on FBR\'s latest Finance Act 2025 legislation.',
            'meta_title' => 'Salary Tax Calculator Pakistan 2025-26 | PakTools',
            'meta_description' => 'Calculate your monthly and annual salary tax for 2025-26 using the latest FBR slabs.',
            'meta_keywords' => 'salary tax calculator, pakistan tax calculator 2025',
            'content' => '<h3>How to Calculate Income Tax on Salary in Pakistan</h3><p>Gone are the tedious days...</p>',
        ]);
    }
}