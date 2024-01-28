<?php

namespace App\Http\Controllers\Backend;

use App\Models\Talk;
use App\Models\Award;
use App\Models\Service;
use App\Models\Principle;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\Experimentation;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PrincipleController extends Controller
{
    public function index(Request $request)
    {
        $hasPrinciple = $this->hasPrinciple(); 
        if($request->ajax()){
            $principle = Principle::query();
            return DataTables::of($principle)
            ->editColumn('image',function($each){
                
                    return '<img src="'.asset("storage/principleimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
                
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.principles.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $detail_icon = '<a href="'.route('admin.principles.detail',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $detail_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('backend.principle.index',compact('hasPrinciple'));
    }
    public function create()
    { 
        return view('backend.principle.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'about' => 'required',
        ]);

        $imagePath = $request->file('image')->store('public/principleimages');
        $imageName = basename($imagePath);


        $member = Principle::create([
            'name' => $request['name'],
            'position' => $request['position'],
            'phone' => $request['phone'],
            "about" => $request['about'],
            'email' => $request['email'],
            'image' => $imageName,
        ]);

        foreach($request->input('qualifications') as $description)
        {
            Qualification::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        foreach($request->input('experimentations') as $description)
        {
            Experimentation::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        foreach($request->input('awards') as $description)
        {
            Award::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        foreach($request->input('associations') as $description)
        {
            Association::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        foreach($request->input('services') as $description)
        {
            Service::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        foreach($request->input('talks') as $description)
        {
            Talk::create([
                'principle_id' => $member->id,
                'description' => $description,
            ]);
        }
        return redirect()->route('admin.principles')->with('create','Principle Profile created successfully');
    }
    public function edit($id)
    {
        $principle = Principle::findOrFail($id);
        return view('backend.principle.edit',compact('principle'));
    }
    public function detail($id)
    {
        $principle = Principle::findOrFail($id);
        return view('backend.principle.detail',compact('principle'));
    }
    public function update(Request $request,$id)
    {
        $principle = Principle::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'about' => 'required',
            'email' => 'required',
            
        ]);
        $principle->name = $request->name;
        $principle->position = $request->position;
        $principle->phone = $request->phone;
        $principle->about = $request->about;
        $principle->email = $request->email;

        $principle->qualifications()->delete(); // Remove existing researches

        foreach ($request->input('qualifications') as $description) {
            $principle->qualifications()->create([
                'description' => $description,
        ]);
        }

        $principle->experimentations()->delete(); // Remove existing researches

        foreach ($request->input('experimentations') as $description) {
            $principle->experimentations()->create([
                'description' => $description,
        ]);
        }

        $principle->awards()->delete(); // Remove existing researches

        foreach ($request->input('awards') as $description) {
            $principle->awards()->create([
                'description' => $description,
        ]);
        }

        $principle->associations()->delete(); // Remove existing researches

        foreach ($request->input('associations') as $description) {
            $principle->associations()->create([
                'description' => $description,
        ]);
        }

        $principle->services()->delete(); // Remove existing researches

        foreach ($request->input('services') as $description) {
            $principle->services()->create([
                'description' => $description,
        ]);
        }

        $principle->talks()->delete(); // Remove existing researches

        foreach ($request->input('talks') as $description) {
            $principle->talks()->create([
                'description' => $description,
        ]);
        }

        if($request->file('image')){
            if($principle->image){
                Storage::delete('public/principleimages/'.$principle->image);
            }
            $imagePath = $request->file('image')->store('public/principleimages/');
            $imageName = basename($imagePath);

            $principle->image = $imageName;
        }

        $principle->save();
        return redirect('/admin/principles')->with('update','Principle Profile Updated Successfully');
    }

    public function destroy($id)
    {
        $principle = Principle::findOrFail($id);
        if ($principle->image) {
            Storage::delete('public/principleimages/' . $principle->image);
        }
        $principle->delete();
        return 'success';
    }
    private function hasPrinciple()
    {
        return Principle::count() === 0;
    }
}
