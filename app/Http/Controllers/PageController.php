<?php

namespace App\Http\Controllers;

use App\Models\Slab;
use App\Models\Faq;
use App\Models\Post;
use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Mail\ContactInquiryMail;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $page = HomePage::settings();
        return view('home', compact('page'));
    }

    public function slabs()
    {
        $page = \App\Models\SlabPage::settings();
        $slabs = Slab::where('year_range', '2024-25')->orderBy('min_income', 'asc')->get();
        return view('slabs', compact('slabs', 'page'));
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', true)->orderBy('id', 'asc')->get();
        return view('faq', compact('faqs'));
    }

    public function blog()
    {
        $posts = Post::latest()->get();
        return view('blog', compact('posts'));
    }

    public function blogDetail(Post $post)
    {
        return view('blog-detail', compact('post'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function salary()
    {
        $page = \App\Models\SalaryTaxPage::settings();
        return view('tools.salary-tax', compact('page'));
    }

    public function freelancer()
    {
        $page = \App\Models\FreelancerTaxPage::settings();
        return view('tools.freelancer-tax', compact('page'));
    }

    public function youtuber()
    {
        $page = \App\Models\YoutuberTaxPage::settings();
        // Fetching 2025-26 slabs if they exist, otherwise 2024-25
        $slabs = Slab::where('year_range', '2025-26')->orderBy('min_income', 'asc')->get();
        if ($slabs->isEmpty()) {
            $slabs = Slab::where('year_range', '2024-25')->orderBy('min_income', 'asc')->get();
        }
        return view('tools.youtuber-tax', compact('page', 'slabs'));
    }

    public function rental()
    {
        $page = \App\Models\RentalTaxPage::settings();
        return view('tools.rental-tax', compact('page'));
    }

    public function capitalGain()
    {
        $page = \App\Models\CapitalGainTaxPage::settings();
        return view('tools.capital-gain', compact('page'));
    }



    public function storeInquiry(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string',
        'email'   => 'required|email',
        'subject' => 'nullable|string',
        'message' => 'required|string',
    ]);

    ContactInquiry::storeMessage($validated);
    Mail::to('awanm6815@gmail.com')->send(new ContactInquiryMail($validated));
    return back()->with('success', 'Message sent successfully!');
}
   public function about(){
    return view('about_us');
   }

}
