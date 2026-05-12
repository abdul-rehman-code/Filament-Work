@extends('layouts.app')

@section('title', ($post->meta_title ?? $post->title) . ' | PakTools Blog')
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->content), 160))
@section('meta_keywords', $post->meta_keywords ?? 'tax news, FBR pakistan')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    <main class="lg:w-3/4 w-full bg-white p-6 sm:p-10 border-t-8 border-fbrgreen-500 rounded-b-xl shadow-xl">
        <div class="mb-8 border-b border-gray-200 pb-6">
            <div class="text-action-500 font-bold text-xs uppercase tracking-widest mb-2">Salary & Savings Guide</div>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-4">{{ $post->title }}</h1>
            <div class="flex items-center text-slate-500 text-sm font-medium">
                <span class="font-bold text-fbrgreen-600">By {{ $post->author ?? 'M. Ali Khan' }}</span><span class="mx-2">|</span>
                <span>Published {{ $post->created_at->format('M d, Y') }}</span><span class="mx-2">|</span>
                <span>12 Min Read</span>
            </div>
        </div>

        @if($post->thumbnail)
        <div class="mb-8 overflow-hidden rounded-xl shadow-lg border border-gray-200">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[600px]">
        </div>
        @endif

        @if($post->ad_top)
            <div class="mb-8">{!! $post->ad_top !!}</div>
        @else
            <div class="ad-slot ad-slot-leaderboard mb-8 bg-slate-50 border-gray-200">[Top Full Banner]</div>
        @endif

        @if($post->table_of_contents)
        <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl mb-8">
            <h2 class="text-xl font-bold text-slate-900 mb-4 uppercase tracking-wide">Table of Contents</h2>
            {!! $post->table_of_contents !!}
        </div>
        @endif

        <article class="prose prose-lg prose-green max-w-none text-slate-600">
            @if($post->ad_middle)
                <div class="mb-8">{!! $post->ad_middle !!}</div>
            @endif
            {!! $post->content !!}
        </article>
        {{-- TAX NEWS & WEALTH STRATEGIES FAQS --}}
<div class="max-w-7xl mx-auto px-4 mt-40 flex-grow w-full mb-16">
    <div class="w-full">
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Wealth Strategy Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q1. How does the FBR 2024-25 Ordinance impact long-term wealth strategies?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    The 2024-25 Ordinance shifts focus from mere taxation to <strong>strict documentation</strong>. Wealth strategies now require a "Compliance-First" approach, where investment patterns must be aligned with traceable cash flows to avoid the higher tax brackets and penalties designed for undocumented assets.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q2. What are the "Detailed Algorithms" mentioned in tax interpretations?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    These refer to the <strong>progressive mathematical models</strong> used by the FBR to calculate effective tax rates across different income streams (Salary, Rental, and Capital Gains). Understanding these algorithms helps investors time their asset liquidation to minimize the "Tax Drag" on their net portfolio.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q3. Why is it important to interpret investment patterns strictly?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    The FBR now utilizes <strong>data-matching patterns</strong> between bank transactions, property registries, and lifestyle expenditures. A strict interpretation ensures that your investment growth is legally shielded and that every PKR added to your wealth is justified via reconciled tax returns.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q4. Can tax news updates help in reducing annual tax liability?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Absolutely. Staying updated with the latest <strong>Finance Circulars and SROs</strong> allows you to take advantage of new tax credits, rebates, and adjusted slabs before the fiscal year ends, ensuring your wealth management remains proactive rather than reactive.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q5. How do these strategies protect against FBR audits?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    A well-structured wealth strategy ensures that your **Wealth Statement (Form 116)** perfectly mirrors your actual asset growth. By following the strict interpreted patterns of the 2024-25 ordinance, you eliminate the "discrepancy gaps" that typically trigger automated FBR audit notices.
                </div>
            </details>

        </div>
    </div>
</div>
{{-- TAX NEWS & WEALTH STRATEGIES FAQS END --}}
    </main>

    <aside class="lg:w-1/4 w-full space-y-6">
        @if($post->ad_sidebar)
            <div class="ad-slot ad-slot-rectangle bg-slate-50 border-gray-100 rounded-xl p-4 border shadow-sm">
                <div class="text-[10px] text-gray-400 font-bold uppercase mb-2">Advertisement</div>
                {!! $post->ad_sidebar !!}
            </div>
        @else
            <div class="ad-slot ad-slot-rectangle bg-slate-50 border-gray-200 rounded-xl py-20 text-center text-slate-400 font-bold border-2 border-dashed">[Sidebar 300x250 Ad]</div>
        @endif
        <div class="app-card p-5 border-t-4 border-fbrgreen-500 shadow-md bg-white rounded-xl">
            <h3 class="font-bold text-slate-900 mb-3 border-b border-gray-200 pb-2">Use the Salary Tool Matrix</h3>
            <p class="text-xs text-slate-500 mb-4 tracking-wide leading-relaxed">Enter your gross salary in our portal to see exactly what you owe. Determine step-by-step how much you can save.</p>
            <a href="{{ route('tools.salary') }}" class="block w-full text-center bg-action-500 text-white font-bold py-2.5 rounded-full hover:-translate-y-1 transition transform shadow-md">Calculate Tax Now</a>
        </div>
    </aside>
</div>
@endsection
