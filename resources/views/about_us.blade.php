@extends('layouts.app')

@section('title', 'About Us | PakTools')

@section('content')
<div class="bg-gradient-to-r from-[#1e7e34] to-[#28a745] py-12 md:py-20 px-4 md:px-6 shadow-md">
    <div class="max-w-5xl mx-auto text-center md:text-left">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white mb-4 tracking-tight leading-tight">About PakTools</h1>
        <p class="text-green-50 text-base md:text-xl opacity-90 max-w-2xl mx-auto md:mx-0">
            Empowering Pakistani taxpayers with precise, automated, and accessible financial estimation tools for a transparent future.
        </p>
        <div class="mt-6 inline-block bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-white text-xs md:text-sm border border-white/30">
            Est. 2026 | Trusted by Thousands
        </div>
    </div>
</div>


<main class="max-w-5xl mx-auto px-4 sm:px-6 md:px-10 py-10 bg-white shadow-xl relative z-10 rounded-2xl border border-gray-100 mb-10 md:mb-20 mx-4 sm:mx-6 lg:mx-auto">

    <section class="mb-10 md:mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4 flex-shrink-0">01</span>
            <h2 class="text-xl md:text-2xl font-bold text-gray-900">Our Mission</h2>
        </div>
        <p class="text-base md:text-lg text-gray-600 leading-relaxed">
            <span class="font-semibold text-[#28a745]">PakTools</span> was founded to bridge the gap between complex tax regulations and the everyday citizen. We believe that understanding your financial obligations shouldn't require a law degree. Our mission is to provide every Pakistani—from salaried individuals to property owners—with free, high-speed, and accurate tools.
        </p>
    </section>

    <section class="mb-10 md:mb-12 py-8 border-y border-gray-100">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-black text-gray-900">Trusted by Professionals</h2>
            <p class="text-sm md:text-base text-gray-500 mt-2 px-2">Join over 10,000+ monthly users who rely on our tools.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 text-center">
            <div class="p-2">
                <div class="text-2xl md:text-3xl font-black text-[#28a745]"><span class="counter" data-target="10000">0</span>+</div>
                <div class="text-[10px] md:text-sm text-gray-600 uppercase tracking-wide font-bold">Monthly Users</div>
            </div>
            <div class="p-2">
                <div class="text-2xl md:text-3xl font-black text-[#28a745]"><span class="counter" data-target="50000">0</span>+</div>
                <div class="text-[10px] md:text-sm text-gray-600 uppercase tracking-wide font-bold">Calculations</div>
            </div>
            <div class="p-2">
                <div class="text-2xl md:text-3xl font-black text-[#28a745]"><span class="counter" data-target="99.9">0</span>%</div>
                <div class="text-[10px] md:text-sm text-gray-600 uppercase tracking-wide font-bold">Accuracy Rate</div>
            </div>
            <div class="p-2">
                <div class="text-2xl md:text-3xl font-black text-[#28a745]">24/7</div>
                <div class="text-[10px] md:text-sm text-gray-600 uppercase tracking-wide font-bold">Availability</div>
            </div>
        </div>
    </section>

    <section class="mb-10 md:mb-12">
        <div class="flex items-center mb-8">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4 flex-shrink-0">02</span>
            <h2 class="text-xl md:text-2xl font-bold text-gray-900">What Our Users Say</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-5 md:p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="flex text-orange-400 mb-3">
                    @for($i=0; $i<5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    @endfor
                </div>
                <p class="text-sm md:text-base text-gray-600 italic mb-4">"PakTools has made my monthly salary tax estimation so easy. I no longer have to wait for my HR department."</p>
                <div class="text-sm font-bold text-gray-900">— Ahmed Khan, Software Engineer</div>
            </div>
            <div class="p-5 md:p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="flex text-orange-400 mb-3">
                    @for($i=0; $i<5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    @endfor
                </div>
                <p class="text-sm md:text-base text-gray-600 italic mb-4">"The rental income tax calculator is incredibly accurate. It helped me plan my property investments much better."</p>
                <div class="text-sm font-bold text-gray-900">— Sarah Malik, Investor</div>
            </div>
        </div>
    </section>

    <section class="mb-10 md:mb-12">
        <div class="flex items-center mb-6">
            <span class="bg-green-100 text-[#28a745] font-bold px-3 py-1 rounded-lg mr-4 flex-shrink-0">03</span>
            <h2 class="text-xl md:text-2xl font-bold text-gray-900">What Sets Us Apart</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <div class="p-5 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition duration-300">
                <h4 class="font-bold text-[#28a745] mb-2">Real-Time Updates</h4>
                <p class="text-gray-600 text-xs md:text-sm">We monitor official SROs daily to ensure our algorithms match current fiscal laws.</p>
            </div>
            <div class="p-5 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition duration-300">
                <h4 class="font-bold text-[#28a745] mb-2">100% Private</h4>
                <p class="text-gray-600 text-xs md:text-sm">Your financial data stays on your device. We do not store any of your income details.</p>
            </div>
            <div class="p-5 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:shadow-md transition duration-300">
                <h4 class="font-bold text-[#28a745] mb-2">Simplified UI</h4>
                <p class="text-gray-600 text-xs md:text-sm">Designed for ease—from freelancers to corporate employees—with an intuitive interface.</p>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-gray-100">
        <h2 class="text-2xl md:text-3xl font-black text-center text-gray-900 mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4">
            @php
                $faqs = [
                    ['q' => 'Is PakTools affiliated with the FBR?',       'a' => 'No, PakTools is an independent, private platform. While we use official FBR data, we are not a government entity.'],
                    ['q' => 'Are the calculations 100% accurate?',         'a' => 'We strive for maximum accuracy based on general tax slabs. For final filing, please consult a tax professional.'],
                    ['q' => 'How often are the tax slabs updated?',        'a' => 'Whenever the FBR announces new tax rates, our calculators are typically updated within 24 hours.'],
                    ['q' => 'Are there any hidden charges?',               'a' => 'No, PakTools is 100% free for all users.'],
                    ['q' => 'Can I use these for official bank documents?','a' => 'Our results are for estimation. For official bank proofs, use official tax returns from the Iris portal.'],
                ];
            @endphp
            @foreach($faqs as $faq)
            <details class="group bg-gray-50 rounded-xl md:rounded-2xl overflow-hidden transition-all duration-300">
                <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-4 md:p-5 text-sm md:text-base text-gray-800 hover:bg-gray-100">
                    <span>{{ $faq['q'] }}</span>
                    <span class="text-[#28a745] transition group-open:rotate-180 flex-shrink-0 ml-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <div class="px-4 md:px-5 pb-4 md:pb-5 text-xs md:text-sm text-gray-600 border-t border-white pt-3">
                    {{ $faq['a'] }}
                </div>
            </details>
            @endforeach
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const startCounters = () => {
            counters.forEach(counter => {
                const animate = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const increment = target / speed;
                    if (count < target) {
                        counter.innerText = (target % 1 !== 0)
                            ? (count + increment).toFixed(1)
                            : Math.ceil(count + increment);
                        setTimeout(animate, 10);
                    } else {
                        counter.innerText = target;
                    }
                };
                animate();
            });
        };

        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) { startCounters(); observer.disconnect(); }
        }, { threshold: 0.1 });

        const first = document.querySelector('.counter');
        if (first) observer.observe(first.parentElement);
    });
</script>
@endsection
