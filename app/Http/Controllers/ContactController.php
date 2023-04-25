<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contacts.index')->with([
            'page_title' => 'Contacts',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function reply($id)
    {
        $contact = Contact::findOrFail($id);
        if($contact['is_replied']==0){
            return view('backend.contacts.reply')->with([
                'page_title' => 'Reply',
                'contact' => $contact,
            ]);
        }
        else{
            return redirect()->route('contacts')->with('info', 'Already Replied');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function send(Request $request)
    {
        $input = $request->except(['_token', 'files']);
        $validator = Validator::make($input, [
            "id" => "required",
            "replied_message" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator);
        } else {
            if ($request->id) {
                try {
                    $contact = Contact::findOrFail($request->id);
                    $contact['replied_message'] = $input['replied_message'];
                    $contact['replied_at'] = Carbon::now();
                    $contact['replied_by'] = 1;  //Auth::id();
                    $contact['is_read'] = 1;  //Auth::id();
                    $contact['is_replied'] = 1;  //Auth::id();

                    DB::transaction(function () use ($contact) {
                        $contact->save();
                    });
                    return redirect()->route('contacts')->with('success', 'Replied Successfully');
                } catch (\Exception$e) {

                    return redirect()->back()->with('error', $e->getMessage());
                }
            } else {
                return redirect()->back()->with('error', "Something Occured. Please Refresh your page and try later.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            DB::transaction(function () use ($contact) {
                $contact->delete();
            });
            return redirect()->route('contacts')->with('success', 'Contact Deleted Successfully');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function LoadContactDataTable(Request $request)
    {
        $url = 'contacts';
        // Define the columns to be fetched
        $columns = array(
            'id',
            'name',
            'email',
            'created_at',
            'message',
            'is_read',
            'is_replied',
            'replied_message',
            'replied_at',
            'replied_by',
        );

       // Build the DataTables response
        $data = DataTables::of(Contact::select($columns))
            ->addColumn('action', function ($row) use($url) {
                $buttons = '';
                if($row->is_replied==0){
                    $buttons = '<a href="'.route("admin.contacts.reply", ["id" => $row->id]).'" class="btn btn-outline-info btn-sm me-2" title="Reply"><i class="fadeIn animated bx bx-reply"></i></a>';
                }
                $buttons .= '<button type="button" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_modal"  onclick="remove_function('.$row->id.', \''.$url.'\')" title="Delete"><i class="bx bx-trash-alt"></i></button>';
                return $buttons;
            })
            ->editColumn('created_at', function ($row) {
                return ($row->created_at) ? date('Y-m-d H:i', strtotime($row->created_at)) : '';
            })
            ->editColumn('replied_at', function ($row) {
                return ($row->replied_at) ? date('Y-m-d H:i', strtotime($row->replied_at)) : '';
            })
            ->addColumn('replied_message', function ($row) {
                return $row->replied_message;
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
            ->rawColumns(['action','replied_message'])
            ->make(true);

        // Return the DataTables response
        return $data;
    }

}
