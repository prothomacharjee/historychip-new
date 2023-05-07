<?php

namespace App\Http\Controllers;

use App\Models\PartnerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PartnerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.partner-types.index')->with([
            'page_title' => 'Partner Type',
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
            "bill" => "required",
            "bill_type" => "required",
            "max_image_count" => "required",
            "max_content_length" => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator);
        } else {
            if ($request->id) {
                try {
                    $partnerType = PartnerType::findOrFail($request->id);
                    DB::transaction(function () use ($input, $partnerType) {
                        $partnerType->update($input);
                    });
                    return redirect()->route('admin.partner-types')->with('success', 'Partner Type Updated Successfully');
                } catch (\Exception$e) {

                    return redirect()->back()->with('error', $e->getMessage());
                }
            } else {
                try {
                    DB::transaction(function () use ($input) {
                        PartnerType::create($input);
                    });
                    return redirect()->route('admin.partner-types')->with('success', 'Partner Type Created Successfully');
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
            $partnerType = PartnerType::findOrFail($id);
            DB::transaction(function () use ($partnerType) {
                $partnerType->delete();
            });
            return redirect()->route('admin.partner-types')->with('success', 'Partner Type Deleted Successfully');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadPartnerTypeDataTable(Request $request)
    {
        $url = 'partner-types';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'bill',
            'bill_type',
            'max_image_count',
            'max_content_length',
            'max_content_length',
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
        $data = DataTables::of(PartnerType::select($columns))
            ->addColumn('status', function ($row) {
                return ($row->status == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) use($url) {
                $buttons = '<button type="button" class="edit btn btn-outline-primary btn-sm me-2" onclick="editFunc(' . $row->id . ')" title="Edit"><i class="fadeInUp animate__animated bx bx-edit-alt"></i></button>';
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function('.$row->id.', \''.$url.'\')" title="Delete"><i class="fadeInUp animate__animated bx bx-trash-alt"></i></button>';

                return $buttons;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

    public function FetchPartnerTypeDataById(Request $request)
    {
        if ($request->id) {
            $data = PartnerType::findOrFail($request->id);
            echo json_encode($data);
        }
    }
}
