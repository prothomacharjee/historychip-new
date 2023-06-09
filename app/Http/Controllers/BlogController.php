<?php

namespace App\Http\Controllers;

use App\Helpers\SoftSourceHelper;
use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.blogs.index')->with([
            'page_title' => 'Blogs',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blogs.create')->with([
            'page_title' => 'Create Blog',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('blog_banner'));
        $req_blog = $request->blog;
        $req_meta = $request->meta;

        //dd($req_blog);

        $uniquevalidation = $req_blog['id'] ? $req_blog['id'] : '';

        $validator = Validator::make($req_blog, [
            "blog_title" => "required|unique:blogs,blog_title," . $uniquevalidation,
            "blog_description" => "required",
            "blog_date" => "required",
            "status" => "required",
            'blog_banner' => 'file|max:2048|mimes:jpeg,png,svg,webp',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $blog = $req_blog['id'] ? Blog::findOrFail($req_blog['id']) : new Blog;

            $meta = $req_blog['id'] ? Page::where('page_group', 'blog')->where('page_group_id', $req_blog['id'])->first() : new Page;

            $returnText = $req_blog['id'] ? 'Updated' : 'Saved';

            $blog->blog_title = trim($req_blog['blog_title']);
            $blog->blog_description = trim($req_blog['blog_description']);
            $blog->blog_date = trim($req_blog['blog_date']);
            $blog->blog_banner_alt_text = trim($req_blog['blog_banner_alt_text']);
            $blog->status = trim($req_blog['status']);
            $blog->is_draft = trim($req_blog['is_draft']);

            if ($req_blog['is_draft'] == 1) {
                $blog->is_featured = 0;
            } else {
                $blog->is_featured = trim($req_blog['is_featured']);
            }

            if ($req_blog['id']) {
                $blog->updated_by = Auth::guard('admin')->id();
            } else {
                $blog->created_by = Auth::guard('admin')->id();
            }

            $meta->name = trim("blogs." . lcfirst(str_replace(' ', '', ucwords($req_blog['blog_title']))));
            $meta->url = trim("/blogs/" . Str::slug($req_blog['blog_title']));
            $meta->page_title = trim($req_blog['blog_title']);
            $meta->page_group = trim('blog');
            $meta->meta_title = trim($req_meta['meta_title']);
            $meta->meta_keywords = trim($req_meta['meta_keywords']);
            $meta->meta_description = trim($req_meta['meta_description']);
            $meta->og_author = Auth::guard('admin')->user()->name;
            $meta->status = trim($req_blog['status']);

            if ($request->hasFile('blog_banner')) {
                $blog->blog_banner = SoftSourceHelper::FileUploaderHelper($request->blog_banner, 'backend/blogs/');
            }

            try {
                DB::transaction(function () use ($blog, $meta) {
                    $blog->save();
                    $meta->page_group_id = $blog->id;
                    $meta->save();
                });
                return redirect()->route('admin.blogs')->with('success', "Blog $returnText Successfully");
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $meta = Page::where('page_group', 'blog')->where('page_group_id', $id)->first();

        return view('backend.blogs.create')->with([
            'page_title' => 'Edit Blog',
            'blog' => $blog,
            'meta' => $meta,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            DB::transaction(function () use ($blog) {
                $blog->delete();
            });
            return redirect()->route('admin.blogs')->with('success', 'Blogs Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadRegularBlogDataTable(Request $request)
    {
        $url = 'blogs';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'blog_title',
            'blog_description',
            'blog_date',
            'blog_banner',
            'status',
        );

        // Define the search columns
        // $searchColumns = array(
        //     'blog_title',
        //     'details',
        // );

        // Build the DataTables response
        $data = DataTables::of(Blog::select($columns)->where('is_featured', '!=', 1)->Where('is_draft', '!=', 1)->latest())
            ->addColumn('serial', '')
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('blog_banner', function ($row) {
                return ($row->blog_banner) ? '<img src="' . asset($row->blog_banner) . '" alt="' . $row->blog_banner_alt_text . '" class="w-50">' : '';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<a href="' . route('admin.blogs.feature', ['id' => $row->id, 'status' => 1]) . '" data-toggle="tooltip" title="Feature" class="edit btn btn-outline-warning btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('blog_description', function ($row) {
                $return = mb_strimwidth(strip_tags($row->blog_description), 0, 50, "...");
                return $return;
            })

            ->rawColumns(['serial', 'action', 'blog_description', 'blog_banner'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadFeaturedBlogDataTable(Request $request)
    {
        $url = 'blogs';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'blog_title',
            'blog_description',
            'blog_date',
            'blog_banner',
            'status',
        );

        // Define the search columns
        // $searchColumns = array(
        //     'blog_title',
        //     'details',
        // );

        // Build the DataTables response
        $data = DataTables::of(Blog::select($columns)->where('is_featured', 1)->latest())
            ->addColumn('serial', '')
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('blog_banner', function ($row) {
                return ($row->blog_banner) ? '<img src="' . asset($row->blog_banner) . '" alt="' . $row->blog_banner_alt_text . '" class="w-50">' : '';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<a href="' . route('admin.blogs.feature', ['id' => $row->id, 'status' => 0]) . '" data-toggle="tooltip" title="Un Feature" class="edit btn btn-outline-warning btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('blog_description', function ($row) {
                return mb_strimwidth(strip_tags($row->blog_description), 0, 50, "...");
            })
            ->rawColumns(['serial', 'status', 'action', 'blog_description', 'blog_banner'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadDraftedBlogDataTable(Request $request)
    {
        $url = 'blogs';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'blog_title',
            'blog_description',
            'blog_date',
            'blog_banner',
            'status',
        );

        // Define the search columns
        // $searchColumns = array(
        //     'blog_title',
        //     'details',
        // );

        // Build the DataTables response
        $data = DataTables::of(Blog::select($columns)->where('is_draft', 1)->latest())
            ->addColumn('serial', '')
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('blog_banner', function ($row) {
                return ($row->blog_banner) ? '<img src="' . asset($row->blog_banner) . '" alt="' . $row->blog_banner_alt_text . '" class="w-50">' : '';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<a href="' . route('admin.blogs.edit', $row->id) . '" data-toggle="tooltip" title="Edit" class="edit btn btn-outline-primary btn-sm me-2"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></a>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('blog_description', function ($row) {
                return mb_strimwidth(strip_tags($row->blog_description), 0, 50, "...");
            })
            ->rawColumns(['serial', 'status', 'action', 'blog_description', 'blog_banner'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function ChangeBlogFeatureStatus($id, $status)
    {
        $count = Blog::where('is_featured', 1)->count();
        if ($count <= 3) {

            $returnText = ($status == 1) ? 'Featured' : 'Un-Featured';
            try {
                DB::transaction(function () use ($id, $status) {
                    $blog = Blog::findOrFail($id);
                    $blog->is_featured = $status;
                    $blog->update();
                });
                return redirect()->route('admin.blogs')->with('success', "Blog $returnText Successfully");
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('admin.blogs')->with('info', "Already Three Featured Blog Existed");
        }
    }
}
