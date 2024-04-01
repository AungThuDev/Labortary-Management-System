<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $subject = Subject::query();
            return DataTables::of($subject)
            // ->editColumn('image',function($each){
                
            //         return '<img src="'.asset("storage/subjectimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
                
            // })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.subjects.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $detail_icon = '<a href="'.route('admin.subjects.show',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $detail_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.subjects.index');
    }
    public function create()
    {
        return view('backend.subjects.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "course_name" => "required",
            "room" => "required",
            "instructor_name" => "required",
            "instructor_email" => "required",
            "start_date" => "required",
            "end_date" => "required|after:start_date",
            "time" => "required",
            "web_page" => "required",
            "instructor_office" => "required",
            "office_hour" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);
        $imagePath = $request->file('image')->store('public/subjectimages');
        $imageName = basename($imagePath);

        Subject::create([
            "course_name" => $request['course_name'],
            "room" => $request['room'],
            "instructor_name" => $request['instructor_name'],
            "instructor_email" => $request['instructor_email'],
            "start_date" => $request['start_date'],
            "end_date" => $request['end_date'],
            "time" => $request['time'],
            "web_page" => $request['web_page'],
            "instructor_office" => $request['instructor_office'],
            "office_hour" => $request['office_hour'],
            "image" => $imageName,
        ]);
        return redirect('/admin/subjects')->with('create','Subject Created Successfully');
    }
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('backend.subjects.show',compact('subject'));
    }
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('backend.subjects.edit',compact('subject'));
    }
    public function update(Request $request,$id)
    {
        $subject = Subject::findOrFail($id);
        $request->validate([
            "course_name" => "required",
            "room" => "required",
            "instructor_name" => "required",
            "instructor_email" => "required",
            "start_date" => "required",
            "end_date" => "required|after:start_date",
            "time" => "required",
            "web_page" => "required",
            "office_hour" => "required",
            "instructor_office" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $subject->course_name = $request->course_name;
        $subject->room = $request->room;
        $subject->instructor_name = $request->instructor_name;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->time = $request->time;
        $subject->office_hour = $request->office_hour;
        $subject->instructor_email = $request->instructor_email;
        $subject->instructor_office = $request->instructor_office;
        $subject->web_page = $request->web_page;
        if($request->file('image')){
            if($subject->image){
                Storage::delete('public/subjectimages/'.$subject->image);
            }
            $imagePath = $request->file('image')->store('public/subjectimages/');
            $imageName = basename($imagePath);

            $subject->image = $imageName;
        }
        $subject->save();
        return redirect('/admin/subjects')->with('update','Subject Updated Successfully');
    }
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        if ($subject->image) {
            Storage::delete('public/subjectimages/' . $subject->image);
        }
        $subject->delete();
        return 'success';
    }
}
