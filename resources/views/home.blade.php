@extends('layouts.app')

@section('title', $page->meta_title ?? 'PakTools | Instant FBR Tax Calculators Pakistan 2024-25')
@section('meta_description', $page->meta_description ?? 'Calculate your exact FBR 2024-25 taxes instantly. Official slabs and brackets for Salary, Exporters, YouTubers, and Real Estate in Pakistan.')
@section('meta_keywords', $page->meta_keywords ?? 'FBR, tax calculator Pakistan, salary tax, income tax slabs, 2024-25')

@section('content')
<div class="hero-bg py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="flex flex-col text-left">
            <h1 class="text-4xl sm:text-5xl border-l-4 border-action-500 pl-4 lg:text-6xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                حساب کریں اپنا ٹیکس<br>
                <span class="text-2xl lg:text-4xl text-green-300 font-bold block mt-2">Find Your Exact FBR Tax Instantly.</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 max-w-xl font-medium">{{ $page->hero_subtitle }}</p>

            {{-- Custom dropdown replaces native <select> to fix mobile overflow --}}
            <div class="relative w-full max-w-xl mb-6" id="dd-wrap">
                <button type="button" onclick="toggleDd()" class="w-full bg-white text-gray-500 shadow-2xl rounded-xl font-semibold text-sm sm:text-base text-left py-3 sm:py-4 pl-11 pr-10 border-4 border-transparent hover:border-green-300 focus:border-action-500 focus:outline-none transition-all flex items-center justify-between">
                    <span class="flex items-center gap-3 min-w-0 flex-1">
                        <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <span id="dd-label" class="truncate">Search for a tool (e.g. Salary, Property)...</span>
                    </span>
                    <svg id="dd-arrow" class="h-5 w-5 text-gray-400 flex-shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul id="dd-menu" class="hidden absolute left-0 right-0 top-full mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50">
                    @foreach([
                        ['Salary Income Tax Calculator',      route('tools.salary')],
                        ['Freelancer IT Exporter Remittance', route('tools.freelancer')],
                        ['YouTube Income Tax Converter',      route('tools.youtuber')],
                        ['Property Rental Tax',              route('tools.rental')],
                        ['Real Estate Capital Gain (CGT)',   route('tools.capital-gain')],
                    ] as [$label, $url])
                    <li><a href="{{ $url }}" class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors border-b border-gray-50 last:border-0">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        {{ $label }}
                    </a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="hidden lg:flex justify-end relative items-center min-h-[400px]">
            <div class="absolute right-10 top-1/2 transform -translate-y-1/2 bg-fbrgreen-500 rounded-full blur-[120px] w-64 h-64 opacity-40"></div>
            <div class="relative z-10 flex flex-col space-y-6 w-full max-w-sm">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-2xl transform translate-x-4 rotate-2 hover:rotate-0 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-green-300 font-bold text-sm tracking-widest uppercase">Salary Tax Slab</div>
                        <span class="bg-green-500/20 text-green-300 py-1 px-3 rounded-full text-xs font-bold">2024-25</span>
                    </div>
                    <div class="text-3xl font-extrabold text-white mb-1">PKR 144,500</div>
                    <div class="text-slate-300 text-sm">Monthly Net Income Computed</div>
                </div>
                <div class="bg-slate-900/80 backdrop-blur-md border border-slate-700 p-6 rounded-2xl shadow-2xl transform -translate-x-8 -rotate-2 hover:rotate-0 transition-all duration-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-action-500 font-bold text-sm tracking-widest uppercase">IT Exporter Yield</div>
                        <svg class="h-6 w-6 text-action-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="text-3xl font-extrabold text-white mb-1"><span class="text-slate-500 line-through text-lg mr-2">1.0%</span>0.25% FWT</div>
                    <div class="text-slate-400 text-sm">PSEB Register Verified Successfully</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-2xl transform translate-x-2 rotate-1 hover:rotate-0 transition-all duration-500 border-b-4 border-fbrgreen-500">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-slate-800 font-extrabold text-sm uppercase">Active Filer Status (ATL)</div>
                        <div class="h-3 w-3 rounded-full bg-fbrgreen-500 animate-pulse"></div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-4 mt-2"><div class="bg-fbrgreen-500 h-2 rounded-full" style="width:100%"></div></div>
                    <div class="text-slate-500 text-xs font-medium">IRIS Database Validated</div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($page->ad_top)
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-center overflow-hidden w-full">{!! $page->ad_top !!}</div>
</div>
@endif

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 overflow-x-hidden">
    <div id="all_tools" class="mb-20">
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-2">Our Financial Products</h2>
        <p class="text-slate-500 mb-10 font-medium max-w-2xl">Select a module to automatically estimate your wealth liabilities based on the 2025-26 slabs.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @if($page->all_tools)
                @foreach($page->all_tools as $tool)
                    @php $c = match($tool['color'] ?? 'green') { 'blue' => 'bg-blue-100', 'red' => 'bg-red-100', 'amber' => 'bg-amber-100', 'purple' => 'bg-purple-100', default => 'bg-green-100' }; @endphp
                    <a href="{{ $tool['link'] }}" class="app-card p-8 flex flex-col items-center text-center bg-white border border-gray-100 rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all">
                        <div class="{{ $c }} p-5 rounded-2xl mb-5 shadow-sm">
                            <img src="/storage/{{ $tool['icon'] }}" class="w-12 h-12 object-contain" alt="{{ $tool['title'] }}">
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $tool['title'] }}</h3>
                        <p class="text-sm text-slate-500 mb-6 leading-relaxed">{{ $tool['description'] }}</p>
                        <span class="text-action-500 font-bold mt-auto border-2 border-action-500 px-6 py-2 rounded-full text-sm hover:bg-action-500 hover:text-white transition-colors">Calculate &rarr;</span>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 py-12 mb-16 border-t border-gray-100">
        <div class="lg:col-span-3 w-full max-w-full overflow-hidden">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-8 pb-4 border-b border-gray-100">{{ $page->seo_heading }}</h2>
            <div class="prose prose-lg text-slate-600 max-w-full break-words prose-headings:text-slate-900 prose-headings:font-bold prose-a:text-action-600 prose-img:rounded-2xl overflow-x-hidden">
                @if($page->ad_middle)
                    <div class="mb-10 w-full flex justify-center overflow-hidden bg-gray-50 p-4 rounded-xl">{!! $page->ad_middle !!}</div>
                @endif
                <div class="w-full prose-p:leading-relaxed prose-li:my-2 prose-table:block prose-table:overflow-x-auto">{!! $page->seo_content !!}</div>
            </div>
        </div>
        @if($page->ad_sidebar)
        <div class="lg:col-span-1 w-full">
            <div class="sticky top-24">
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 shadow-sm text-center">
                    <div class="text-[10px] text-gray-400 font-black uppercase mb-4 tracking-widest">Advertisement</div>
                    <div class="flex justify-center overflow-hidden rounded-lg">{!! $page->ad_sidebar !!}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- FAQS --}}
    <div class="max-w-7xl mx-auto px-4 -mt-12 flex-grow w-full flex flex-col lg:flex-row gap-12 mb-16">
    <div class="lg:w-3/4">
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q1. Who is legally required to file income tax returns in Pakistan?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    As per the **Income Tax Ordinance 2001**, any individual whose annual income exceeds the basic exemption threshold of **Rs. 600,000** is legally mandated to file their tax returns. Failing to do so can lead to penalties and inclusion in the non-filer category.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q2. What are the primary benefits of appearing on the Active Taxpayer List (ATL)?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Being an **Active Filer** unlocks significant financial advantages, including up to **50% reduction** in withholding taxes on banking transactions, vehicle registration, and mobile usage. It also drastically lowers the Capital Gains Tax (CGT) on property investments.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q3. How does the calculator handle the latest FBR budget amendments?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Our **Pakistan Tax Calculator** is updated in accordance with the latest Finance Bill. It automatically applies the current progressive tax slabs and penalty rates for non-filers, ensuring your tax estimation is precise and legally compliant.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q4. What is the penalty for Non-Filers on property transactions?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Non-filers face a "fatal" tax regime where withholding taxes and Capital Gains Tax can be significantly higher—often reaching up to **45%** on profit margins. This is designed to encourage documentation of the economy through the FBR IRIS portal.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q5. How does becoming a filer improve financial credibility?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Filing returns establishes a documented financial trail, making it easier to participate in government tenders, secure corporate bank accounts, and apply for visas or international remittances without the heavy tax deductions faced by undocumented citizens.
                </div>
            </details>

        </div>
    </div>

    <div class="lg:w-1/4"></div>
</div>
{{-- FAQS end --}}
</main>


@endsection

@section('styles')
<style>
    .hero-bg { background-image: linear-gradient(rgba(15,23,42,.85),rgba(15,23,42,.95)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2070&q=80'); background-size:cover; background-position:center; }
    .app-card { transition: all .3s cubic-bezier(.4,0,.2,1); }
</style>
@endsection

@section('scripts')
<script>
    function toggleDd() {
        const open = !document.getElementById('dd-menu').classList.toggle('hidden');
        document.getElementById('dd-arrow').style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
    }
    document.addEventListener('click', e => {
        if (!document.getElementById('dd-wrap').contains(e.target)) {
            document.getElementById('dd-menu').classList.add('hidden');
            document.getElementById('dd-arrow').style.transform = 'rotate(0deg)';
        }
    });
</script>
@endsection
