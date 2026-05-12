@extends('layouts.app')

@section('title', 'Contact Us | PakTools')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">

    <div class="max-w-2xl mb-12">
        <h1 class="text-5xl font-black tracking-tight text-slate-900 mb-4">
            Get in <span class="text-green-600">Touch.</span>
        </h1>
        <p class="text-lg text-slate-600 leading-relaxed">
            Have questions about your tax calculations or FBR liabilities? Our expert team is ready to provide the clarity you need.
        </p>
    </div>

    <div class="grid lg:grid-cols-2 gap-16 items-stretch">

        <div class="flex flex-col">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 h-full">
                <h2 class="text-2xl font-bold text-slate-800 mb-8 flex items-center gap-3">
                    <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    Send us a Message
                </h2>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                   @if(session('success'))
                    <div id="success-alert" class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 transition-all duration-500">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-semibold">Message Sent Successfully!</span>
                    </div>

                    <script>
                        setTimeout(() => {
                            const alert = document.getElementById('success-alert');
                            alert.style.opacity = '0';
                            alert.style.transform = 'translateY(-10px)';
                            setTimeout(() => alert.remove(), 500);
                        }, 5000);
                    </script>
                @endif

                @if($errors->any())
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6">
                        <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <ul class="text-sm font-medium space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Full Name</label>
                            <input type="text" name="name" class="w-full bg-slate-50 border-2 border-slate-50 focus:border-blue-500 focus:bg-white rounded-2xl p-4 outline-none transition-all duration-300" placeholder="M.Ali">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Email Address</label>
                            <input type="email" name="email" class="w-full bg-slate-50 border-2 border-slate-50 focus:border-blue-500 focus:bg-white rounded-2xl p-4 outline-none transition-all duration-300" placeholder="Ali@example.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Subject</label>
                        <input type="text" name="subject" class="w-full bg-slate-50 border-2 border-slate-50 focus:border-blue-500 focus:bg-white rounded-2xl p-4 outline-none transition-all duration-300" placeholder="Tax Inquiry">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Message</label>
                        <textarea name="message" rows="5" class="w-full bg-slate-50 border-2 border-slate-50 focus:border-blue-500 focus:bg-white rounded-2xl p-4 outline-none transition-all duration-300 resize-none" placeholder="How can we assist you today?"></textarea>
                    </div>

                    <button type="submit" class="group w-full py-4 px-8 bg-slate-900 hover:bg-blue-600 text-white font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 shadow-xl flex justify-center items-center gap-3">
                        Submit Request
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-col justify-between">
            <div class="grid grid-cols-1 gap-6 mb-8">
                <div class="p-6 bg-white border border-slate-100 rounded-3xl shadow-sm flex items-center gap-6">
                    <div class="bg-blue-100 p-4 rounded-2xl text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                   <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Email Us</p>
                        <a href="mailto:support@paktools.pk" class="text-xl font-bold text-slate-800 hover:text-blue-600 transition-colors">
                            support@paktools.pk
                        </a>
                    </div>
                </div>

                <div class="p-6 bg-white border border-slate-100 rounded-3xl shadow-sm flex items-center gap-6">
                    <div class="bg-slate-100 p-4 rounded-2xl text-slate-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Our Headquarters</p>
                        <p class="text-xl font-bold text-slate-800">Blue Area, Islamabad</p>
                    </div>
                </div>
            </div>

            <div class="flex-grow rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white grayscale hover:grayscale-0 transition-all duration-700 min-h-[300px]">
                <iframe
                    width="100%"
                    height="100%"
                    frameborder="0"
                    style="border:0; min-height: 100%;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53114.33149539423!2d73.0125555437996!3d33.69345759160569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbfd07891722f%3A0x6059515133b45273!2sIslamabad%2C%20Islamabad%20Capital%20Territory!5e0!3m2!1sen!2spk!4v1713450000000!5m2!1sen!2spk"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
