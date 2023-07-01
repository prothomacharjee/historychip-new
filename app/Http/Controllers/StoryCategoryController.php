<?php

namespace App\Http\Controllers;

use App\Models\StoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $x = StoryCategory::with('parent_category')->get();
        // dd($x);
        return view('backend.story-categories.index')->with([
            'page_title' => 'Story Categories',
        ]);
    }

    public function store(Request $request)
    {
        $uniquevalidation = $request->id ? $request->id : '';

        $validator = Validator::make($request->except(['_token']), [
            "name" => "required|unique:story_categories,name," . $uniquevalidation,

            "level" => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $story_category = $request->id ? StoryCategory::findOrFail($request->id) : new StoryCategory;
            $returnText = $request->id ? 'Updated' : 'Created';

            $story_category->name = $request->name;
            $story_category->description = $request->description;
            $story_category->level = $request->level;
            $story_category->parent_id = $request->parent_id;
            $story_category->status = $request->status;

            try {
                DB::transaction(function () use ($story_category) {
                    $story_category->save();
                });
                return redirect()->route('admin.story-categories')->with('success', "Story Category $returnText Successfully");
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $notice_prompt = StoryCategory::findOrFail($id);
            DB::transaction(function () use ($notice_prompt) {
                $notice_prompt->delete();
            });
            return redirect()->route('admin.notice-prompts')->with('success', 'Notice Prompt Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadStoryCategoryDataTable(Request $request)
    {
        $url = 'notice-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(StoryCategory::with('parent_category')->where('level', 0)->select($columns)->latest())
            ->addColumn('serial', function ($row) {

                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('description', function ($row) {
                return mb_strimwidth($row->content, 0, 15, "...");
            })
            ->addColumn('parent', function ($row) {

                return $row->parent_category->name ?? '';
            })

            ->rawColumns(['serial', 'status', 'action', 'description', 'parent'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadStoryLevel1CategoryDataTable(Request $request)
    {
        $url = 'notice-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(StoryCategory::with('parent_category')->where('level', 1)->select($columns)->latest())
            ->addColumn('serial', function ($row) {

                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('description', function ($row) {
                return mb_strimwidth($row->content, 0, 15, "...");
            })
            ->addColumn('parent', function ($row) {

                return $row->parent_category->name ?? '';
            })

            ->rawColumns(['serial', 'status', 'action', 'description', 'parent'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadStoryLevel2CategoryDataTable(Request $request)
    {
        $url = 'notice-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(StoryCategory::with('parent_category')->where('level', 2)->select($columns)->latest())
            ->addColumn('serial', function ($row) {

                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('description', function ($row) {
                return mb_strimwidth($row->content, 0, 15, "...");
            })
            ->addColumn('parent', function ($row) {

                return $row->parent_category->name ?? '';
            })

            ->rawColumns(['serial', 'status', 'action', 'description', 'parent'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function LoadStoryLevel3CategoryDataTable(Request $request)
    {
        $url = 'notice-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'name',
            'description',
            'level',
            'parent_id',
            'status',
        );

        // Build the DataTables response
        $data = DataTables::of(StoryCategory::with('parent_category')->where('level', 3)->select($columns)->latest())
            ->addColumn('serial', function ($row) {

                static $count = 0;
                $count++;
                return $count;
            })
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('description', function ($row) {
                return mb_strimwidth($row->content, 0, 15, "...");
            })
            ->addColumn('parent', function ($row) {

                return $row->parent_category->name ?? '';
            })

            ->rawColumns(['serial', 'status', 'action', 'description', 'parent'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function FetchStoryCategoryDataById(Request $request)
    {
        if ($request->id) {
            $data = StoryCategory::findOrFail($request->id);
            echo json_encode($data);
        }
    }

    public function FetchStoryCategoryDataByLevel(Request $request)
    {
        $data = StoryCategory::where('level', $request->level)->get();
        echo json_encode($data);
    }


}
