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

}
