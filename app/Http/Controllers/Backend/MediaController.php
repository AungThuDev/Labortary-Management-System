<?php

namespace App\Http\Controllers\Backend;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $project = Media::query();
            return DataTables::of($project)
            ->editColumn('image',function($each){
                
                    return '<img src="'.asset("storage/newsimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
                
            })->editColumn('created_at',function($each){
                return Carbon::parse($each->created_at)->format('l-M-Y');
            })
            
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.news.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $detail_icon = '<a href="'.route('admin.news.show',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $detail_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('backend.media.index');
    }
    public function create()
    {
        return view('backend.media.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('image')->store('public/newsimages');
        $imageName = basename($imagePath);

        Media::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $imageName,
        ]);

        return redirect('/admin/news')->with('create','News Created Successfully');
    }
    public function show($id)
    {
        $media = Media::FindOrFail($id);
        return view('backend.media.show',compact('media'));
    }
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('backend.media.edit',compact('media'));
    }
    public function update(Request $request,$id)
    {
        $media = Media::findOrFail($id);
        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);
        $media->title = $request->title;
        $media->description = $request->description;
        if($request->file('image')){
            if($media->image){
                Storage::delete('public/newsimages/'.$media->image);
            }
            $imagePath = $request->file('image')->store('public/newsimages/');
            $imageName = basename($imagePath);

            $media->image = $imageName;
        }
        $media->save();
        return redirect('/admin/news')->with('update','News Updated Successfully');
    }
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        if ($media->image) {
            Storage::delete('public/newsimages/' . $media->image);
        }
        $media->delete();
        return 'success';
    }
}
