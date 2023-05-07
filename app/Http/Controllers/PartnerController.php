<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\SoftSourceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.partners.index')->with([
            'page_title' => 'Partners',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.partners.create')->with([
            'page_title' => 'Create Partner',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('blog_banner'));
        $req_partner = $request->partner;
        $req_meta = $request->meta;

        //dd($req_blog);

        $uniquevalidation = $req_partner['id'] ? $req_partner['id'] : '';

        $validator = Validator::make($req_partner, [
            "name" => "required|unique:partners,name," . $uniquevalidation,
            "email" => "required|email",
            "partner_type_id" => "required",
            "title" => "required",
            "banner" => "required",
            "logo" => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $partner = $req_partner['id'] ? Partner::findOrFail($req_partner['id']) : new Partner;

            $meta = $req_partner['id'] ? Page::where('page_group', 'partner')->where('page_group_id', $req_partner['id'])->first() : new Page;

            $returnText = $req_partner['id'] ? 'Updated' : 'Saved';

            $partner->partner_type_id = $req_partner['partner_type_id'];
            $partner->name = $req_partner['name'];
            $partner->email = $req_partner['email'];
            $partner->banner_alt_text = $req_partner['banner_alt_text'];
            $partner->title = $req_partner['title'];
            $partner->description = $req_partner['description'];
            $partner->logo = $req_partner['logo'];
            $partner->status = $req_partner['status'];
            $partner->uuid = Str::uuid()->toString();


            $meta->name = lcfirst(str_replace(' ', '', ucwords($req_partner['name'])));
            $meta->url = Str::slug($req_partner['name']);
            $meta->page_title = $req_partner['title'];
            $meta->page_group = 'partner';
            $meta->meta_title = $req_meta['meta_title'];
            $meta->meta_keywords = $req_meta['meta_keywords'];
            $meta->meta_description = $req_meta['meta_description'];
            $meta->og_author = Auth::id();
            $meta->status = $req_partner['status'];

            if ($request->hasFile('banner')) {
                $partner->banner = SoftSourceHelper::FileUploaderHelper($request->banner, 'backend/partner/banner');
            }

            $images = [];
            if ($request->hasFile('partner_image')) {
                $images = SoftSourceHelper::MultipleFileUploaderHelper($request->banner, 'backend/partner/images');
            }

            try {
                DB::transaction(function () use ($partner, $meta, $images) {
                    $partner->save();
                    if(!empty($images)){
                        $partner->partner_image()->createMany($images);
                    }
                    $meta->page_group_id = $partner->id;
                    $meta->save();
                });
                return redirect()->route('blogs')->with('success', "Partner $returnText Successfully");
            } catch (\Exception$e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
