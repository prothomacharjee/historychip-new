<?php

namespace App\Http\Controllers;

use App\Helpers\SoftSourceHelper;
use App\Models\WritingPrompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WritingPromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.writing-prompts.index')->with([
            'page_title' => 'Writing Prompts',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uniquevalidation = $request->id ? $request->id : '';

        $validator = Validator::make($request->except(['_token']), [
            "title" => "required|unique:writing_prompts,title," . $uniquevalidation,
            "details" => "required",
            "status" => "required",
            'icon' => 'nullable|file|image|mimes:jpeg,png,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $writingPrompt = $request->id ? WritingPrompt::findOrFail($request->id) : new WritingPrompt;
            $returnText = $request->id ? 'Updated' : 'Created';

            $writingPrompt->title = $request->title;
            $writingPrompt->details = $request->details;
            $writingPrompt->status = $request->status;

            if ($request->hasFile('icon')) {
                $writingPrompt->icon = SoftSourceHelper::FileUploaderHelper($request->icon, 'backend/writingtips/');
            }

            try {
                DB::transaction(function () use ($writingPrompt) {
                    $writingPrompt->save();
                });
                return redirect()->route('admin.writing-prompts')->with('success', "Writing Prompt $returnText Successfully");
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
            $writing_prompt = WritingPrompt::findOrFail($id);
            DB::transaction(function () use ($writing_prompt) {
                $writing_prompt->delete();
            });
            return redirect()->route('writing-prompts')->with('success', 'Writing Prompt Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadWritingPromptDataTable(Request $request)
    {
        $url = 'writing-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'title',
            'details',
            'icon',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'title',
            'details',
        );

        // Build the DataTables response
        $data = DataTables::of(WritingPrompt::select($columns)->latest())
            ->addColumn('serial', '')
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('icon', function ($row) {
                return ($row->icon) ? '<img src="' . asset($row->icon) . '" alt="' . $row->title . '" class="rounded-circle" style="height:50px; width:50px">' : '';
            })
            ->addColumn('action', function ($row) use ($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function(' . $row->id . ', \'' . $url . '\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('details', function ($row) {
                $return = mb_strimwidth($row->details, 0, 15, "...");
                return $return;
            })
            ->rawColumns(['serial', 'status', 'action', 'details', 'icon'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function FetchWritingPromptDataById(Request $request)
    {
        if ($request->id) {
            $data = WritingPrompt::findOrFail($request->id);
            echo json_encode($data);
        }
    }

    public function getwritingprompts()
    {
        $writingprompt = Writingprompt::where('status', 1)->get();
        return response()->json(array('writingprompt' => $writingprompt), 200);
    }
}
