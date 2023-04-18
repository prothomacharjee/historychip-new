<?php

namespace App\Http\Controllers;

use App\Models\NoticePrompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class NoticePromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.notice-prompts.index')->with([
            'page_title' => 'Notice Prompts',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->except(['files','_token']);
        $validator = Validator::make($input, [
            "name" => "required",
            "content" => "required|min:3|max:191",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator);
        } else {
            if ($request->id) {
                try {
                    $notice_prompt = NoticePrompt::findOrFail($request->id);
                    DB::transaction(function () use ($input, $notice_prompt) {
                        $notice_prompt->update($input);
                    });
                    return redirect()->route('notice-prompts')->with('success', 'Notice Prompt Updated Successfully');
                } catch (\Exception$e) {

                    return redirect()->back()->with('error', $e->getMessage());
                }
            } else {
                try {
                    DB::transaction(function () use ($input) {
                        NoticePrompt::create($input);
                    });
                    return redirect()->route('notice-prompts')->with('success', 'Notice Prompt Created Successfully');
                } catch (\Exception$e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $notice_prompt = NoticePrompt::findOrFail($id);
            DB::transaction(function () use ($notice_prompt) {
                $notice_prompt->delete();
            });
            return redirect()->route('notice-prompts')->with('success', 'Notice Prompt Deleted Successfully');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadNoticePromptDataTable(Request $request)
    {
        $url = 'notice-prompts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'content',
            'duration_from',
            'duration_to',
            'status',
        );

        // Define the search columns
        $searchColumns = array(
            'name',
            'content',
            'duration_from',
            'duration_to',
        );

        // Build the DataTables response
        $data = DataTables::of(NoticePrompt::select($columns)->where('status', 1))
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeIn animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function('.$row->id.', \''.$url.'\')" title="Delete"><i class="fadeIn animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->addColumn('content', function ($row) {
                return mb_strimwidth($row->content, 0, 15, "...");
            })
            ->editColumn('duration_from', function ($row) {
                return ($row->duration_from) ? date('Y-m-d H:i', strtotime($row->duration_from)) : '';
            })
            ->editColumn('duration_to', function ($row) {
                return ($row->duration_to) ? date('Y-m-d H:i', strtotime($row->duration_to)) : '';
            })
        // ->filter(function ($query) use ($request, $searchColumns) {
        //     if ($request->has('search')) {
        //         $search = $request->search['value'];
        //         $query->where(function ($query) use ($search, $searchColumns) {
        //             foreach ($searchColumns as $column) {
        //                 $query->orWhere($column, 'like', '%' . $search . '%');
        //             }
        //         });
        //     }
        // })
            ->rawColumns(['status', 'action', 'content'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function FetchNoticePromptDataById(Request $request)
    {
        if ($request->id) {
            $data = NoticePrompt::findOrFail($request->id);
            echo json_encode($data);
        }
    }

}
