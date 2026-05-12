<!DOCTYPE html>
<html lang="en-PK">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PakTools | Instant FBR Tax Calculators Pakistan 2024-25')</title>
    <meta name="description" content="@yield('meta_description', 'Calculate your exact FBR 2024-25 taxes instantly. Official slabs and brackets for Salary, Exporters, YouTubers, and Real Estate in Pakistan.')">
    <meta name="keywords" content="@yield('meta_keywords', 'FBR, tax calculator Pakistan, salary tax, income tax slabs, 2024-25')">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fbrgreen: { 500: '#16a34a', 600: '#15803d', 700: '#317450' },
                        action: { 500: '#f97315', 600: '#ea580c' },
                        bodybg: '#f8fafc'
                    }
                }
            }
        }
    </script>
    <style>
        .rich-content a {
            color: rgb(21, 128, 61) !important;
            font-weight: 700;
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
    @yield('schema')
</head>
<body class="bg-bodybg text-slate-800 break-words flex flex-col min-h-screen">

<nav class="bg-fbrgreen-500 text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-[75px] items-center">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 font-extrabold text-3xl tracking-tight">
                <span>Pak<span class="text-green-200">Tools</span></span>
            </a>

            <div class="hidden md:flex space-x-8 items-center font-semibold text-[15px]">
                @foreach($menus as $menu)
                    @if($menu->subMenus->count() > 0)
                        <!-- Mega Menu Dropdown -->
                        <div class="relative group h-[75px] flex items-center cursor-pointer">
                            <span class="hover:text-green-200 transition flex items-center">
                                {{ $menu->title }}
                                <svg class="h-4 w-4 ml-1 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div class="absolute left-0 top-[75px] w-64 bg-white border border-gray-100 shadow-2xl rounded-b-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 text-slate-800 p-2 overflow-hidden z-50">
                                @foreach($menu->subMenus as $subMenu)
                                    <a href="{{ $subMenu->url }}" class="block rounded-lg px-4 py-3 hover:bg-green-50 hover:text-fbrgreen-600 font-semibold transition">{{ $subMenu->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ $menu->url }}" class="{{ request()->is(trim($menu->url, '/')) ? 'border-b-2 border-white pb-1' : 'hover:text-green-200 transition' }}">{{ $menu->title }}</a>
                    @endif
                @endforeach
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('contact') }}" class="bg-action-500 text-white font-semibold px-6 py-2.5 rounded hover:bg-action-600 transition shadow-sm">Contact us</a>
            </div>
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button" id="mobile-menu-btn" class="p-2 text-white hover:text-green-100 focus:outline-none">
                    <svg id="hamburger-icon" class="block h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"/></svg>
                    <svg id="close-icon" class="hidden h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/></svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-100 shadow-xl overflow-hidden animate-fade-in sticky top-[75px] z-40">
    <div class="px-4 py-6 space-y-4">
        @foreach($menus as $menu)
            @if($menu->subMenus->count() > 0)
                <div class="space-y-1">
                    <button type="button" class="mobile-submenu-btn w-full flex items-center justify-between text-slate-800 font-semibold hover:text-fbrgreen-600 transition">
                        <span>{{ $menu->title }}</span>
                        <svg class="h-5 w-5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"/></svg>
                    </button>
                    <div class="mobile-submenu hidden pl-4 space-y-3 pt-2 pb-1">
                        @foreach($menu->subMenus as $subMenu)
                            <a href="{{ $subMenu->url }}" class="block text-slate-600 font-medium hover:text-fbrgreen-600 transition">{{ $subMenu->title }}</a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ $menu->url }}" class="block text-slate-800 font-semibold hover:text-fbrgreen-600 transition">{{ $menu->title }}</a>
            @endif
        @endforeach
        <div class="pt-4 border-t border-gray-100">
            <a href="{{ route('contact') }}" class="block w-full bg-action-500 text-white text-center font-bold py-3 rounded-lg shadow-md">Contact us</a>
        </div>
    </div>
</div>

@yield('content')

<footer class="bg-slate-900 border-t-8 border-fbrgreen-500 pt-16 pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 text-white">
        <div>
            <span class="font-extrabold text-3xl tracking-tight">Pak<span class="text-fbrgreen-500">Tools</span></span>
            <p class="text-slate-400 mt-6 text-sm leading-relaxed">Pakistan's most reliable and accurate FBR tax calculators, built exclusively for the 2024-25 Finance Bill algorithms.</p>
        </div>
        <div>
            <h4 class="font-bold text-xl mb-6 text-fbrgreen-500">Quick Links</h4>
            <ul class="space-y-4 text-sm text-slate-300 font-medium">
                @foreach($footerMenus as $fMenu)
                    <li><a href="{{ $fMenu->url }}" class="hover:text-white transition flex items-center">&rarr; <span class="ml-2">{{ $fMenu->title }}</span></a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-xl mb-6 text-fbrgreen-500">Legal Disclaimer</h4>
            <p class="text-slate-400 text-xs leading-relaxed">These calculators provide automated arithmetic estimates based on standard FBR rules and tax bands. Variations may occur based on individual rebates, tax credits, and arrears. For official legal filings on the IRIS portal, users must consult a certified tax practitioner.</p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-12 pt-8 border-t border-slate-800 text-center text-slate-500 text-sm">
        &copy; {{ date('Y') }} PakTaxCalculators. All Rights Reserved.
    </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
