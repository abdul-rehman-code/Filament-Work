@extends('layouts.app')

@section('title', 'YouTube Income Tax Calculator Pakistan 2025-26 | PakTools')

@section('content')
<div class="w-full overflow-x-hidden">
    <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">

    <!-- ── MAIN ─────────────────────────────────────────────── -->
    <main class="lg:w-3/4 w-full min-w-0 overflow-x-hidden">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-2 leading-tight">YouTube Income Tax Calculator Pakistan (2025-26)</h1>
        <p class="text-slate-500 mb-8 font-medium text-sm md:text-base">{!! $page->sub_title ?? 'Calculate 1% FWT on your Google AdSense USD earnings + standard FBR slab tax on local PKR sponsorships.' !!}</p>

        @if($page->ad_top)
            <div class="ad-slot ad-slot-leaderboard mb-8">
                {!! $page->ad_top !!}
            </div>
        @endif

        <div class="app-card p-4 md:p-8 mb-8 border-t-8 border-fbrgreen-500 shadow-2xl bg-white rounded-xl">

            <!-- ── MODE TOGGLE ── -->
            <div class="mb-6">
                <p class="text-sm font-bold text-slate-700 mb-3">Are you a resident or non-resident YouTuber?</p>
                <div class="flex gap-3 flex-wrap">
                    <label class="mode-pill">
                        <input type="radio" name="tax_mode" value="resident" checked class="sr-only">
                        <span class="mode-pill-label">🇵🇰 Resident (Pakistan-based)</span>
                    </label>
                    <label class="mode-pill">
                        <input type="radio" name="tax_mode" value="nonresident" class="sr-only">
                        <span class="mode-pill-label">✈️ Non-Resident (Abroad, Pak audience)</span>
                    </label>
                </div>
                <p class="text-xs text-slate-400 mt-2">Resident = you live in Pakistan. Non-resident = you live abroad but your content is watched in Pakistan.</p>
            </div>

            <div class="grid grid-cols-1 gap-6">

                <!-- ════ Resident Inputs ════ -->
                <div id="resident_section">
                    <!-- AdSense USD -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-1">AdSense Earnings (USD / Month)</label>
                        <p class="text-xs text-slate-400 mb-2">Your monthly Google/YouTube payment received via bank wire transfer</p>
                        <input type="text" id="adsense_input" class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none" placeholder="e.g. 500" inputmode="numeric">
                        <div class="mt-2 flex flex-wrap gap-2" id="usd_chips">
                            <button type="button" onclick="setChip('adsense_input', 100,  'usd_chips')" class="ytchip">$100</button>
                            <button type="button" onclick="setChip('adsense_input', 300,  'usd_chips')" class="ytchip">$300</button>
                            <button type="button" onclick="setChip('adsense_input', 500,  'usd_chips')" class="ytchip">$500</button>
                            <button type="button" onclick="setChip('adsense_input', 1000, 'usd_chips')" class="ytchip">$1,000</button>
                            <button type="button" onclick="setChip('adsense_input', 2000, 'usd_chips')" class="ytchip">$2,000</button>
                            <button type="button" onclick="setChip('adsense_input', 5000, 'usd_chips')" class="ytchip">$5,000</button>
                        </div>
                    </div>

                    <!-- Exchange Rate -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-1">USD → PKR Exchange Rate</label>
                        <p class="text-xs text-slate-400 mb-2">Current open-market rate (update as needed)</p>
                        <input type="text" id="exchange_rate" value="280" class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none">
                    </div>

                    <!-- Local Sponsorships -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Local Brand Sponsorships (PKR / Month) <span class="text-slate-400 font-normal">(optional)</span></label>
                        <p class="text-xs text-slate-400 mb-2">Paid via local IBFT, JazzCash, EasyPaisa — taxed under standard FBR income slabs</p>
                        <input type="text" id="sponsor_input" class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none" placeholder="e.g. 150,000 (0 if none)" inputmode="numeric">
                        <div class="mt-2 flex flex-wrap gap-2" id="pkr_chips">
                            <button type="button" onclick="setChip('sponsor_input', 0,      'pkr_chips')" class="ytchip">None</button>
                            <button type="button" onclick="setChip('sponsor_input', 50000,  'pkr_chips')" class="ytchip">50k</button>
                            <button type="button" onclick="setChip('sponsor_input', 100000, 'pkr_chips')" class="ytchip">1 Lakh</button>
                            <button type="button" onclick="setChip('sponsor_input', 200000, 'pkr_chips')" class="ytchip">2 Lakh</button>
                            <button type="button" onclick="setChip('sponsor_input', 500000, 'pkr_chips')" class="ytchip">5 Lakh</button>
                        </div>
                    </div>
                </div>

                <!-- ════ Non-Resident Inputs ════ -->
                <div id="nonresident_section" style="display:none;">
                    <div class="p-4 mb-4 rounded-xl bg-orange-50 border border-orange-200 text-sm text-orange-800">
                        <strong>Proposed FBR Rule (S.R.O. 546(I)/2026):</strong> FBR estimates your Pakistan-source income at
                        <strong>Rs 195 per 1,000 views</strong>. After a 30% expense deduction, the remaining 70% is taxed
                        at standard FBR slabs. These rules are still in draft — consult a tax advisor.
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Monthly Views from Pakistan</label>
                        <p class="text-xs text-slate-400 mb-2">Check YouTube Studio → Analytics → Geography → Pakistan</p>
                        <input type="text" id="views_input" class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-red-500 outline-none" placeholder="e.g. 500,000" inputmode="numeric">
                        <div class="mt-2 flex flex-wrap gap-2" id="views_chips">
                            <button type="button" onclick="setChip('views_input', 50000,   'views_chips')" class="ytchip">50K</button>
                            <button type="button" onclick="setChip('views_input', 100000,  'views_chips')" class="ytchip">1 Lakh</button>
                            <button type="button" onclick="setChip('views_input', 500000,  'views_chips')" class="ytchip">5 Lakh</button>
                            <button type="button" onclick="setChip('views_input', 1000000, 'views_chips')" class="ytchip">10 Lakh</button>
                            <button type="button" onclick="setChip('views_input', 5000000, 'views_chips')" class="ytchip">50 Lakh</button>
                        </div>
                    </div>
                </div>

                <!-- Calculate Button -->
                <div>
                    <button id="calculate_btn" class="bg-action-500 hover:bg-action-600 text-white py-3.5 text-base w-full font-bold rounded-xl transition shadow-lg">▶ Calculate YouTube Tax</button>
                </div>
            </div>

            @if($page->ad_middle)
                <div class="ad-slot ad-slot-leaderboard my-8">
                    {!! $page->ad_middle !!}
                </div>
            @endif

            <!-- Result area -->
            <div id="result_section" style="display:none;" class="border-t border-gray-100 pt-8 mt-4">
                <div id="result_table" class="w-full overflow-x-auto"></div>
            </div>
        </div>

        <!-- Tax Reference Table -->
        @if($page->tax_reference_table)
        <div class="app-card p-4 md:p-6 mb-8 border-t-4 border-fbrgreen-500 shadow-lg bg-white rounded-xl overflow-x-hidden">
            <h2 class="text-base md:text-lg font-extrabold text-slate-900 mb-1">📊 How YouTube Income is Taxed in Pakistan</h2>
            <p class="text-xs text-slate-500 mb-4">Two separate income streams — two separate tax rules</p>
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-fbrgreen-500 text-white">
                            <th class="px-3 md:px-4 py-3 text-left font-bold text-xs md:text-sm">Income Type</th>
                            <th class="px-3 md:px-4 py-3 text-left font-bold text-xs md:text-sm">Source</th>
                            <th class="px-3 md:px-4 py-3 text-left font-bold text-xs md:text-sm">Tax Rule</th>
                            <th class="px-3 md:px-4 py-3 text-center font-bold text-xs md:text-sm">Rate</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($page->tax_reference_table as $row)
                        @php
                            $badgeClass = match($row['rate_color'] ?? 'blue') {
                                'orange' => 'bg-orange-100 text-orange-700',
                                'red' => 'bg-red-100 text-red-700',
                                default => 'bg-blue-100 text-blue-700',
                            };
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 md:px-4 py-3 font-bold text-slate-700 text-xs md:text-sm">{{ $row['income_type'] }}</td>
                            <td class="px-3 md:px-4 py-3 text-slate-500 text-xs md:text-sm">{{ $row['source'] }}</td>
                            <td class="px-3 md:px-4 py-3 text-xs md:text-sm">{{ $row['tax_rule'] }}</td>
                            <td class="px-3 md:px-4 py-3 text-center"><span class="{{ $badgeClass }} px-2 py-0.5 rounded-full font-bold text-xs">{{ $row['rate_label'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if($page->content)
        <article class="py-8 mb-16 prose prose-base prose-green max-w-none text-slate-700 rich-content break-words overflow-x-hidden
            [&_h2]:text-xl [&_h2]:md:text-2xl [&_h2]:font-extrabold [&_h2]:mt-6 [&_h2]:mb-3 [&_h2]:leading-tight
            [&_h3]:text-lg [&_h3]:md:text-xl [&_h3]:font-bold [&_h3]:mt-5 [&_h3]:mb-2 [&_h3]:leading-snug
            [&_h4]:text-base [&_h4]:font-bold [&_h4]:mt-4 [&_h4]:mb-2
            [&_p]:text-sm [&_p]:md:text-base [&_p]:leading-relaxed
            [&_ul]:text-sm [&_ul]:md:text-base [&_li]:leading-relaxed">
            {!! $page->content !!}
        </article>
        @else
        <article class="py-8 mb-16 prose prose-base prose-green max-w-none text-slate-700 break-words overflow-x-hidden
            [&_h2]:text-xl [&_h2]:md:text-2xl [&_h2]:font-extrabold [&_h2]:mt-6 [&_h2]:mb-3 [&_h2]:leading-tight
            [&_h3]:text-lg [&_h3]:md:text-xl [&_h3]:font-bold [&_h3]:mt-5 [&_h3]:mb-2 [&_h3]:leading-snug
            [&_p]:text-sm [&_p]:md:text-base
            [&_ul]:text-sm [&_ul]:md:text-base">
            <h2 class="text-xl md:text-3xl font-extrabold text-slate-900 mb-4 pb-4 border-b border-gray-100 leading-tight">YouTube Tax Guide for Pakistan (2025-26)</h2>
            <div class="prose prose-base text-slate-600 max-w-none text-justify">
                <p>Monetizing a YouTube channel in Pakistan subjects you to a dual-tax framework because your income flows from two completely different sources with different FBR treatments. Understanding this division is critical to staying compliant without overpaying.</p>

                <h3>Google AdSense (Foreign USD Wire) — 1% Final Tax</h3>
                <p>When Google wires your monthly AdSense earnings to your Pakistani bank account via SWIFT, the bank automatically withholds <strong>1% Final Withholding Tax (FWT)</strong> under Section 154A of the Income Tax Ordinance. This 1% is your <strong>absolute final tax liability</strong> on this income — you do not need to pay any additional slab-based tax on it during annual filing. Always request a <strong>Proceed Realization Certificate (PRC)</strong> from your bank to legally classify this as foreign IT export income.</p>

                <div class="ad-slot ad-slot-responsive my-8 bg-slate-50 border-gray-200 text-center py-4 text-xs font-mono text-gray-400">[Google AdSense Article Inject]</div>

                <h3>Local Brand Sponsorships (PKR) — Standard Income Slabs</h3>
                <p>When a Pakistani brand pays you directly via IBFT, JazzCash, EasyPaisa, or cross-cheque for a promotional integration, this is classified as <strong>domestic business income</strong> under the standard progressive FBR tax slabs. If your total local PKR earnings exceed Rs. 600,000/year, you must compute and file the applicable slab tax at the 2025-26 rates (1% on 6L–12L tier, 11% on the 12L–22L tier, etc.).</p>

                <h3>Non-Resident Pakistanis — Views-Based Model</h3>
                <p>Under proposed FBR rules (S.R.O. 546(I)/2026), non-resident Pakistanis whose content is watched in Pakistan will have their Pakistan-source income estimated at <strong>Rs 195 per 1,000 views</strong>. From this, 30% is allowed as an expense deduction, and the remaining 70% is taxed under the standard FBR slab rates. These rules are in draft form — consult a certified tax advisor for official guidance.</p>

                <h3>Why You Must Keep These Streams Separate</h3>
                <p>The most dangerous mistake Pakistani YouTubers make is depositing foreign AdSense payments and local sponsorship payments into the same bank account without maintaining separate records. Failure to present a valid PRC can cause the FBR IRIS system to treat your entire foreign income as unexplained, undocumented local revenue — triggering the full progressive slab tax (up to 35%) on money that should have only attracted 1% FWT.</p>
            </div>
        </article>
        @endif

{{-- YOUTUBE TAX FAQS --}}
<div class="max-w-7xl mx-auto px-4 -mt-12 flex-grow w-full mb-16">
    <div class="w-full">
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            YouTuber Tax Frequently Asked Questions
        </h2>

        <div class="space-y-6">

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q1. What is the tax rate on Google AdSense earnings in Pakistan?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Foreign AdSense earnings received via bank wire (USD) are subject to a <strong>1% Final Withholding Tax (FWT)</strong> under Section 154A. This is a final tax, meaning you don't have to pay additional slab-based tax on this specific income.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q2. Why is a Proceed Realization Certificate (PRC) essential for YouTubers?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    A <strong>PRC</strong> is the legal proof that your income is a foreign IT export. Without it, the FBR may treat your foreign earnings as unexplained local revenue and tax it at much higher slab rates (up to 35%) instead of the 1% concessionary rate.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                    Q3. Are local sponsorships taxed differently than AdSense?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Yes. Local sponsorships and brand deals received in PKR are treated as normal business income and are taxed according to the <strong>standard FBR income tax slabs</strong> (after deducting allowable business expenses).
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q4. How does the "Views-Based Model" work for Non-Resident Pakistanis?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    Under draft rules for 2026, Pakistan-source income for non-residents is estimated at <strong>Rs 195 per 1,000 views</strong>. After a 30% expense allowance, the remaining 70% is taxed under standard slabs. Note: These rules are still in draft form.
                </div>
            </details>

            <details class="bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200 w-full">
                <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none">
                   Q5. Can I receive AdSense and local payments in the same bank account?
                    <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300">+</span>
                </summary>
                <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4">
                    While you can, it is highly recommended to maintain <strong>separate records</strong>. Mixing foreign AdSense (1% tax) with local PKR payments (slab tax) without clear documentation can trigger FBR audits and lead to incorrect tax assessments.
                </div>
            </details>

        </div>
    </div>
</div>
{{-- YOUTUBE TAX FAQS END --}}
    </main>

    <!-- ── SIDEBAR ───────────────────────────────────────────── -->
    <aside class="lg:w-1/4 mt-8 lg:mt-0 space-y-6 min-w-0">

        @if($page->ad_sidebar)
            <div class="ad-slot ad-slot-rectangle">
                {!! $page->ad_sidebar !!}
            </div>
        @endif

        <!-- Key Facts -->
        @if($page->key_tax_rules)
        <div class="app-card p-5 border-t-4 border-fbrgreen-500 shadow-lg bg-white rounded-xl">
            <h3 class="font-extrabold text-slate-900 text-base mb-4">📋 Key Tax Rules</h3>
            <ul class="space-y-3 text-sm text-slate-600">
                @foreach($page->key_tax_rules as $rule)
                <li class="flex gap-2">
                    @if(!empty($rule['prefix']))
                        <span class="text-fbrgreen-500 font-bold shrink-0">{{ $rule['prefix'] }}</span>
                    @endif
                    <span>{{ $rule['text'] }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- FBR Slab Reference (2025-26) -->
        <div class="app-card p-5 border-t-4 border-orange-400 shadow-lg bg-white rounded-xl">
            <h3 class="font-extrabold text-slate-900 text-base mb-3">📈 Local Income Slabs 2025-26</h3>
            <div class="space-y-2 text-xs font-medium text-slate-600">
                @foreach($slabs as $slab)
                @php
                    $percentage = 0;
                    if (preg_match('/(\d+)%/', $slab->fixed_tax, $matches)) {
                        $percentage = (int)$matches[1];
                    }

                    $colorClass = 'text-fbrgreen-600';
                    if($percentage > 0) $colorClass = 'text-blue-600';
                    if($percentage > 10) $colorClass = 'text-yellow-600';
                    if($percentage > 20) $colorClass = 'text-orange-600';
                    if($percentage > 25) $colorClass = 'text-red-600';
                    if($percentage > 30) $colorClass = 'text-red-700';

                    $rangeLabel = "Up to Rs. " . number_format($slab->max_income);
                    if($slab->min_income > 0 && $slab->max_income < 99999999) {
                        $rangeLabel = number_format($slab->min_income/1000, 0) . 'k – ' . number_format($slab->max_income/1000000, 1) . 'M/yr';
                    } elseif ($slab->max_income >= 99999999) {
                        $rangeLabel = "Above " . number_format($slab->min_income/1000000, 1) . "M/yr";
                    }
                @endphp
                <div class="flex justify-between">
                    <span>{{ $rangeLabel }}</span>
                    <span class="font-bold {{ $colorClass }}">{{ $percentage }}%</span>
                </div>
                @endforeach
            </div>
            <a href="{{ route('slabs') }}" class="block mt-3 text-xs text-fbrgreen-600 font-bold hover:underline">View full slabs table →</a>
        </div>

        @if($calculatorsMenu)
        <!-- More Calculators -->
        <div class="app-card p-5 border-t-4 border-blue-400 shadow-lg bg-white rounded-xl">
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
    .ytchip {
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        color: #15803d;
        border-radius: 8px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s;
    }
    .ytchip:hover,
    .ytchip.active {
        background: #16a34a;
        color: #fff;
        border-color: #16a34a;
    }

    /* Mode pill toggle */
    .mode-pill input[type="radio"]:checked + .mode-pill-label {
        background: #16a34a;
        color: #fff;
        border-color: #16a34a;
    }
    .mode-pill-label {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 9999px;
        border: 2px solid #bbf7d0;
        background: #f0fdf4;
        color: #15803d;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s;
    }
    .mode-pill-label:hover {
        border-color: #16a34a;
    }

    /*  Mobile heading fix for dynamic content with inline styles */
    @media (max-width: 768px) {
        article h1, article h2, article h3, article h4 {
            font-size: clamp(16px, 4.5vw, 22px) !important;
            margin-top: 14px !important;
            margin-bottom: 8px !important;
            line-height: 1.35 !important;
            font-weight: 800 !important;
        }
        article hr {
            margin: 14px 0 !important;
        }
        article p, article li {
            font-size: 14px !important;
            line-height: 1.7 !important;
        }
        /* Table mobile fix */
        table {
            font-size: 12px !important;
        }
        table th, table td {
            padding: 8px 6px !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Radio toggle logic
    document.querySelectorAll('input[name="tax_mode"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const resSection = document.getElementById('resident_section');
            const nonSection = document.getElementById('nonresident_section');
            if (this.value === 'resident') {
                resSection.style.display = 'block';
                nonSection.style.display = 'none';
            } else {
                resSection.style.display = 'none';
                nonSection.style.display = 'block';
            }
            // Clear results on mode switch
            document.getElementById('result_section').style.display = 'none';
        });
    });

    function setChip(inputId, amount, chipGroupId) {
        document.getElementById(inputId).value = amount.toLocaleString('en-PK');
        // Clear active states in group
        document.querySelectorAll(`#${chipGroupId} .ytchip`).forEach(c => c.classList.remove('active'));
        if (event && event.target) {
            event.target.classList.add('active');
        }
        document.getElementById(inputId).focus();
    }

    // Input formatting for all inputs
    const inputs = ['adsense_input', 'sponsor_input', 'exchange_rate', 'views_input'];
    inputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', function() {
                let raw = this.value.replace(/[^0-9.]/g, '');
                if (raw && id !== 'exchange_rate') {
                    this.value = parseInt(raw).toLocaleString('en-PK');
                }
                // Clear chips
                const chipContainerId = id === 'adsense_input' ? 'usd_chips' : (id === 'sponsor_input' ? 'pkr_chips' : (id === 'views_input' ? 'views_chips' : ''));
                if (chipContainerId) {
                    document.querySelectorAll(`#${chipContainerId} .ytchip`).forEach(c => c.classList.remove('active'));
                }
            });
        }
    });

    window.cleanNumberInput = function(value) { return value.replace(/[^0-9.]/g, ''); };
    window.formatCurrency = function(val) {
        return 'Rs. ' + parseFloat(val).toLocaleString('en-PK', { maximumFractionDigits: 0 });
    };
</script>
<script src="{{ asset('js/youtuber.js') }}"></script>
@endsection
