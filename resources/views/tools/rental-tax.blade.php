@extends('layouts.app')

@section('title', ($page->meta_title ?? 'Rental Income Tax Calculator Pakistan (2025-26)') . ' | PakTools')
@if($page->meta_description) @section('meta_description', $page->meta_description) @endif
@if($page->meta_keywords) @section('meta_keywords', $page->meta_keywords) @endif

@section('content')
<div class="w-full overflow-x-hidden bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 py-6 md:py-10 flex flex-col lg:flex-row gap-8">

    <main class="lg:w-3/4 w-full min-w-0 flex-1">
        <div class="mb-8">
            <h1 class="text-2xl md:text-4xl font-black text-slate-900 leading-tight mb-3 break-words">
                {{ $page->h1_title }}
            </h1>
            <p class="text-sm md:text-base text-slate-500 font-medium leading-relaxed">
                {{ $page->sub_title }}
            </p>
        </div>

        @if($page->ad_top)
            <div class="ad-slot overflow-hidden mb-8 flex justify-center">
                {!! $page->ad_top !!}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl border-t-8 border-fbrgreen-600 p-5 md:p-10 mb-10">
            <div class="grid grid-cols-1 gap-8">
                <div>
                    <label class="block text-sm md:text-base font-bold text-slate-800 mb-2 uppercase tracking-wide">
                        Total Gross Annual Rent (PKR)
                    </label>
                    <p class="text-xs text-slate-400 mb-4 leading-normal">
                        Include all rent received. Do not subtract repair allowances manually here.
                    </p>
                    <input type="text" id="rental_input"
                           class="w-full border-2 border-slate-200 rounded-xl p-4 md:p-5 text-xl font-black text-slate-900 focus:border-fbrgreen-500 focus:ring-4 focus:ring-fbrgreen-500/10 transition-all outline-none"
                           placeholder="e.g. 1,000,000" inputmode="numeric">

                    <div class="mt-5 flex flex-wrap gap-2 md:gap-3">
                        @foreach([300000 => '3 Lakh', 600000 => '6 Lakh (Free)', 1000000 => '10 Lakh', 2500000 => '25 Lakh'] as $val => $label)
                            <button type="button" onclick="setRental({{ $val }})"
                                    class="px-4 py-2 bg-slate-100 hover:bg-fbrgreen-600 hover:text-white text-slate-700 text-xs md:text-sm font-bold rounded-lg transition-all border border-slate-200">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <button id="calculate_btn"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white py-4 md:py-5 text-lg w-full font-black rounded-2xl transition-all shadow-lg hover:shadow-emerald-500/20 active:scale-[0.98]">
                    CALCULATE PROPERTY TAX
                </button>
            </div>

            <div id="result_card" class="hidden animate-fade-in border-t-2 border-dashed border-slate-100 pt-10 mt-8">
                <div class="bg-slate-50 rounded-2xl p-4 md:p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="p-4 bg-white rounded-xl shadow-sm border border-slate-100">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Gross Rent</p>
                            <p id="res_gross_rental" class="text-lg md:text-xl font-black text-slate-900">-</p>
                        </div>
                        <div class="p-4 bg-red-50 rounded-xl shadow-sm border border-red-100">
                            <p class="text-[10px] font-black text-red-400 uppercase tracking-widest mb-1">Yearly Tax</p>
                            <p id="res_yearly_tax" class="text-lg md:text-xl font-black text-red-600">-</p>
                        </div>
                        <div class="p-4 bg-emerald-50 rounded-xl shadow-sm border border-emerald-100">
                            <p class="text-[10px] font-black text-emerald-500 uppercase tracking-widest mb-1">Net Income</p>
                            <p id="res_take_home" class="text-lg md:text-xl font-black text-emerald-700">-</p>
                        </div>
                    </div>
                    <div id="tax_desc" class="text-xs font-bold text-slate-500 bg-white/50 p-4 rounded-xl border border-slate-100 italic leading-relaxed"></div>
                </div>
            </div>
        </div>

        @if($page->content)
       <article class="w-full max-w-none text-slate-700 overflow-x-hidden">
    <div class="bg-white rounded-2xl p-4 md:p-10 border border-slate-100 shadow-sm overflow-x-hidden">
        <h2 class="mt-10 text-2xl md:text-4xl font-black text-slate-900 mb-8 leading-tight px-2">
            Understanding Property Tax in Pakistan
        </h2>

        <div class="filament-injected-content w-full -mt-10">
            {!! $page->content !!}
        </div>
    </div>
</article><br><br>
{{-- RENTAL INCOME TAX FAQS --}}
<div class="max-w-7xl mx-auto px-4 -mt-30 flex-grow w-full mb-16">
    <div class="w-full">
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Rental Income Tax Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q1. Is rental income taxed the same as my monthly salary?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    No. Rental income utilizes <strong>distinct progressive formulas</strong> specifically designated under the Property Tax head in the Federal Budget. It must be declared separately on the <strong>IRIS platform</strong> rather than being clubbed directly with your salary slabs.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q2. Why is my monthly rent check lower when leasing to a corporation?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Corporate tenants are <strong>designated withholding agents</strong>. They are legally mandated to deduct a tax chunk upfront and deposit it into the FBR database against your <strong>NTN/CNIC</strong>. This acts as an advance tax payment, reducing your out-of-pocket liability at year-end.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q3. How do I pay tax if I rent my house to a private family?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Unlike corporate leases, private families are not tax agents and do not withhold tax. In this "Standard Residential" scenario, the <strong>entire burden</strong> of calculating, declaring, and paying the annual tax on the gross rental yield relies solely on the landlord.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q4. What happens if I fail to declare my rental income?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Failure to declare traceable rental income (especially via bank transfers) can trigger <strong>discrepancy flags</strong> in the IRIS portal. This can lead to retrospective audits where the FBR can investigate your financial records spanning back <strong>five fiscal years</strong>.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q5. Can I deduct expenses from my rental income?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Under the IRIS self-declaration model, you can often claim specific <strong>statutory allowances</strong> (like repair and maintenance) against your gross rent to arrive at the taxable "Income from Property." This helps in lowering your final tax payable.
                </div>
            </details>

        </div>
    </div>
</div>
{{-- RENTAL INCOME TAX FAQS END --}}
        @endif
    </main>

    <aside class="lg:w-1/4 w-full space-y-6">
        @if($page->ad_sidebar)
            <div class="ad-slot overflow-hidden flex justify-center">
                {!! $page->ad_sidebar !!}
            </div>
        @endif

        @if($page->sidebar_tips)
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <h3 class="font-black text-slate-900 text-lg mb-5 flex items-center gap-2">
                <span class="w-2 h-6 bg-fbrgreen-600 rounded-full"></span>
                Tax Tips
            </h3>
            <ul class="space-y-4">
                @foreach($page->sidebar_tips as $tip)
                <li class="flex items-start gap-3 text-sm text-slate-600 leading-snug">
                    <span class="text-emerald-500 mt-1 font-bold">●</span>
                    <span>{{ $tip['text'] }}</span>
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
.rentchip {
    background: #fffbeb; border: 1.5px solid #fde68a; color: #92400e;
    border-radius: 8px; padding: 4px 12px; font-size: 12px; font-weight: 700;
    cursor: pointer; transition: all 0.15s;
}
.rentchip:hover { background: #fbbf24; color: #fff; border-color: #fbbf24; transform: translateY(-1px); }
.rentchip.active { background: #fbbf24; color: #fff; border-color: #fbbf24; }
</style>
@endsection

@section('scripts')
<script>
function setRental(amount) {
    document.getElementById('rental_input').value = amount.toLocaleString('en-PK');
    document.querySelectorAll('.rentchip').forEach(c => c.classList.remove('active'));
    if (event && event.target) {
        event.target.classList.add('active');
    }
    document.getElementById('rental_input').focus();
}

document.getElementById('rental_input').addEventListener('input', function () {
    var raw = this.value.replace(/[^0-9]/g, '');
    this.value = raw ? parseInt(raw, 10).toLocaleString('en-PK') : '';
    document.querySelectorAll('.rentchip').forEach(c => c.classList.remove('active'));
});

window.cleanNumberInput = function(value) { return value.replace(/[^0-9.]/g, ''); };
window.formatCurrency = function(val) {
    return 'Rs. ' + parseFloat(val).toLocaleString('en-PK', { maximumFractionDigits: 0 });
};
</script>
<script src="{{ asset('js/rental.js') }}"></script>
@endsection
