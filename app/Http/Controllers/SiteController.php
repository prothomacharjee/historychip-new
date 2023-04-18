<?php

namespace App\Http\Controllers;

use App\Models\NoticePrompt;
use Carbon\Carbon;

class SiteController extends Controller
{

    public $notices = null;

    public function __construct()
    {
        $currentDateTime = now()->format('Y-m-d H:i');
        $this->notices = NoticePrompt::where(function ($query) use ($currentDateTime) {
            $query->whereNull('duration_from')
                ->whereNull('duration_to')
                ->where('status', '=', 1)
                ->orWhere(function ($query) use ($currentDateTime) {
                    $query->where('duration_from', '<=', "$currentDateTime")
                        ->where('duration_to', '>=', "$currentDateTime")
                        ->where('status', '=', 1);
                });
        })->get();

    }

    public function index()
    {
        return view('site/index')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function about()
    {
        return view('site/about')->with([
            'page_title' => 'About Us',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function founder()
    {
        return view('site/founder')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function historychipfor()
    {
        return view('site/historychipfor')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function faq()
    {
        return view('site/faq')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function privacypolicy()
    {
        return view('site/privacypolicy')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function termsandconditions()
    {
        return view('site/termsandconditions')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

    public function contactus()
    {
        return view('site/contactus')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
            'notices' => $this->notices,
        ]);
    }

}
