<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Partner;
use App\Models\User;
use App\Models\WritingPrompt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    public function index()
    {
        return view('site.index')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function about()
    {
        return view('site.about')->with([
            'page_title' => 'About Us',
            'notices' => $this->notices,
        ]);
    }

    public function founder()
    {
        return view('site.founder')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
        ]);
    }

    public function historychipfor()
    {
        return view('site.historychipfor')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
        ]);
    }

    public function faq()
    {
        return view('site.faq')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
        ]);
    }

    public function privacypolicy()
    {
        return view('site.privacypolicy')->with([
            'page_title' => 'Privacy Policy',
            'notices' => $this->notices,
        ]);
    }

    public function termsandconditions()
    {
        return view('site.termsandconditions')->with([
            'page_title' => 'Terms & Conditions',
            'notices' => $this->notices,
        ]);
    }

    public function contactus()
    {
        return view('site.contactus')->with([
            'page_title' => 'Contact Us',
            'notices' => $this->notices,
        ]);
    }

    public function writingprompt()
    {
        $writingprompt = WritingPrompt::where('status', 1)->paginate(6);
        return view('site.writingprompt')->with([
            'page_title' => 'Writing Prompt',
            'notices' => $this->notices,
            'writingprompt' => $writingprompt,
        ]);
    }

    public function blogs($slug = null)
    {
        $previous = [];
        $next = [];
        if ($slug) {

            $blogs = DB::table('blogs as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as blog_id, b.blog_title, b.blog_description, b.blog_date, b.blog_banner, b.blog_banner_alt_text, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'blog')
                ->where('p.url', '=', "blogs/" . $slug)
                ->where('b.status', '=', 1)
                ->first();

            $page_title = $blogs->page_title;
            $detail = true;

            $previous = Blog::getBlogPreviousId((int) $blogs->blog_id);
            $next = Blog::getBlogNextId((int) $blogs->blog_id);

        } else {

            $blogs = DB::table('blogs as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as blog_id, b.blog_title, b.blog_description, b.blog_date, b.blog_banner, b.blog_banner_alt_text, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'blog')
                ->where('b.status', '=', 1)
                ->paginate(20);
            $page_title = 'Blogs';
            $detail = false;
        }

        return view('site.blogs')->with([
            'page_title' => $page_title,
            'notices' => $this->notices,
            'blogs' => $blogs,
            'detail' => $detail,
            'previous' => $previous,
            'next' => $next,

        ]);

    }

    public function partners($slug = null)
    {
        if ($slug) {

            $partner = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id,b.name as partner_name, b.title, b.description, b.banner, b.banner_alt_text,b.logo,b.short_description,b.top_image, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'partner')
                ->where('p.url', '=', "partners/" . $slug)
                ->where('b.status', '=', 1)
                ->first();

            $partnerimages = Partner::findOrFail($partner->partner_id)->load('partner_image', 'partner_type');

            $page_title = $partner->title;

            $viewPage = "site.partner-types." . strtolower($partnerimages->partner_type->name);

            return view($viewPage)->with([
                'page_title' => $page_title,
                'notices' => $this->notices,
                'partner' => $partner,
                'partnerimages' => $partnerimages,

            ]);

        } else {
            $partners = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id, b.title, b.description, b.banner, b.banner_alt_text, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.page_group', '=', 'partner')
                ->where('b.status', '=', 1)
                ->paginate(20);

            $page_title = 'Partners';

            return view('site.partners')->with([
                'page_title' => $page_title,
                'notices' => $this->notices,
                'partners' => $partners,

            ]);
        }

    }

    public function profile()
    {

        $user = User::findOrFail(Auth::id())->load('user_profile');

        return view('site.profile')->with([
            'page_title' => 'Profile',
            'notices' => $this->notices,
            'user' => $user,

        ]);
    }

    public function read_story()
    {

        $user = User::findOrFail(Auth::id())->load('user_profile');

        return view('site.profile')->with([
            'page_title' => 'Read Story',
            'notices' => $this->notices,

        ]);
    }

    public function write_story()
    {

        return view('site.write-story')->with([
            'page_title' => 'Write A Story',
            'notices' => $this->notices,

        ]);
    }

}
