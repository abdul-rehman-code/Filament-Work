<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'url',
        'location',
        'order',
        'is_active',
    ];

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class)->orderBy('order');
    }

    public static function getSelectablePages(): array
    {
        return [
            '/' => 'Home',
            '/slabs' => 'Income Tax Slabs',
            '/blog' => 'Blogs',
            '/faq' => 'FAQs',
            '/contact' => 'Contact Us',
            '/privacy' => 'Privacy Policy',
            '/terms' => 'Terms of Service',
            '/tools/salary-tax' => 'Salary Tax Tool',
            '/tools/freelancer-tax' => 'Freelancer Tax Tool',
            '/tools/youtuber-tax' => 'YouTuber Tax Tool',
            '/tools/rental-tax' => 'Rental Tax Tool',
            '/tools/capital-gain' => 'Capital Gain Tool',
        ];
    }
}
