@extends('layouts.app')

@section('title', $page->meta_title ?? 'Salary Tax Calculator Pakistan 2025-26 | PakTools')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
        <main class="lg:w-3/4 w-full">
            <div class="text-3xl font-extrabold text-slate-900 mb-2">
            {!! $page->h1_title ?? '<h1>Salary Tax Calculator Pakistan (2025-26)</h1>' !!}
            </div>
            <p class="text-slate-500 mb-8 font-medium">
                {{ $page->sub_title ?? 'Verify your exact monthly deductions based on FBR\'s latest Finance Act 2025 legislation.' }}
            </p>

            @if($page->ad_top)
                <div class="ad-slot ad-slot-leaderboard mb-8">
                    {!! $page->ad_top !!}
                </div>
            @endif

            <div class="app-card p-6 md:p-8 mb-10 border-t-8 border-fbrgreen-500 shadow-2xl bg-white rounded-xl">
                <div class="grid grid-cols-1 gap-6">

                    <!-- Income Period Toggle Buttons -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Income Period</label>
                        <div class="flex gap-3 tax-type-toggle">
                            <button type="button" id="btn_period_monthly" onclick="setPeriod('monthly')"
                                class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm">
                                📅 Monthly
                            </button>
                            <button type="button" id="btn_period_yearly" onclick="setPeriod('yearly')"
                                class="flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm">
                                📆 Yearly / Annual
                            </button>
                        </div>
                        <input type="hidden" id="salary_type" value="monthly">
                    </div>

                    <!-- Salary Input -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Gross Salary (PKR)</label>
                        <input type="text" id="salary_input"
                            class="w-full border-2 border-gray-200 rounded-xl p-4 font-bold text-slate-900 focus:border-fbrgreen-500 outline-none"
                            placeholder="e.g., 100,000" inputmode="numeric">
                        <!-- Quick Salary Suggestions -->
                        <div class="mt-3">
                            <p class="text-xs text-slate-400 font-semibold mb-2 uppercase tracking-wide">Quick Select</p>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" onclick="setSalary(50000)" class="suggestion-chip">50,000</button>
                                <button type="button" onclick="setSalary(100000)" class="suggestion-chip">1 Lakh</button>
                                <button type="button" onclick="setSalary(150000)" class="suggestion-chip">1.5 Lakh</button>
                                <button type="button" onclick="setSalary(200000)" class="suggestion-chip">2 Lakh</button>
                                <button type="button" onclick="setSalary(300000)" class="suggestion-chip">3 Lakh</button>
                                <button type="button" onclick="setSalary(500000)" class="suggestion-chip">5 Lakh</button>
                                <button type="button" onclick="setSalary(1000000)" class="suggestion-chip">10 Lakh</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tax Year (locked) -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tax Fiscal Year</label>
                        <select
                            class="w-full border-2 border-gray-100 bg-gray-50 rounded-xl p-4 font-bold text-slate-400 cursor-not-allowed"
                            disabled>
                            <option value="2025-26">2025 – 2026 (Current Year)</option>
                        </select>
                    </div>

                    <div>
                        <button id="calculate_btn"
                            class="bg-action-500 hover:bg-action-600 text-white py-3.5 text-base w-full font-bold rounded-xl transition shadow-lg">Calculate
                            Tax</button>
                    </div>
                </div>

                @if($page->ad_middle)
                    <div class="ad-slot ad-slot-leaderboard my-8">
                        {!! $page->ad_middle !!}
                    </div>
                @endif

                <div id="result_section" class="hidden animate-fade-in border-t border-gray-100 pt-8 mt-4">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div id="pill_gross" class="bg-slate-50 border border-slate-200 rounded-xl p-5"></div>
                        <div id="pill_tax" class="bg-red-50 border border-red-100 rounded-xl p-5 shadow-inner"></div>
                        <div id="pill_net" class="bg-green-50 border border-green-200 rounded-xl p-5 shadow-sm"></div>
                    </div>
                    <div id="detail_log" class="mt-6 text-center w-full table-responsive"></div>
                </div>
            </div>


            <article class="w-full text-slate-700">
    {{-- 'prose-h2:mt-10' force karega ke headings ke oper space aaye --}}
    <div class="prose prose-slate max-w-none
                prose-h2:mt-12 prose-h2:mb-4 prose-h2:text-2xl
                prose-p:mb-6 prose-p:leading-relaxed
                mobile-content-fix">
        {!! $page->content !!}
    </div>
</article>

@if($page->faqs && is_array($page->faqs) && count($page->faqs) > 0)
    <div class="max-w-4xl mx-auto px-4 pb-20 w-full">

        {{-- Section heading with emerald underline accent --}}
        <h2 class="text-2xl md:text-3xl font-black text-slate-900 mb-10 pb-4 border-b-4 border-emerald-500 inline-block tracking-tight uppercase">
            Frequently Asked Questions
        </h2>

        {{-- FAQ dynamic list --}}
        <div class="space-y-6 w-full">
            @foreach($page->faqs as $faq)
                <details class="w-full bg-gray-50 border border-gray-200 p-5 rounded-2xl cursor-pointer group transition-all hover:border-emerald-200">
                    <summary class="font-bold text-slate-800 text-lg outline-none flex justify-between items-center list-none w-full">
                        <span>{!! $faq['question'] !!}</span>
                        {{-- Icon that rotates to 'x' (45 deg) when open --}}
                        <span class="text-emerald-500 text-2xl font-bold group-open:rotate-45 transition-transform duration-300 flex-shrink-0 ml-4">
                            +
                        </span>
                    </summary>
                    <div class="mt-4 text-slate-600 leading-relaxed text-sm border-t border-gray-200 pt-4 w-full">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
            @endforeach
        </div>
    </div>
@endif
        </main>

        <aside class="lg:w-1/4 mt-8 lg:mt-0 space-y-8">
            @if($page->ad_sidebar)
                <div class="ad-slot ad-slot-rectangle">
                    {!! $page->ad_sidebar !!}
                </div>
            @endif
            @if($calculatorsMenu)
                <div class="app-card p-5 border-t-4 border-fbrgreen-500 shadow-lg bg-white rounded-xl">
                    <h3 class="font-extrabold text-slate-900 text-lg mb-4 border-b pb-2">More Estimators</h3>
                    <ul class="space-y-4 font-semibold text-sm">
                        @foreach($calculatorsMenu->subMenus as $subMenu)
                            <li><a href="{{ $subMenu->url }}"
                                    class="flex text-fbrgreen-600 hover:text-action-500 transition-colors">{{ $subMenu->title }}
                                    <span class="ml-auto opacity-50">&rarr;</span></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </aside>
    </div>
@endsection

@section('styles')
    <style>
        .suggestion-chip {
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            color: #15803d;
            border-radius: 8px;
            padding: 5px 14px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .suggestion-chip:hover {
            background: #16a34a;
            color: #fff;
            border-color: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(22, 163, 74, 0.25);
        }

        .suggestion-chip.active-chip {
            background: #16a34a;
            color: #fff;
            border-color: #16a34a;
        }
        
    </style>
@endsection

@section('scripts')
    <script>
        function setPeriod(val) {
            document.getElementById('salary_type').value = val;
            const activeClass = 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-fbrgreen-500 bg-green-50 text-fbrgreen-700 transition shadow-sm';
            const inactiveClass = 'flex-1 py-3 px-4 rounded-xl font-bold border-2 border-gray-200 bg-white text-slate-500 hover:bg-gray-50 transition shadow-sm';
            document.getElementById('btn_period_monthly').className = (val === 'monthly') ? activeClass : inactiveClass;
            document.getElementById('btn_period_yearly').className = (val === 'yearly') ? activeClass : inactiveClass;
        }
        function setSalary(amount) {
            document.getElementById('salary_input').value = amount.toLocaleString('en-PK');
            // Highlight active chip
            document.querySelectorAll('.suggestion-chip').forEach(c => c.classList.remove('active-chip'));
            if (event && event.target) {
                event.target.classList.add('active-chip');
            }
            document.getElementById('salary_input').focus();
        }
        // Format salary input with commas as the user types
        document.getElementById('salary_input').addEventListener('input', function () {
            let raw = this.value.replace(/[^0-9]/g, '');
            if (raw) this.value = parseInt(raw).toLocaleString('en-PK');
            // Clear chip highlights when typing manually
            document.querySelectorAll('.suggestion-chip').forEach(c => c.classList.remove('active-chip'));
        });
        // Override cleanNumberInput globally to handle formatted comma values
        window.cleanNumberInput = function (value) {
            return value.replace(/[^0-9.]/g, '');
        };
        window.formatCurrency = function (val) {
            return 'Rs. ' + parseFloat(val).toLocaleString('en-PK', { maximumFractionDigits: 0 });
        };
    </script>
    <script src="{{ asset('js/salary.js') }}"></script>
@endsection
