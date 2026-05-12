@extends('layouts.app')

@section('title', 'Frequently Asked Questions | Comprehensive FBR Guide | PakTools')

@section('content')
<div class="bg-green-600 pt-20 pb-28 px-4">
    <div class="max-w-7xl mx-auto text-center md:text-left">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-4">
            Frequently Asked Questions
        </h1>
        <p class="text-emerald-50 text-lg md:text-xl max-w-2xl font-medium opacity-90">
            Find answers to common questions about FBR tax filing, Section 154A,
            and compliance for freelancers and businesses in Pakistan.
        </p>

        <div class="mt-8">
            <span class="bg-emerald-500/30 text-white text-xs font-bold px-4 py-2 rounded-full border border-emerald-400/30">
                Effective Date: April 20, 2026
            </span>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 -mt-12 flex-grow w-full flex flex-col lg:flex-row gap-12 mb-16">
    <div class="lg:w-3/4">
        <div class="bg-white rounded-[2rem] p-6 md:p-10 shadow-xl border border-slate-100">
            <div class="space-y-6">
                @php
                    $faqCount = count($faqs);
                    $midPoint = ceil($faqCount / 2);
                @endphp

                @foreach($faqs as $index => $faq)
                    @if($index == 0 && $faq->ad_top)
                        <div class="mb-6">{!! $faq->ad_top !!}</div>
                    @endif

                    @if($index == $midPoint && $faq->ad_middle)
                        <div class="my-6">{!! $faq->ad_middle !!}</div>
                    @endif

                    <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                        <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center">
                            {{ $faq->question }}
                            <span class="text-emerald-500 text-xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                        </summary>
                        <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </details>
                @endforeach
            </div>

            <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 text-gray-700 leading-relaxed">

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 uppercase tracking-tight border-b pb-2">
            Understanding FBR Tax Filing & Section 154A in Pakistan
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <p>
                In today’s rapidly digitizing financial environment, understanding
                <strong class="text-gray-900">FBR tax filing</strong> is no longer optional — it is a necessity for anyone earning income in Pakistan.
            </p>
            <p>
                The <strong class="text-gray-900">Federal Board of Revenue (FBR)</strong> has strengthened compliance systems, making it essential to declare income through the
                <strong class="text-gray-900">IRIS portal</strong>. Provisions like
                <strong class="text-gray-900">Section 154A</strong> are reshaping digital income taxation.
            </p>
            <p>
                This guide helps you understand filing, compliance, and how to optimize your tax position.
            </p>
        </div>
    </article>

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 border-b pb-2">
            The Importance of Filing Your Tax Return
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <p>
                Filing your tax return means declaring your income, expenses, and assets to FBR. Once filed, you become part of the
                <strong class="text-gray-900">Active Taxpayer List (ATL)</strong>.
            </p>

            <div class="border-l-4 border-green-500 pl-4 py-2 text-sm sm:text-base">
                <p class="font-semibold text-gray-900">Key Benefit:</p>
                <p>Lower taxes, better financial credibility, and access to banking services.</p>
            </div>

            <p>
                Non-filers face higher deductions and restrictions. Even a <strong>zero return</strong> keeps you compliant.
            </p>
        </div>
    </article>

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 border-b pb-2">
            Section 154A — Impact on Freelancers
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <p>
                <strong class="text-gray-900">Section 154A</strong> applies to digital income like freelancing and IT exports.
            </p>

            <p>
                Income received via banks may qualify for reduced or final tax rates.
            </p>

            <div class="border-l-4 border-yellow-500 pl-4 py-2 text-sm sm:text-base">
                <p class="font-semibold text-gray-900">Important:</p>
                <p>Always receive payments through official banking channels.</p>
            </div>

            <p>
                Undocumented income leads to penalties and loss of benefits.
            </p>
        </div>
    </article>

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 border-b pb-2">
            How the IRIS Portal Works
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <p>
                The <strong class="text-gray-900">IRIS portal</strong> is used for online tax filing.
            </p>

            <ul class="list-disc pl-5 sm:pl-6 space-y-2">
                <li>Create account using CNIC</li>
                <li>Enter income details</li>
                <li>Declare assets</li>
                <li>Submit return</li>
            </ul>

            <p>
                It calculates tax automatically, but accuracy is important.
            </p>
        </div>
    </article>

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 border-b pb-2">
            Compliance Risks & Audits
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <p>
                FBR tracks bank data and transactions. Mismatches can trigger audits.
            </p>

            <div class="border-l-4 border-red-500 pl-4 py-2 text-sm sm:text-base">
                <p class="font-semibold text-gray-900">⚠️ Warning:</p>
                <p>Audits can go back up to 5 years.</p>
            </div>

            <p>
                Proper records and accurate filing reduce risk.
            </p>
        </div>
    </article>

    <!-- SECTION -->
    <article class="mb-10 sm:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 sm:mb-6 border-b pb-2">
            Benefits of Compliance
        </h2>

        <div class="space-y-4 text-sm sm:text-base md:text-lg">
            <ul class="list-disc pl-5 sm:pl-6 space-y-2">
                <li>Lower taxes</li>
                <li>Access to loans</li>
                <li>Better financial profile</li>
                <li>Business opportunities</li>
            </ul>

            <p>
                Freelancers also gain trust with international clients.
            </p>
        </div>
    </article>

    <!-- FINAL -->
    <article class="pt-6 sm:pt-8 border-t text-center">
        <p class="text-base sm:text-lg md:text-xl font-bold text-gray-900 italic leading-snug">
            Filing your tax return regularly is the smartest way to protect your income and build long-term financial stability.
        </p>
    </article>

</section>
        </div>
    </div>

    <aside class="lg:w-1/4">
        <div class="sticky top-24 space-y-6 pt-12">
            @foreach($faqs as $faq)
                @if($faq->ad_sidebar)
                    <div class="bg-gray-50 border border-gray-100 rounded-xl p-4">
                        <div class="text-[10px] text-gray-400 font-bold uppercase mb-2">Advertisement</div>
                        {!! $faq->ad_sidebar !!}
                    </div>
                    @break
                @endif
            @endforeach

            <div class="app-card p-6 border-t-4 border-emerald-500 mt-2 shadow-md bg-white rounded-xl text-center">
                <h3 class="font-bold text-slate-900 mb-3">Need Help?</h3>
                <p class="text-xs text-slate-500 mb-4">Calculate your taxes instantly with our professional tools.</p>
                <a href="{{ route('home') }}#all_tools" class="block w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-full text-sm transition-colors">
                    View Calculators
                </a>
            </div>
        </div>
    </aside>
</div>
@endsection
