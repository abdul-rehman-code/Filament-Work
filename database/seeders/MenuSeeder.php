<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $home = \App\Models\Menu::create(['title' => 'Home', 'url' => '/', 'location' => 'header', 'order' => 1]);
        $slabs = \App\Models\Menu::create(['title' => 'Income Tax Slabs', 'url' => '/slabs', 'location' => 'header', 'order' => 2]);
        
        $calcs = \App\Models\Menu::create(['title' => 'Calculators', 'url' => null, 'location' => 'header', 'order' => 3]);
        $calcs->subMenus()->createMany([
            ['title' => 'Salary Tax', 'url' => '/tools/salary-tax', 'order' => 1],
            ['title' => 'Freelancer Exporter', 'url' => '/tools/freelancer-tax', 'order' => 2],
            ['title' => 'YouTube Income Tax Converter', 'url' => '/tools/youtuber-tax', 'order' => 3],
            ['title' => 'Property Rental', 'url' => '/tools/rental-tax', 'order' => 4],
            ['title' => 'Capital Gain (CGT)', 'url' => '/tools/capital-gain', 'order' => 5],
        ]);

        \App\Models\Menu::create(['title' => 'Blogs', 'url' => '/blog', 'location' => 'header', 'order' => 4]);
        \App\Models\Menu::create(['title' => 'Faqs', 'url' => '/faq', 'location' => 'header', 'order' => 5]);

        // Footer Menus
        \App\Models\Menu::create(['title' => 'Income Tax Slabs', 'url' => '/slabs', 'location' => 'footer', 'order' => 1]);
        \App\Models\Menu::create(['title' => 'About us', 'url' => '/faq', 'location' => 'footer', 'order' => 2]);
        \App\Models\Menu::create(['title' => 'Blogs', 'url' => '/blog', 'location' => 'footer', 'order' => 3]);
        \App\Models\Menu::create(['title' => 'Contact us', 'url' => '/contact', 'location' => 'footer', 'order' => 4]);
        \App\Models\Menu::create(['title' => 'Faqs', 'url' => '/faq', 'location' => 'footer', 'order' => 5]);
        \App\Models\Menu::create(['title' => 'Privacy Policy', 'url' => '/privacy', 'location' => 'footer', 'order' => 6]);
        \App\Models\Menu::create(['title' => 'Terms of Service', 'url' => '/terms', 'location' => 'footer', 'order' => 7]);
    }
}
