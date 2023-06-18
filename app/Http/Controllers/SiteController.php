<?php

namespace App\Http\Controllers;

use App\Helpers\SoftSourceHelper;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\StoryComment;
use App\Models\User;
use App\Models\WritingPrompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    public function index()
    {
        $categories = StoryCategory::where(['level' => 0, 'status' => 1])->get();
        $fetured_stories = Story::FetchAllFeaturedStory();
        $fetured_blogs = Blog::FetchAllFeaturedBlogs();

        return view('site.index')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
            'categories' => $categories,
            'fetured_stories' => $fetured_stories,
            'fetured_blogs' => $fetured_blogs,
            'meta' => $this->pages,
        ]);
    }

    public function about()
    {
        return view('site.about')->with([
            'page_title' => 'About Us',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function founder()
    {
        return view('site.founder')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function historychipfor()
    {
        return view('site.historychipfor')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function faq()
    {
        return view('site.faq')->with([
            'page_title' => 'Home',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function privacypolicy()
    {
        return view('site.privacypolicy')->with([
            'page_title' => 'Privacy Policy',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function termsandconditions()
    {
        return view('site.termsandconditions')->with([
            'page_title' => 'Terms & Conditions',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function contactus()
    {
        return view('site.contactus')->with([
            'page_title' => 'Contact Us',
            'notices' => $this->notices,
            'meta' => $this->pages,
        ]);
    }

    public function writingprompt()
    {
        $writingprompt = WritingPrompt::where('status', 1)->paginate(6);
        return view('site.writingprompt')->with([
            'page_title' => 'Writing Prompt',
            'notices' => $this->notices,
            'writingprompt' => $writingprompt,
            'meta' => $this->pages,
        ]);
    }

    public function blogs($slug = null)
    {
        if (is_null($this->pages)) {
            abort('404');
        }
        $previous = [];
        $next = [];
        if ($slug) {

            $blogs = DB::table('blogs as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as blog_id, b.blog_title, b.blog_description, b.blog_date, b.blog_banner, b.blog_banner_alt_text, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.id', '=', $this->pages->id)
                // ->where('p.url', '=', "/blogs/" . $slug)
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
                ->where('b.status', '=', 1)->orderBy('b.id', 'DESC')
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
            'meta' => $this->pages,

        ]);
    }

    public function partners($slug = null)
    {
        if ($slug) {
            if (is_null($this->pages)) {
                abort('404');
            }

            $partner = DB::table('partners as b')
                ->join('pages as p', 'b.id', '=', 'p.page_group_id')
                ->select(DB::raw('b.id as partner_id,b.name as partner_name, b.title, b.description, b.banner, b.banner_alt_text,b.logo,b.short_description,b.top_image, p.id as page_id, p.name, p.url, p.page_title, p.meta_title, p.meta_keywords, p.meta_description'))
                ->where('p.id', '=', $this->pages->id)
                // ->where('p.url', '=', "partners/" . $slug)
                ->where('b.status', '=', 1)
                ->first();

            $partnerimages = Partner::findOrFail($partner->partner_id)->load('partner_image', 'partner_type');

            $page_title = $partner->title;

            $viewPage = "site.partner-types.partner-" . strtolower($partnerimages->partner_type->name);

            return view('site.partner-types.partner-basic')->with([
                'page_title' => $page_title,
                'notices' => $this->notices,
                'partner' => $partner,
                'partnerimages' => $partnerimages,
                'meta' => $this->pages,
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
                'meta' => $this->pages,

            ]);
        }
    }

    public function profile()
    {

        $user = User::findOrFail(Auth::id())->load('user_profile');
        //dd($this->pages);

        return view('site.profile')->with([
            'page_title' => 'Profile',
            'notices' => $this->notices,
            'user' => $user,
            'meta' => $this->pages,

        ]);
    }

    public function my_stories()
    {

        $published_stories = Story::FetchStoryByAuthorIDAndApprovalType(Auth::guard('users')->id(), 12, 1);
        $waiting_stories = Story::FetchStoryByAuthorIDAndApprovalType(Auth::guard('users')->id(), 12, 0);
        $rejected_stories = Story::FetchStoryByAuthorIDAndApprovalType(Auth::guard('users')->id(), 12, 2);
        $draft_stories = Story::FetchDraftStoryByAuthorID(Auth::guard('users')->id(), 12, 1);


        return view('site.my-stories')->with([
            'page_title' => 'My Stories',
            'notices' => $this->notices,
            'published_stories' => $published_stories,
            'waiting_stories' => $waiting_stories,
            'rejected_stories' => $rejected_stories,
            'draft_stories' => $draft_stories,
            'meta' => $this->pages,

        ]);
    }

    public function author_stories($slug)
    {
        if (is_null($this->pages)) {
            abort('404');
        }
        $slugParts = explode('-', $slug);
        $firstWord = $slugParts[0];

        $author = User::findOrFail($firstWord);
        $published_stories = Story::FetchStoryByAuthorIDAndApprovalType($firstWord, 12, 1);
        $waiting_stories = Story::FetchStoryByAuthorIDAndApprovalType($firstWord, 12, 0);
        $rejected_stories = Story::FetchStoryByAuthorIDAndApprovalType($firstWord, 12, 2);
        $draft_stories = Story::FetchDraftStoryByAuthorID($firstWord, 12, 1);


        return view('site.author-stories')->with([
            'page_title' => $author->name.' Stories',
            'notices' => $this->notices,
            'published_stories' => $published_stories,
            'waiting_stories' => $waiting_stories,
            'rejected_stories' => $rejected_stories,
            'draft_stories' => $draft_stories,
            'meta' => $this->pages,

        ]);
    }

    public function read_story($slug = null)
    {
        if ($slug) {
            # code...
            // $stories = Story::findOrFail(Auth::id())->load('user_profile');
            if (is_null($this->pages)) {
                abort('404');
            }
            $slugParts = explode('-', $slug);
            $firstWord = $slugParts[0];
            // $remainingPart = implode('-', array_slice($slugParts, 1));

            $stories = Story::FetchSingleStory($firstWord);
            $comments = StoryComment::where('story_id', $firstWord)->with('commentator', 'accepter')->get();

            $author = Page::where(['page_group' => 'author', 'page_group_id' => $stories->author_id]);

            $page_title = $stories->title;
            $detail = true;
        } else {
            $stories = Story::FetchAllStory();
            $page_title = 'Read Stories';
            $detail = false;
            $comments = null;
        }

        return view('site.stories')->with([
            'page_title' => $page_title,
            'notices' => $this->notices,
            'stories' => $stories,
            'detail' => $detail,
            'meta' => $this->pages,
            'comments' => $comments,
        ]);
    }

    public function write_story($id = null)
    {
        $categories = StoryCategory::where(['level' => 0, 'status' => 1])->get();
        $categories_level1 = StoryCategory::where(['level' => 1, 'status' => 1])->get();
        $categories_level2 = StoryCategory::where(['level' => 2, 'status' => 1])->get();
        $categories_level3 = StoryCategory::where(['level' => 3, 'status' => 1])->get();
        $story = ($id) ? Story::findOrFail($id) : null;
        $page_title = ($id) ? 'Update Story' : 'Write A Story';

        return view('site.write-story')->with([
            'page_title' => $page_title,
            'notices' => $this->notices,
            'categories' => $categories,
            'categories_level1' => $categories_level1,
            'categories_level2' => $categories_level2,
            'categories_level3' => $categories_level3,
            'story' => $story,
            'meta' => $this->pages,

        ]);
    }

    public function saveimage(Request $request)
    {
        return SoftSourceHelper::SaveImageBYFileUploader($request);
    }

    public function deleteimage()
    {
        return SoftSourceHelper::DeleteImageBYFileUploader($_POST['file']);
    }

    public function saveaudio(Request $request)
    {
        return SoftSourceHelper::SaveAudioBYFileUploader($request);
    }

    public function deleteaudio()
    {

        return SoftSourceHelper::DeleteAudioBYFileUploader($_POST['file']);
    }

    public function FetchSubCatByParentCategory(Request $request)
    {
        $level = $request['level'];
        $id = $request['id'];
        $id = is_array($id) ? $id : array($id);

        $childCategories = StoryCategory::where(['status' => 1])
            ->when(!empty($id), function ($query) use ($id) {
                return $query->whereIn('parent_id', $id);
            })
            ->when(!is_null($level), function ($query, $level) {
                return $query->where('level', $level);
            })
            ->orderBy('name')->get();

        $html = "<option>Select Sub Category</option>";
        foreach ($childCategories as $childCategory) {
            $html .= "<option value='" . $childCategory->id . "'>" . $childCategory->name . "</option>";
        }

        $value = array(
            "result" => $html,
            "count" => count($childCategories),
        );
        echo json_encode($value);
    }
}
