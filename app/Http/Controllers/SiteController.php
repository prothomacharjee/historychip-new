<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\NoticePrompt;
use App\Models\WritingPrompt;
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
            ->where('p.url', '=', $slug)
            ->where('b.status', '=', 1)
            ->first();
            $page_title = $blogs->page_title;
            $detail = true;

            $previous = Blog::getBlogPreviousId((int) $blogs->blog_id);
            $next = Blog::getBlogNextId((int) $blogs->blog_id);

        } else {

            $blogs =  DB::table('blogs as b')
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

}
