<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Partner;
use App\Models\PartnerType;
use Illuminate\Support\Str;
use App\Models\PartnerImage;
use Illuminate\Http\Request;
use App\Helpers\SoftSourceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
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
        $partner_types = PartnerType::where('status', 1)->get();
        return view('backend.partners.create')->with([
            'page_title' => 'Create Partner',
            'partner_types' => $partner_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $req_partner = $request->partner;
        $req_meta = $request->meta;



        $uniquevalidation = $req_partner['id'] ? $req_partner['id'] : '';

        $validator = Validator::make($req_partner, [
            "name" => "required|unique:partners,name," . $uniquevalidation,
            "email" => "required|email",
            "partner_type_id" => "required",
            "title" => "required",
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
            $partner->status = $req_partner['status'];
            $partner->uuid = Str::uuid()->toString();



            $meta->name = "partner.".lcfirst(str_replace(' ', '', ucwords($req_partner['name'])));
            $meta->url = "partner/".Str::slug($req_partner['name']);
            $meta->page_title = $req_partner['title'];
            $meta->page_group = 'partner';
            $meta->meta_title = $req_meta['meta_title'];
            $meta->meta_keywords = $req_meta['meta_keywords'];
            $meta->meta_description = $req_meta['meta_description'];
            $meta->og_author = Auth::id();
            $meta->status = $req_partner['status'];



            if ($request->hasFile('banner')) {
                $partner->banner = SoftSourceHelper::FileUploaderHelper($request->banner, 'backend/partner/banner/');
            }


            if ($request->hasFile('logo')) {
                $partner->logo = SoftSourceHelper::FileUploaderHelper($request->logo, 'backend/partner/logo/');
            }



            $images = [];
            if ($request->hasFile('partner_image')) {
                $images = SoftSourceHelper::MultipleFileUploaderHelper($request->partner_image, 'backend/partner/images/');
            }

            try {
                DB::transaction(function () use ($partner, $meta, $images, $req_partner) {
                    $partner->save();
                    if(!empty($images)){
                        $partner_images = [];

                        foreach ($images as $key=>$image) {
                            $partner_images[] = [
                                'image_path'=> $image,
                                'image_alt_text'=> $req_partner['image_alt_text'][$key],
                                'partner_id'=> $partner->id,
                            ];
                        }

                        if($req_partner['id']){
                            $partner->partner_image()->delete();
                            $partner->partner_image()->createMany($productpurchaseorderdetails);
                        }
                        else{

                            $partner->partner_image()->createMany($partner_images);
                        }
                    }
                    $meta->page_group_id = $partner->id;
                    $meta->save();
                });
                return redirect()->route('admin.partners')->with('success', "Partner $returnText Successfully");
            } catch (\Exception$e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id)->load('partner_image');
        $partner_types = PartnerType::where('status', 1)->get();
        $meta = Page::where('page_group', 'partner')->where('page_group_id', $id)->first();

        return view('backend.partners.create')->with([
            'page_title' => 'Edit Partner',
            'partner' => $partner,
            'partner_types' => $partner_types,
            'meta' => $meta,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);
            DB::transaction(function () use ($partner) {
                $partner->delete();
            });
            return redirect()->route('admin.partners')->with('success', 'Partner Deleted Successfully');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadPartnerDataTable(Request $request)
    {
        $url = 'partners';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'partner_type_id',
            'name',
            'uuid',
            'email',
            'banner',
            'banner_alt_text',
            'title',
            'description',
            'logo',
            'status',
        );

        // Define the search columns
        // $searchColumns = array(
        //     'blog_title',
        //     'details',
        // );

        // Build the DataTables response
        $data = DataTables::of(Partner::select($columns)->where('status', '=', 1))

            ->addColumn('serial', function ($row) {
                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('partner_type', function ($row) {
               return $row->partner_type->name;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('banner', function ($row) {
                return ($row->banner) ? '<img src="' . asset($row->banner) . '" alt="' . $row->banner_alt_text . '" class="w-50">' : '';
            })
            ->addColumn('logo', function ($row) {
                return ($row->logo) ? '<img src="' . asset($row->logo) . '" alt="' . $row->name . '" class="w-50">' : '';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.partners.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('description', function ($row) {
                return mb_strimwidth(strip_tags($row->description), 0, 50, "...");
            })

            ->rawColumns(['serial', 'action', 'description', 'banner', 'logo','status', 'partner_type'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }
}
