@extends('layouts.app')

@section('title', ($page->meta_title ?? 'Capital Gain Tax (CGT) Calculator Pakistan 2025-26') . ' | PakTools')
@if($page->meta_description) @section('meta_description', $page->meta_description) @endif
@if($page->meta_keywords) @section('meta_keywords', $page->meta_keywords) @endif

@section('content')
<div class="w-full overflow-x-hidden bg-slate-50/50">
    <div class="max-w-7xl mx-auto px-4 py-4 md:py-8 flex flex-col lg:flex-row gap-6 md:gap-8">

        <main class="lg:w-3/4 w-full min-w-0 overflow-x-hidden">
            <h1 class="text-xl md:text-3xl font-extrabold text-slate-900 mb-2 leading-tight tracking-tight">
                {{ $page->h1_title }}
            </h1>
            <p class="text-slate-500 mb-6 md:mb-8 font-medium text-xs md:text-base leading-relaxed">
                {{ $page->sub_title }}
            </p>

            @if($page->ad_top)
                <div class="ad-slot ad-slot-leaderboard mb-6">
                    {!! $page->ad_top !!}
                </div>
            @endif

            <div class="app-card p-5 md:p-8 mb-8 border-t-8 border-fbrgreen-500 shadow-xl bg-white rounded-2xl">
                <div class="grid grid-cols-1 gap-5 md:gap-6">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs md:text-sm font-bold text-slate-700 mb-2">Purchase Price (PKR)</label>
                            <input type="text" id="purchase_input" class="w-full border-2 border-slate-100 rounded-xl p-3 md:p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none transition-colors" placeholder="e.g. 10,000,000" inputmode="numeric">
                        </div>
                        <div>
                            <label class="block text-xs md:text-sm font-bold text-slate-700 mb-2">Sale Price (PKR)</label>
                            <input type="text" id="sale_input" class="w-full border-2 border-slate-100 rounded-xl p-3 md:p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none transition-colors" placeholder="e.g. 15,000,000" inputmode="numeric">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs md:text-sm font-bold text-slate-700 mb-1">Total Capital Gain (PKR Profit)</label>
                        <p class="text-[10px] md:text-xs text-slate-400 mb-2">Selling Price minus Purchase Price & expenses</p>
                        <input type="text" id="gain_input" class="w-full border-2 border-slate-100 rounded-xl p-3 md:p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none transition-colors" placeholder="e.g. 1,000,000" inputmode="numeric">

                        <div class="mt-3 flex flex-wrap gap-1.5 md:gap-2 items-center">
                            <span class="text-[9px] font-black text-slate-400 mr-1 uppercase">Quick:</span>
                            <button type="button" onclick="setGain(500000)"   class="gainchip">5L</button>
                            <button type="button" onclick="setGain(1000000)"  class="gainchip">10L</button>
                            <button type="button" onclick="setGain(2500000)"  class="gainchip">25L</button>
                            <button type="button" onclick="setGain(5000000)"  class="gainchip">50L</button>
                            <button type="button" onclick="setGain(10000000)" class="gainchip">1C</button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs md:text-sm font-bold text-slate-700 mb-2">Seller Status</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <button type="button" id="btn_filer_yes" onclick="setFiler('filer')"
                                class="w-full py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm text-xs md:text-sm text-left sm:text-center">
                                 Active Filer (15%)
                            </button>
                            <button type="button" id="btn_filer_no" onclick="setFiler('non-filer')"
                                class="w-full py-3 px-4 rounded-xl font-bold border-2 border-slate-100 bg-white text-slate-400 hover:bg-slate-50 transition shadow-sm text-xs md:text-sm text-left sm:text-center">
                                 Non-Filer (45%)
                            </button>
                        </div>
                        <input type="hidden" id="filer_status" value="filer">
                        <p class="text-[9px] text-rose-500 mt-2 uppercase font-black tracking-wider leading-tight">Note: Non-filers pay 45% flat tax on gains.</p>
                    </div>

                    <div class="pt-2">
                        <button id="calculate_btn" class="bg-emerald-600 hover:bg-emerald-700 text-white py-4 text-sm md:text-lg w-full font-black rounded-xl transition shadow-lg uppercase tracking-widest">
                            Calculate CGT Liability
                        </button>
                    </div>
                </div>

                @if($page->ad_middle)
                    <div class="ad-slot ad-slot-leaderboard my-8">
                        {!! $page->ad_middle !!}
                    </div>
                @endif

                <div id="result_card" class="hidden animate-fade-in border-t border-slate-100 pt-8 mt-4">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 md:p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 mb-6">
                            <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight mb-1">Gross Gain</p>
                                <p id="res_gross_gain" class="text-base md:text-xl font-black text-slate-900">-</p>
                            </div>
                            <div class="p-4 bg-rose-50 rounded-xl border border-rose-100 shadow-sm">
                                <p class="text-[10px] font-bold text-rose-500 uppercase tracking-tight mb-1">CGT Amount</p>
                                <p id="res_tax_amount" class="text-base md:text-xl font-black text-rose-600">-</p>
                            </div>
                            <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-100 shadow-sm">
                                <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-tight mb-1">Net Profit</p>
                                <p id="res_net_gain" class="text-base md:text-xl font-black text-emerald-700">-</p>
                            </div>
                        </div>
                        <div id="tax_desc" class="text-[11px] md:text-xs font-bold text-slate-600 bg-white p-3 rounded-lg border border-slate-100 italic leading-relaxed"></div>
                    </div>
                </div>
            </div>

            @if($page->content)
            <article class="content-area py-4 md:py-8 mb-16 prose prose-slate prose-sm md:prose-base max-w-none text-slate-700">
                {!! $page->content !!}
            </article>
            @endif
            {{-- CAPITAL GAINS TAX FAQS --}}
<div class="max-w-7xl mx-auto px-4 -mt-12 flex-grow w-full mb-16">
    <div class="w-full">
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Capital Gains Tax Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q1. What exactly is "Capital Gain" in real estate?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Capital Gain is the <strong>pure profit margin</strong> you earn when selling a property at a higher price than what you originally paid. The FBR taxes only this appreciation (the profit), not the total sale amount or your initial investment.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q2. Why is there a 45% tax penalty for Non-Filers?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Under the 2024-25 Finance Bill, the government has imposed a massive <strong>45% penalty</strong> on Non-Filers to discourage the shadow economy. In contrast, Active Taxpayers (Filers) only pay <strong>15% tax</strong>, creating a 30% financial gap to incentivize documentation.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q3. If I sell a plot for 40 Million, do I pay tax on the whole 40 Million?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    No. Tax is calculated <strong>exclusively on the profit</strong>. For example, if you bought it for 30 Million and sold it for 40 Million, you only pay the 15% (or 45% penalty) on the <strong>10 Million gain</strong>. Your base capital of 30 Million remains untouched by this tax.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q4. Does the FBR use the market price or the DC rate for tax?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    The tax calculation is generally based on the <strong>FBR-notified values or DC (District Collector) rates</strong> applicable at the time of the transaction. It is crucial to use the official registered value to determine your legal taxable capital gain.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q5. Can I avoid the 45% penalty by filing my returns now?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Yes. To avoid the "fatal" 45% penalty, you must appear on the <strong>Active Taxpayer List (ATL)</strong> at the time of the property transaction. Being a Filer protects your documented liquidity and ensures you stay within the lower 15% tax bracket.
                </div>
            </details>

        </div>
    </div>
</div>
{{-- CAPITAL GAINS TAX FAQS END --}}
        </main>

        <aside class="lg:w-1/4 space-y-6 min-w-0">
            @if($page->ad_sidebar)
                <div class="ad-slot ad-slot-rectangle overflow-hidden rounded-xl">
                    {!! $page->ad_sidebar !!}
                </div>
            @endif

            @if($page->sidebar_tips)
            <div class="app-card p-5 border-t-4 border-emerald-500 shadow-lg bg-white rounded-2xl sticky top-6">
                <h3 class="font-black text-slate-900 text-sm md:text-base mb-4 uppercase tracking-tight">📈 CGT Fast Facts</h3>
                <ul class="space-y-4 text-xs md:text-sm text-slate-600">
                    @foreach($page->sidebar_tips as $fact)
                    <li class="flex gap-3 leading-relaxed">
                        @php
                            $colorClass = 'text-emerald-500';
                            if(isset($fact['color']) && $fact['color'] === 'red') $colorClass = 'text-rose-500';
                        @endphp
                        @if($fact['prefix'])
                            <span class="{{ $colorClass }} font-black shrink-0">{{ $fact['prefix'] }}</span>
                        @endif
                        <span class="font-medium">{{ $fact['text'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </aside>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Optimized Chips for Mobile */
.gainchip {
    background: #f8fafc; border: 1.5px solid #e2e8f0; color: #64748b;
    border-radius: 8px; padding: 4px 10px; font-size: 10px; font-weight: 800;
    cursor: pointer; transition: all 0.2s; text-transform: uppercase;
}
.gainchip:hover { background: #10b981; color: #fff; border-color: #10b981; transform: translateY(-1px); }

/* Main Article Mobile Typography Fix */
@media (max-width: 768px) {
    article h2 { font-size: 1.25rem !important; font-weight: 900 !important; margin-top: 2rem !important; color: #0f172a !important; line-height: 1.2 !important; }
    article h3 { font-size: 1.1rem !important; font-weight: 800 !important; margin-top: 1.5rem !important; }
    article p { font-size: 0.9rem !important; line-height: 1.6 !important; margin-bottom: 1rem !important; color: #475569 !important; text-align: left !important; }
    article ul li { font-size: 0.85rem !important; margin-bottom: 0.5rem !important; }
    .app-card { border-radius: 1.25rem !important; }
}
</style>
@endsection

@section('scripts')
<script>
function setGain(amount) {
    document.getElementById('gain_input').value = amount.toLocaleString('en-PK');
    document.querySelectorAll('.gainchip').forEach(c => c.classList.remove('active'));
    if (event && event.target) {
        event.target.classList.add('active');
    }
    document.getElementById('gain_input').focus();
}

function setFiler(val) {
    document.getElementById('filer_status').value = val;
    const activeF   = 'w-full py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm text-sm';
    const inactiveF = 'w-full py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm text-sm';
    document.getElementById('btn_filer_yes').className = val === 'filer' ? activeF : inactiveF;
    document.getElementById('btn_filer_no').className  = val === 'non-filer' ? activeF : inactiveF;
}

document.getElementById('gain_input').addEventListener('input', function () {
    var raw = this.value.replace(/[^0-9]/g, '');
    this.value = raw ? parseInt(raw, 10).toLocaleString('en-PK') : '';
    document.querySelectorAll('.gainchip').forEach(c => c.classList.remove('active'));
});

['purchase_input', 'sale_input'].forEach(id => {
    document.getElementById(id).addEventListener('input', function() {
        let raw = this.value.replace(/[^0-9]/g, '');
        if (raw) this.value = parseInt(raw).toLocaleString('en-PK');

        let p = parseInt(document.getElementById('purchase_input').value.replace(/[^0-9]/g, '')) || 0;
        let s = parseInt(document.getElementById('sale_input').value.replace(/[^0-9]/g, '')) || 0;
        if (s > p && p > 0) {
            document.getElementById('gain_input').value = (s - p).toLocaleString('en-PK');
        }
    });
});

window.cleanNumberInput = function(value) { return value.replace(/[^0-9.]/g, ''); };
window.formatCurrency = function(val) {
    return 'Rs. ' + parseFloat(val).toLocaleString('en-PK', { maximumFractionDigits: 0 });
};
</script>
<script src="{{ asset('js/capital-gain.js') }}"></script>
@endsection
