@extends('layouts.app')

@section('title', 'Tax Information Blog | PakTools')
@section('meta_description', 'Detailed algorithms and investment patterns strictly interpreted from the FBR 2024-25 ordinance.')
@section('meta_keywords', 'tax blog, wealth strategies, FBR updates')

@section('content')
<div class="hero-bg py-16 text-center text-white border-b-8 border-action-500">
    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">Tax News & Wealth Strategies</h1>
    <p class="text-lg text-gray-300 font-medium">Detailed algorithms and investment patterns strictly interpreted from the FBR 2024-25 ordinance.</p>
</div>

<main class="max-w-7xl mx-auto px-4 py-16 flex-grow">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($posts as $post)
        <article class="app-card p-6 border-t-4 border-fbrgreen-500 shadow-xl flex flex-col items-center text-center group cursor-pointer hover:-translate-y-2 transition-all duration-300 bg-white rounded-xl" onclick="window.location.href='{{ route('blog.detail', $post->slug) }}'">
            <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 bg-cover bg-center shadow-inner" style="background-image: url('{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : 'https://images.unsplash.com/photo-1579621970588-a3f5ce599fac?w=500&q=80' }}')"></div>
            <div class="text-xs text-action-500 font-extrabold uppercase mb-2">Notice</div>
            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-fbrgreen-500 transition">{{ $post->title }}</h3>
            <p class="text-sm text-slate-500 mb-6 flex-grow">{{ Str::limit(strip_tags($post->content), 150) }}</p>
            <span class="mt-auto border-2 border-action-500 text-action-500 font-bold px-6 py-2 rounded-full text-sm group-hover:bg-action-500 group-hover:text-white transition w-full">Read Complete Guide</span>
        </article>
        @endforeach
    </div>
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
@endsection

@section('styles')
<style>
    .hero-bg { background-image: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center; }
</style>
@endsection
