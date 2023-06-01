<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    protected $guarded = [];

    public static function getBlogPreviousId($id) {
        $blog = DB::select('SELECT p.url FROM pages p where p.page_group="blog" and p.page_group_id = (select max(id) from blogs where status=1 and id <' . $id . ')');

        return $blog;
    }

    public static function getBlogNextId($id) {
        $blog = DB::select('SELECT p.url FROM pages p where p.page_group="blog" and p.page_group_id = (select max(id) from blogs where status=1 and id >' . $id . ')');

        return $blog;
    }

    public static function FetchAllFeaturedBlogs()
    {
        $blogs = DB::table('blogs as b')
        ->join('pages as p', 'b.id', '=', 'p.page_group_id')
        ->select('b.id as blog_id', 'b.blog_title', 'b.blog_description', 'b.blog_date', 'b.blog_banner', 'b.blog_banner_alt_text', 'p.id as page_id', 'p.name', 'p.url', 'p.page_title', 'p.meta_title', 'p.meta_keywords', 'p.meta_description')
        ->where('p.page_group', '=', 'blog')
        ->where('b.is_featured', '=', 1)
        ->where('b.status', '=', 1)
        ->get();
        return $blogs;
    }

}
