<?php

namespace App\Http\Controllers\Backend;

use App\Models\Member;
use App\Models\Research;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $research = Research::with('member')->get();
            return DataTables::of($research)
                ->editColumn('image', function ($each) {
                    return '<img src="' . asset("storage/research/" . $each->image) . '" class="img-thumbnail" width="100" height="100"/>';
                })
                ->editColumn('member_id', function ($each) {
                    return $each->member->name;
                })
                ->addColumn('action', function ($each) {
                    $edit_icon = '<a href="' . route('admin.researches.edit', $each->id) . '" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                    $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "' . $each->id . '"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                    return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('backend.researches.index');
    }
    public function create()
    {
        $members = Member::all();
        return view('backend.researches.create', compact('members'));
    }
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|string|max:255",
            "member_id" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
        ]);

        $imagePath = $request->file('image')->store('public/research');
        $imageName = basename($imagePath);

        Research::create([
            'name' => $request['name'],
            'member_id' => $request['member_id'],
            'image' => $imageName,
        ]);

        return redirect('/admin/researches')->with('create', 'Research Created Successfully');
    }
    public function edit($id)
    {
        $members = Member::all();
        $research = Research::findOrFail($id);
        return view('backend.researches.edit',compact('research','members'));
    }
    public function update($id,Request $request)
    {
        $research = Research::findOrFail($id);
        $request->validate([
            "name" => "required",
            "member_id" => "required",
        ]);
        $research->name = $request->name;
        $research->member_id = $request->member_id;
         if($request->file('image')){
            if($research->image){
                Storage::delete('public/reserach/'.$research->image);
            }
            $imagePath = $request->file('image')->store('public/research/');
            $imageName = basename($imagePath);

            $research->image = $imageName;
        }
        $research->save();
        return redirect('/admin/researches')->with('update','Research Updated Successfully');
    }
    public function destroy($id)
    {
        $research = Research::findOrFail($id);
        if ($research->image) {
            Storage::delete('public/research/' . $research->image);
        }
        $research->delete();
        return 'success';
    }
}
