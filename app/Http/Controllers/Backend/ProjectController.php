<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $project = Project::query();
            return DataTables::of($project)
            ->editColumn('image',function($each){
                
                    return '<img src="'.asset("storage/projectimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
                
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.projects.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('backend.projects.index');
    }
    public function create()
    {
        return view('backend.projects.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
        ]);

        $imagePath = $request->file('image')->store('public/projectimages');
        $imageName = basename($imagePath);

        Project::create([
            'name' => $request['name'],
            'image' => $imageName,
        ]);

        return redirect('/admin/projects')->with('create','Photo Created Successfully');
    }
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.edit',compact('project'));
    }
    public function update(Request $request,$id)
    {
        $project = Project::findOrFail($id);
        $request->validate([
            "name" => "required",
        ]);
        $project->name = $request->name;
        if($request->file('image')){
            if($project->image){
                Storage::delete('public/projectimages/'.$project->image);
            }
            $imagePath = $request->file('image')->store('public/projectimages/');
            $imageName = basename($imagePath);

            $project->image = $imageName;
        }
        $project->save();
        return redirect('/admin/projects')->with('update','Photo Updated Successfully');
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image) {
            Storage::delete('public/projectimages/' . $project->image);
        }
        $project->delete();
        return 'success';
    }
}
