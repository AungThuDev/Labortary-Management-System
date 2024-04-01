<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Image;
use App\Models\Media;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
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
                
            })->editColumn('date',function($each){
                return Carbon::parse($each->date)->format('Y-m-d');
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
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        'images.*' => 'required|image', // Validation for each image in the array
    ]);

    $imagePath = $request->file('image')->store('public/newsimages');
    $imageName = basename($imagePath);

    $media = Media::create([
        'title' => $request['title'],
        'description' => $request['description'],
        'date' => $request['date'],
        'image' => $imageName,
    ]);

    
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            
            $imagePath = $image->store('public/newsimages');
            $imageName = basename($imagePath);
            Image::create([
                'media_id' => $media->id,
                'photo' => $imageName, // Corrected column name
            ]);
        }
    }

    return redirect('/admin/news')->with('create', 'News Created Successfully');
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
            "date" => "required|date",
        ]);
        $media->title = $request->title;
        $media->description = $request->description;
        $media->date = $request->date;
        if($request->file('image')){
            if($media->image){
                Storage::delete('public/newsimages/'.$media->image);
            }
            $imagePath = $request->file('image')->store('public/newsimages/');
            $imageName = basename($imagePath);

            $media->image = $imageName;
        }
        if($request->file('images')){
            foreach($request->file('images') as $image){
                $imagePath = $image->store('public/newsimages');
                $imageName = basename($imagePath);
                Image::create([
                    'media_id' => $media->id,
                    'photo' => $imageName, // Corrected column name
                ]);
            }
        }
        $imagesArray = $request->except('title', 'description','date', 'image', '_token', '_method','images','deleted_images');
        //dd($imagesArray);

        if (count($imagesArray)>0) {
            
            foreach ($imagesArray as $id => $image) {
                $i = Image::findOrFail($id);  
                $imagePath = Storage::delete('public/newsimages/'.$i->photo);
                $i->update([
                    'photo' => basename($image->store('public/newsimages'))
                ]);
            }
        }
        
        if($request['deleted_images']){
            
            foreach($request['deleted_images'] as $delete){
                $deleted_image = Image::findOrFail($delete);

                
                $d = Storage::delete('public/newsimages/'.$deleted_image['photo']);
                $deleted_image->delete();
                
            }
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
