@extends('layouts.app')

@section('title', $page->meta_title ?? 'Freelancer IT Tax Calculator Pakistan 2025-26 | PakTools')
@section('meta_description', $page->meta_description ?? 'Calculate your exact FWT deduction — 0.25% with PSEB vs 1% without.')
@section('meta_keywords', $page->meta_keywords ?? 'freelancer tax, IT export tax, PSEB tax, FBR freelancer')

@section('schema')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "SoftwareApplication",
      "name": @json($page->h1_title ?? 'Freelancer Income Tax Calculator (PSEB) 2025-26'),
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "All",
      "offers": {
        "@@type": "Offer",
        "price": "0",
        "priceCurrency": "PKR"
      },
      "description": @json($page->meta_description ?? 'Calculate your exact FWT deduction — 0.25% with PSEB vs 1% without.')
    }
    </script>
@endsection

@section('content')
<div class="w-full overflow-x-hidden">
    <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">

    <!-- ── MAIN ─────────────────────────────────────────── -->
    <main class="lg:w-3/4 w-full min-w-0">
        <h1 class="text-3xl font-extrabold text-slate-900 mb-2">{!! $page->h1_title ?? 'Freelancer Income Tax Calculator (PSEB) 2025-26' !!}</h1>
        <p class="text-slate-500 mb-8 font-medium">{!! $page->sub_title ?? 'Calculate your exact FWT deduction — 0.25% with PSEB vs 1% without. Enter your monthly or yearly remittance below.' !!}</p>

        @if($page->ad_top)
            <div class="ad-slot ad-slot-leaderboard mb-8">
                {!! $page->ad_top !!}
            </div>
        @endif

        <div class="app-card p-6 md:p-8 mb-10 border-t-8 border-fbrgreen-500 shadow-2xl bg-white rounded-xl">
            <div class="grid grid-cols-1 gap-6">

                <!-- Remittance Period Toggle -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Remittance Period</label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="button" id="btn_type_monthly" onclick="setRevType('monthly')"
                            class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm">
                            📅 Monthly Average
                        </button>
                        <button type="button" id="btn_type_yearly" onclick="setRevType('yearly')"
                            class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm">
                            📆 Yearly Total
                        </button>
                    </div>
                    <input type="hidden" id="revenue_type" value="monthly">
                </div>

                <!-- Revenue Input -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Foreign Remittance Amount (PKR)</label>
                    <input type="text" id="revenue_input" class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none" placeholder="e.g. 500,000" inputmode="numeric">
                    <!-- Quick Amount Chips -->
                    <div class="mt-3">
                        <p class="text-xs text-slate-400 font-semibold mb-2 uppercase tracking-wide">Quick Select</p>
                        <div class="flex flex-wrap gap-2" id="amount_chips">
                            <button type="button" onclick="setAmount(100000)"  class="rev-chip">1 Lakh</button>
                            <button type="button" onclick="setAmount(200000)"  class="rev-chip">2 Lakh</button>
                            <button type="button" onclick="setAmount(500000)"  class="rev-chip">5 Lakh</button>
                            <button type="button" onclick="setAmount(1000000)" class="rev-chip">10 Lakh</button>
                            <button type="button" onclick="setAmount(2000000)" class="rev-chip">20 Lakh</button>
                            <button type="button" onclick="setAmount(5000000)" class="rev-chip">50 Lakh</button>
                        </div>
                    </div>
                </div>

                <!-- PSEB Toggle -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Are you PSEB Registered?</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button" id="btn_pseb_yes" onclick="setPseb('yes')"
                            class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-fbrgreen-50 text-fbrgreen-700 transition shadow-sm">
                            ✅ Yes, Registered (0.25% Tax)
                        </button>
                        <button type="button" id="btn_pseb_no" onclick="setPseb('no')"
                            class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm">
                            ❌ No, Not Registered (1.00% Tax)
                        </button>
                    </div>
                    <input type="hidden" id="pseb_status" value="yes">
                </div>

                <!-- Calculate -->
                <div>
                    <button id="calculate_btn" class="bg-action-500 hover:bg-action-600 text-white py-3.5 text-base w-full font-bold rounded-xl transition shadow-lg">Calculate Tax</button>
                </div>
            </div>

            @if($page->ad_middle)
                <div class="ad-slot ad-slot-leaderboard my-8">
                    {!! $page->ad_middle !!}
                </div>
            @endif

            <!-- Results -->
            <div id="result_section" class="hidden animate-fade-in border-t border-gray-100 pt-8 mt-4">
                <div id="result_table" class="w-full"></div>
            </div>
        </div>

    <!-- Comparison Table -->
    <div class="mt-8 bg-white rounded-2xl shadow-lg border-2 border-fbrgreen-500/10 overflow-hidden min-w-0">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                {{ $page->comparison_title ?? '📊 PSEB vs Non-PSEB Tax Comparison' }}
            </h2>
            <p class="text-sm text-slate-500 mt-1 font-medium">
                {{ $page->comparison_subtitle ?? 'Section 154A — Exports of IT Services | FBR Finance Act 2025' }}
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-fbrgreen-600 text-white text-sm">
                        <th class="px-6 py-4 font-bold">{{ $page->comparison_first_column_label ?? 'Monthly Remittance' }}</th>
                        <th class="px-6 py-4 font-bold text-center">
                            <div class="flex items-center justify-center gap-2">
                                <span class="w-4 h-4 bg-white/20 border border-white/40 rounded flex items-center justify-center text-[10px] font-black">✓</span>
                                {{ $page->pseb_rate_label ?? 'PSEB (0.25%)' }}
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold text-center">
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-red-200 text-xl font-light leading-none">✕</span>
                                {{ $page->non_pseb_rate_label ?? 'No PSEB (1.00%)' }}
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold text-right pr-8">You Save</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @php
                        $amounts = $page->comparison_amounts ?? [
                            ['amount' => 50000],
                            ['amount' => 100000],
                            ['amount' => 200000],
                            ['amount' => 500000],
                            ['amount' => 1000000],
                            ['amount' => 2000000],
                        ];
                        $pseb_rate = $page->pseb_rate_value ?? 0.0025;
                        $non_pseb_rate = $page->non_pseb_rate_value ?? 0.01;
                    @endphp
                    @foreach($amounts as $item)
                    @php
                        $amt = $item['amount'] ?? 0;
                        $pseb_tax = $amt * $pseb_rate;
                        $non_pseb_tax = $amt * $non_pseb_rate;
                        $savings = $non_pseb_tax - $pseb_tax;
                    @endphp
                    <tr class="hover:bg-fbrgreen-50/30 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-800">Rs. {{ number_format($amt) }}</td>
                        <td class="px-6 py-4 text-center text-fbrgreen-700 font-bold">Rs. {{ number_format($pseb_tax) }}</td>
                        <td class="px-6 py-4 text-center text-red-500 font-bold">Rs. {{ number_format($non_pseb_tax) }}</td>
                        <td class="px-6 py-4 text-right font-extrabold text-slate-900 pr-8">
                            Rs. {{ number_format($savings) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        <article class="py-12 mb-16 prose prose-lg prose-green max-w-none text-slate-700 break-words overflow-x-hidden">
            {!! $page->content !!}
        </article>

@if($page->faqs && is_array($page->faqs) && count($page->faqs) > 0)
    <div class="max-w-4xl mx-auto px-4 pb-20 w-full">

        {{-- Section heading with emerald underline accent --}}
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Frequently Asked Questions
        </h2>

        {{-- FAQ accordion list with fixed width --}}
        <div class="space-y-6 w-full">
            @foreach($page->faqs as $faq)
                <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                    <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
                        <span>{!! $faq['question'] !!}</span>

                        {{-- Icon that rotates 45 deg to look like 'x' when open --}}
                        <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">
                            +
                        </span>
                    </summary>

                    {{-- Answer section with top border --}}
                    <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
            @endforeach
        </div>
    </div>
@endif
    </main>

    <!-- ── SIDEBAR ───────────────────────────────────────── -->
    <aside class="lg:w-1/4 mt-8 lg:mt-0 space-y-6">

        @if($page->ad_sidebar)
            <div class="ad-slot ad-slot-rectangle">
                {!! $page->ad_sidebar !!}
            </div>
        @endif

        <!-- PSEB Quick Facts -->
        @if($page->pseb_facts && is_array($page->pseb_facts))
        <div class="app-card p-5 border-t-4 border-fbrgreen-500 shadow-lg bg-white rounded-xl">
            <h3 class="font-extrabold text-slate-900 text-base mb-4">💡 PSEB Quick Facts</h3>
            <ul class="space-y-3 text-sm text-slate-600 rich-content">
                @foreach($page->pseb_facts as $fact)
                <li class="flex gap-2">
                    <span class="text-fbrgreen-500 font-bold shrink-0">✓</span>
                    <span>{!! $fact['text'] !!}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Accepted Payment Methods -->
        @if($page->fbr_gateways && is_array($page->fbr_gateways))
        <div class="app-card p-5 border-t-4 border-blue-400 shadow-lg bg-white rounded-xl">
            <h3 class="font-extrabold text-slate-900 text-base mb-4">💳 FBR-Accepted Gateways</h3>
            <ul class="space-y-2 text-sm text-slate-600 font-medium rich-content">
                @foreach($page->fbr_gateways as $gateway)
                <li class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full {{ ($gateway['is_covered'] ?? true) ? 'bg-green-400' : 'bg-red-400' }} inline-block"></span>
                    <span>{!! $gateway['name'] !!}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($calculatorsMenu)
        <!-- More Calculators -->
        <div class="app-card p-5 border-t-4 border-orange-400 shadow-lg bg-white rounded-xl">
            <h3 class="font-extrabold text-slate-900 text-base mb-4">More Estimators</h3>
            <ul class="space-y-4 font-semibold text-sm">
                @foreach($calculatorsMenu->subMenus as $subMenu)
                    <li><a href="{{ $subMenu->url }}" class="flex text-fbrgreen-600 hover:text-action-500 transition-colors">{{ $subMenu->title }} <span class="ml-auto opacity-50">&rarr;</span></a></li>
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
.rev-chip {
    background: #f0fdf4; border: 1.5px solid #bbf7d0; color: #15803d;
    border-radius: 8px; padding: 5px 14px; font-size: 13px; font-weight: 700;
    cursor: pointer; transition: all 0.15s ease;
}
.rev-chip:hover { background: #16a34a; color: #fff; border-color: #16a34a; transform: translateY(-1px); }
.rev-chip.active-chip { background: #16a34a; color: #fff; border-color: #16a34a; }
</style>
@endsection

@section('scripts')
<script>
function setRevType(val) {
    document.getElementById('revenue_type').value = val;
    const active   = 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm';
    const inactive = 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm';
    document.getElementById('btn_type_monthly').className = val === 'monthly' ? active : inactive;
    document.getElementById('btn_type_yearly').className  = val === 'yearly'  ? active : inactive;
}
function setPseb(val) {
    document.getElementById('pseb_status').value = val;
    const activeG  = 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-fbrgreen-50 text-fbrgreen-700 transition shadow-sm';
    const inactiveG= 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm';
    document.getElementById('btn_pseb_yes').className = val === 'yes' ? activeG : inactiveG;
    document.getElementById('btn_pseb_no').className  = val === 'no'  ? activeG : inactiveG;
}
function setAmount(amount) {
    document.getElementById('revenue_input').value = amount.toLocaleString('en-PK');
    document.querySelectorAll('.rev-chip').forEach(c => c.classList.remove('active-chip'));
    if (event && event.target) {
        event.target.classList.add('active-chip');
    }
    document.getElementById('revenue_input').focus();
}
document.getElementById('revenue_input').addEventListener('input', function () {
    let raw = this.value.replace(/[^0-9]/g, '');
    if (raw) this.value = parseInt(raw).toLocaleString('en-PK');
    document.querySelectorAll('.rev-chip').forEach(c => c.classList.remove('active-chip'));
});
window.cleanNumberInput = function(value) { return value.replace(/[^0-9.]/g, ''); };
window.formatCurrency = function(val) {
    return 'Rs. ' + parseFloat(val).toLocaleString('en-PK', { maximumFractionDigits: 0 });
};
</script>
<script src="{{ asset('js/freelancer.js') }}"></script>
@endsection
