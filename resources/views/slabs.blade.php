@extends('layouts.app')

@section('title', $page->meta_title ?? 'Income Tax Slabs 2025-2026 | PakTools')
@section('meta_description', $page->meta_description ?? 'The finalized income tax slabs for the fiscal year 2024-2025 have been introduced.')
@section('meta_keywords', $page->meta_keywords ?? 'tax slabs, FBR 2024-25, salary tax pakistan')

@section('content')
<div class="hero-bg py-16 text-center text-white border-b-8 border-action-500">
    <h1 class="text-4xl md:text-5xl lg:text-5xl font-extrabold mb-4 tracking-tight drop-shadow-md">FBR Income Tax Slabs</h1>
    <p class="text-lg text-green-200 font-bold">Updated documentation for Salaried Persons (2025-26)</p>
</div>

<div class="max-w-4xl mx-auto py-16 flex-grow">

    <article class="py-12 mb-16 prose prose-lg prose-green max-w-6xl text-slate-700">
        <h2 class="text-3xl font-extrabold text-slate-900 border-b border-gray-100 pb-4 mb-6">{!! $page->article_title !!}</h2>

        @if($page->lead_text)
            <p class="lead font-medium text-slate-800 text-xl">{!! $page->lead_text !!}</p>
        @endif

        <div class="prose-content">
            {!! $page->article_content !!}
        </div>

        @if($page->ad_middle)
            <div class="ad-slot ad-slot-leaderboard my-8">{!! $page->ad_middle !!}</div>
        @else
            <div class="ad-slot ad-slot-leaderboard my-8 bg-gray-50 border-gray-200">[Google AdSense Middle Block]</div>
        @endif

        <h3 class="text-2xl font-bold text-slate-900 mt-8 mb-4">{!! $page->table_title !!}</h3>

        <div class="overflow-x-auto my-6 shadow rounded-xl border border-gray-200">
            <table class="min-w-full bg-white mb-0">
                <thead class="bg-fbrgreen-50 border-b border-fbrgreen-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-extrabold text-fbrgreen-700 uppercase tracking-wider">Annual Income Bracket (PKR)</th>
                        <th class="px-6 py-4 text-left text-sm font-extrabold text-fbrgreen-700 uppercase tracking-wider">FBR Tax Rate / Formula</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($slabs as $slab)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-5 text-base font-bold text-slate-900">
                            {{ number_format($slab->min_income) }} to {{ $slab->max_income ? number_format($slab->max_income) : 'Above' }}
                        </td>
                        <td class="px-6 py-5 text-base text-slate-600">
                            <strong>{{ $slab->fixed_tax }}</strong> {{ $slab->percentage_tax }}
                            @if($slab->description)
                                <div class="text-xs text-slate-400 mt-1">{{ $slab->description }}</div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($page->note)
        <p class="bg-green-50 p-4 border-l-4 border-fbrgreen-500 rounded text-sm italic font-medium mt-8">
            <strong>Note:</strong> {!! $page->note !!}
        </p>
        @endif

        <div class="mt-10 flex justify-center">
            <a href="{{ route('tools.salary') }}" class="btn-action w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 text-lg rounded-full shadow-lg hover:-translate-y-1 transform transition">
                <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                Calculate My Exact Net Pay
            </a>
        </div>
    </article>

</div>

     {{--FAQ SECTION--}}
<div class="max-w-4xl mx-auto px-4 pb-20 w-full">
    <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
        Slabs Frequently Asked Questions
    </h2>
    <div class="space-y-6 w-full">
        <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
            <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full"> {{-- Added w-full --}}
               Q1. What is the minimum salary limit for income tax in 2025-26?
                <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">+</span>
            </summary>
            <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
               Q2. For the fiscal year 2025-26, the basic exemption limit remains <strong>Rs. 600,000</strong> per year. If your annual taxable income is below this threshold, your tax liability will be zero.
            </div>
        </details>
        <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
            <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
               Q2. How are the tax slabs applied to salaried individuals?
                <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">+</span>
            </summary>
            <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
                Pakistan follows a <strong>progressive tax system</strong>. This means your income is divided into slabs, and higher rates are applied only to the amount falling within the higher brackets, rather than the entire salary being taxed at the maximum rate.
            </div>
        </details>
        <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
            <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
                Q3. Is there a difference in slabs for salaried and non-salaried individuals?
                <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">+</span>
            </summary>
            <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
                Yes, the FBR maintains separate slab structures. Salaried individuals generally enjoy a slightly higher exemption threshold and different percentage brackets compared to business individuals or non-salaried taxpayers.
            </div>
        </details>
        <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
            <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
               Q4. Does the calculator include the fixed tax amounts for each slab?
                <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">+</span>
            </summary>
            <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
               Yes, our calculator precisely computes the <strong>fixed tax</strong> component plus the <strong>percentage rate</strong> applicable to the excess amount in your specific slab, giving you a 100% accurate monthly and yearly breakdown.
            </div>
        </details>
        <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
            <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
                Q5. When do the new tax rates for 2025-26 become effective?
                <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">+</span>
            </summary>
            <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
               The finalized tax slabs are applicable from <strong>July 1, 2025</strong>, and will remain in effect until June 30, 2026. All payroll processing and monthly tax deductions should follow these updated FBR guidelines.
           </div>
        </details>
    </div>
    {{-- end FAQ accordion list --}}
</div>

@endsection

@section('styles')
<style>
    .hero-bg {
        background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1920&q=80');
        background-size: cover; background-position: center;
    }
    .btn-action {
        background: #f97315;
        color: white;
        font-weight: bold;
    }
    .btn-action:hover {
        background: #ea580c;
    }
</style>
@endsection
