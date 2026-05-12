<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use LogsActivity;
    protected $fillable = [
        'hero_subtitle',
        'seo_heading',
        'seo_content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'ad_top',
        'ad_middle',
        'ad_sidebar',
        'all_tools',
    ];

    protected $casts = [
        'all_tools' => 'array',
    ];

    /**
     * Get the singleton home page settings row.
     */
    public static function settings(): self
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('home_pages')) {
            return new self([
                'hero_subtitle' => '100% accurate salary, freelancer, property, and YouTuber calculators mapped directly to the 2024-25 Finance Budget. Easily compute your exact return.',
                'seo_heading' => 'Complete Detail: Federal Board of Revenue (FBR) Taxation Guide 2024-2026',
                'seo_content' => '<h3>Overview of the Pakistan Tax Calculator</h3><p>Our comprehensive tools accurately reflect the latest amendments made in the Federal Budget by the Government of Pakistan. The system has shifted heavily to rely on the <strong>Active Taxpayer List (ATL)</strong>, meaning non-filers face immense penalty surcharges scaling from property sales to everyday banking transactions.</p><h3>Why File Your Income Tax Returns?</h3><p>Under the Income Tax Ordinance 2001, filing an income return is mandatory for any individual earning an annual income above the basic exemption threshold of Rs. 600,000. Beyond legal compliance, filing brings numerous advantages:</p><ul><li><strong>Halved Withholding Taxes:</strong> Filers pay 50% less withholding tax on banking transactions and vehicle registrations compared to non-filers.</li><li><strong>Property Perks:</strong> Capital Gains Tax (CGT) on real estate currently sits at 15% for filers, while non-filers face an astronomical 45% levy.</li><li><strong>Business Growth:</strong> Active filers can enter massive provincial tenders and open commercial corporate bank accounts freely.</li></ul><h3>How Can I Reduce My Tax Liability?</h3><p>Our calculators analyze Gross Revenue. To diminish your actual net payment, taxpayers should heavily utilize the legal rebate provisions within Section 61, 62, and 63 of the FBR constitution. Enrolling in Voluntary Pension Schemes (VPS), investing in mutual funds, securing life/health insurance, and routing charitable donations properly can drop your applicable payment by up to 20%.</p>',
                'meta_title' => 'PakTools | Pakistan FBR Tax Calculator 2024-25 | Salary, Freelancer & Property',
                'meta_description' => 'Calculate your exact FBR income tax in seconds with PakTools. Free salary, freelancer, YouTuber & real estate tax calculators based on the 2024-25 Finance Act.',
                'meta_keywords' => 'FBR tax calculator, Pakistan income tax, salary tax 2024-25, freelancer tax, property rental tax, capital gain tax Pakistan',
            ]);
        }

        return self::firstOrCreate([], [
            'hero_subtitle' => '100% accurate salary, freelancer, property, and YouTuber calculators mapped directly to the 2024-25 Finance Budget. Easily compute your exact return.',
            'seo_heading' => 'Complete Detail: Federal Board of Revenue (FBR) Taxation Guide 2024-2026',
            'seo_content' => '<h3>Overview of the Pakistan Tax Calculator</h3><p>Our comprehensive tools accurately reflect the latest amendments made in the Federal Budget by the Government of Pakistan. The system has shifted heavily to rely on the <strong>Active Taxpayer List (ATL)</strong>, meaning non-filers face immense penalty surcharges scaling from property sales to everyday banking transactions.</p><h3>Why File Your Income Tax Returns?</h3><p>Under the Income Tax Ordinance 2001, filing an income return is mandatory for any individual earning an annual income above the basic exemption threshold of Rs. 600,000. Beyond legal compliance, filing brings numerous advantages:</p><ul><li><strong>Halved Withholding Taxes:</strong> Filers pay 50% less withholding tax on banking transactions and vehicle registrations compared to non-filers.</li><li><strong>Property Perks:</strong> Capital Gains Tax (CGT) on real estate currently sits at 15% for filers, while non-filers face an astronomical 45% levy.</li><li><strong>Business Growth:</strong> Active filers can enter massive provincial tenders and open commercial corporate bank accounts freely.</li></ul><h3>How Can I Reduce My Tax Liability?</h3><p>Our calculators analyze Gross Revenue. To diminish your actual net payment, taxpayers should heavily utilize the legal rebate provisions within Section 61, 62, and 63 of the FBR constitution. Enrolling in Voluntary Pension Schemes (VPS), investing in mutual funds, securing life/health insurance, and routing charitable donations properly can drop your applicable payment by up to 20%.</p>',
            'meta_title' => 'PakTools | Pakistan FBR Tax Calculator 2024-25 | Salary, Freelancer & Property',
            'meta_description' => 'Calculate your exact FBR income tax in seconds with PakTools. Free salary, freelancer, YouTuber & real estate tax calculators based on the 2024-25 Finance Act.',
            'meta_keywords' => 'FBR tax calculator, Pakistan income tax, salary tax 2024-25, freelancer tax, property rental tax, capital gain tax Pakistan',
        ]);
    }
}
