<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What is the active threshold for 2024-25?',
                'answer' => 'The basic tax exemption threshold is currently set to exactly PKR 600,000 per annum (PKR 50,000 per month). If your total gross generation scales below this mark, your ultimate tax liability zeros out completely.',
                'is_active' => true,
            ],
            [
                'question' => 'What are the penalties for being a Non-Filer?',
                'answer' => 'Non-filers are subjected to punitive secondary rates across practically all financial interactions. For example, while active filers pay a standard 15% CGT on real estate, non-filers face a 45% withholding penalty.',
                'is_active' => true,
            ],
            [
                'question' => 'How is IT/Freelance Remittance taxed?',
                'answer' => 'Inward foreign currency (USD, GBP) is subject to a nominal 1.0% Final Withholding Tax (FWT). Crucially, if you register with PSEB, this rate drops to just 0.25%.',
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
