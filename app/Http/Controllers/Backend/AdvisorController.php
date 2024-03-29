<?php

namespace App\Http\Controllers\Backend;

use App\Models\Advisor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvisorController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax()){
            $advisor = Advisor::query();
            return DataTables::of($advisor)
            ->editColumn('image',function($each){     
                    return '<img src="'.asset("storage/advisorimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.advisors.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';
                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('backend.advisors.index');
    }
    public function create()
    {
        return view('backend.advisors.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            "name" => "required|string|max:255",
            "role" => "required|string|max:255",
            "link" => "required",
            "department" => "required",
            "university" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
        ]);

        $imagePath = $request->file('image')->store('public/advisorimages');
        $imageName = basename($imagePath);

        Advisor::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'link' => $request['link'],
            'department' => $request['department'],
            'university' => $request['university'],
            'image' => $imageName,
        ]);

        return redirect('/admin/advisors')->with('create','Advisor Profile Created Successfully');
    }
    public function edit($id)
    {
        $advisor = Advisor::findOrFail($id);
        return view('backend.advisors.edit',compact('advisor'));
    }
    public function update(Request $request,$id)
    {
        $advisor = Advisor::findOrFail($id);
        $request->validate([
            "name" => "required|string|max:255",
            "role" => "required|string|max:255",
            "link" => "required",
            "department" => "required",
            "university" => "required",
        ]);
        $advisor->name = $request->name;
        $advisor->role = $request->role;
        $advisor->link = $request->link;
        $advisor->department = $request->department;
        $advisor->university = $request->university;
        if($request->file('image')){
            if($advisor->image){
                Storage::delete('public/advisorimages/'.$advisor->image);
            }
            $imagePath = $request->file('image')->store('public/advisorimages/');
            $imageName = basename($imagePath);

            $advisor->image = $imageName;
        }
        $advisor->save();
        return redirect('/admin/advisors')->with('update','Advisor Profile Updated Successfully');
    }
    public function destroy($id)
    {
        $advisor = Advisor::findOrFail($id);
        if($advisor->image)
        {
            Storage::delete('public/advisorimages/' . $advisor->image);
        }
        $advisor->delete();
        return 'success';
    }
}
