@extends('layouts.app')

@section('title', 'Terms of Service | PakTools')

@section('content')
<div class="bg-gradient-to-r from-[#1e7e34] to-[#28a745] py-16 px-6 shadow-md">
    <div class="max-w-5xl mx-auto text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4 tracking-tight">Terms of Service</h1>
        <p class="text-green-50 text-lg md:text-xl opacity-90 max-w-2xl">
            Please read these terms carefully before using PakTools. Ensuring transparency in our tax estimation services.
        </p>
        <div class="mt-6 inline-block bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-white text-sm border border-white/30">
            Effective Date: April 20, 2026
        </div>
    </div>
</div>

<main class="max-w-5xl mx-auto px-6 md:px-12 py-12 bg-white shadow-xl my-[-40px] relative z-10 rounded-2xl border border-gray-100 mb-20">

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">01</span>
            <h2 class="text-2xl font-bold text-gray-900">Acceptance of Terms</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed">
            By accessing and using <span class="font-semibold text-[#28a745]">PakTools</span>, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service. These terms apply to all visitors, users, and others who access the service. If you disagree with any part of the terms, you may not access our calculators or services.
        </p>
    </section>

    <section class="mb-12 bg-orange-50 p-6 md:p-8 rounded-2xl border-l-8 border-orange-400 shadow-sm">
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <h2 class="text-2xl font-bold text-gray-900">Professional Disclaimer</h2>
        </div>
        <p class="text-gray-700 leading-relaxed text-lg italic">
            The calculations provided by PakTools are automated estimates based on current FBR (Federal Board of Revenue) rules and tax bands. These tools are for <span class="font-bold underline">informational purposes only</span> and do not constitute legal or financial advice. Because individual tax situations vary based on rebates, credits, and arrears, you should always consult with a certified tax practitioner.
        </p>
    </section>

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">03</span>
            <h2 class="text-2xl font-bold text-gray-900">Proper Use of Calculators</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed mb-6">
            You agree to use our tools only for lawful purposes. You are strictly prohibited from:
        </p>
        <div class="grid md:grid-cols-3 gap-4">
            <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition">
                <p class="text-gray-700 font-medium text-sm">Attempting to reverse engineer algorithm logic.</p>
            </div>
            <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition">
                <p class="text-gray-700 font-medium text-sm">Using automated bots to scrape tax slab data.</p>
            </div>
            <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition">
                <p class="text-gray-700 font-medium text-sm">Using service for fraudulent financial planning.</p>
            </div>
        </div>
    </section>

    <section class="mb-16">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">04</span>
            <h2 class="text-2xl font-bold text-gray-900">Limitation of Liability</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed">
            PakTools and its developers shall not be held liable for any financial loss, penalties from FBR, or inaccuracies arising from the use of our calculators. We strive for 100% accuracy, but tax laws in Pakistan are subject to sudden changes via SROs or Finance Bills.
        </p>
    </section>

    <section class="pt-12 border-t border-gray-100">
        <h2 class="text-3xl font-black text-center text-gray-900 mb-10">Terms & Policy FAQs</h2>

        <div class="max-w-3xl mx-auto space-y-4">

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Are these calculators officially approved by FBR?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    No, PakTools is a private independent platform. While we use official FBR tax slabs, we are not affiliated with the Government of Pakistan.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Do I need to create an account to use the tools?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    No, all our calculators are free to use without any registration or account creation to ensure your maximum privacy.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Can I use these results for my official tax return?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    You can use them as a reference to understand your liability, but you must enter the data into the IRIS portal yourself or via a professional filer.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>What happens if FBR changes tax slabs mid-year?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    We monitor official notifications closely. If a new Finance Bill is passed, we update our backend logic within 24-48 hours.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Is there any limit on calculator usage?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    There are absolutely no limits. You can perform as many calculations as you need for different income levels or properties.
                </div>
            </details>

        </div>
    </section>
</main>
@endsection
