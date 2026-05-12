@extends('layouts.app')

@section('title', 'Privacy Policy | PakTools')

@section('content')
<div class="bg-gradient-to-r from-[#1e7e34] to-[#28a745] py-16 px-6 shadow-md">
    <div class="max-w-5xl mx-auto text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4 tracking-tight">Privacy Policy</h1>
        <p class="text-green-50 text-lg md:text-xl opacity-90 max-w-2xl">
            We value your privacy. Learn how we handle your data with transparency and security at PakTools.
        </p>
        <div class="mt-6 inline-block bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-white text-sm border border-white/30">
            Last updated: April 20, 2026
        </div>
    </div>
</div>

<main class="max-w-5xl mx-auto px-6 md:px-12 py-12 bg-white shadow-xl my-[-40px] relative z-10 rounded-2xl border border-gray-100 mb-20">

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">01</span>
            <h2 class="text-2xl font-bold text-gray-900">Introduction</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed">
            Welcome to <span class="font-semibold text-[#28a745]">PakTools</span>. We are committed to protecting your personal information and your right to privacy. When you use our tax calculators, we ensure that your financial data remains confidential and secure.
        </p>
    </section>

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">02</span>
            <h2 class="text-2xl font-bold text-gray-900">Information We Collect</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
            We do not store your personal financial figures. The data you enter is processed locally on your device to provide instant results.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="p-5 bg-gray-50 rounded-xl border-l-4 border-[#28a745] hover:shadow-md transition duration-300">
                <h4 class="font-bold text-gray-900 mb-2">Usage Data</h4>
                <p class="text-sm text-gray-600">We may collect technical info (like browser type) to optimize our website performance and speed.</p>
            </div>
            <div class="p-5 bg-gray-50 rounded-xl border-l-4 border-[#28a745] hover:shadow-md transition duration-300">
                <h4 class="font-bold text-gray-900 mb-2">Calculator Inputs</h4>
                <p class="text-sm text-gray-600">Salary or rental figures are processed in real-time. We never see, transmit, or store these values.</p>
            </div>
            <div class="p-5 bg-gray-50 rounded-xl border-l-4 border-[#28a745] hover:shadow-md transition duration-300">
                <h4 class="font-bold text-gray-900 mb-2">Contact Info</h4>
                <p class="text-sm text-gray-600">If you email us, we only retain your email address to resolve your specific support query.</p>
            </div>
            <div class="p-5 bg-gray-50 rounded-xl border-l-4 border-[#28a745] hover:shadow-md transition duration-300">
                <h4 class="font-bold text-gray-900 mb-2">Cookies</h4>
                <p class="text-sm text-gray-600">We use essential cookies to remember your preferences. You can disable them via browser settings.</p>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">03</span>
            <h2 class="text-2xl font-bold text-gray-900">Data Security</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed">
            We implement industry-standard security measures to maintain the safety of your information. Since your calculated tax results are <span class="font-bold text-gray-900 italic">never saved</span> on our servers, there is no risk of financial data leaks from our side.
        </p>
    </section>

    <section class="mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">04</span>
            <h2 class="text-2xl font-bold text-gray-900">Third-party Services</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed p-6 bg-blue-50 rounded-2xl text-blue-900 border border-blue-100">
            PakTools uses minimal third-party tools (like hosting and basic analytics) to operate effectively. We <span class="font-bold">do not</span> use social media tracking pixels or aggressive advertising networks that profile your behavior.
        </p>
    </section>

    <section class="mb-16">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4">05</span>
            <h2 class="text-2xl font-bold text-gray-900">Your Rights</h2>
        </div>
        <p class="text-lg text-gray-600 leading-relaxed">
            You have the right to request deletion of any support correspondence. Contact us at <a href="mailto:support@paktools.pk" class="text-[#28a745] font-bold underline">support@paktools.pk</a>, and we will process your request within 5 business days.
        </p>
    </section>

    <section class="pt-12 border-t border-gray-100">
        <h2 class="text-3xl font-black text-center text-gray-900 mb-10">Privacy FAQs</h2>

        <div class="max-w-3xl mx-auto space-y-4">
            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Is my financial data stored on your server?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-white">
                    No, PakTools does not store any values you enter in the calculators. Everything is processed in real-time for your privacy.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>How do I request deletion of my data?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    Since we don't store calculator inputs, you can request the deletion of email correspondence by contacting support@paktools.pk.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Are these tax calculations 100% accurate?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    Our tools follow the 2024-25 and 2025-26 budgets. However, always consult a professional for official tax filings.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Does PakTools sell my data?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    No. PakTools is independent and ad-free. We never sell or share user data with marketing companies.
                </div>
            </details>

            <details class="group bg-gray-50 rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-5 text-gray-800 hover:bg-gray-100">
                    <span>Which tax years are supported?</span>
                    <span class="text-[#28a745] transition group-open:rotate-180">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 text-gray-600 border-t border-white">
                    Currently, we support tax years 2024-25 and 2025-26, with updates planned for every new Federal Budget.
                </div>
            </details>
        </div>
    </section>
</main>
@endsection
