<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend/index')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function about()
    {
        return view('site/about')->with([
            'page_title' => 'About Us',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function founder()
    {
        return view('site/founder')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function historychipfor()
    {
        return view('site/historychipfor')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function faq()
    {
        return view('site/faq')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function privacypolicy()
    {
        return view('site/privacypolicy')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function termsandconditions()
    {
        return view('site/termsandconditions')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

    public function contactus()
    {
        return view('site/contactus')->with([
            'page_title' => 'Home',
            'name' => 'Joy',
            'categories' => [],
            'stories' => [],
        ]);
    }

}
