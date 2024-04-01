<?php

namespace App\Http\Controllers\Backend;


use App\Models\Member;
use App\Models\Research;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\MemberEdu;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
class MemberController extends Controller
{
    public function index(Request $request)
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        //dd($member_status);
        if($request->ajax())
        {
            $member = Member::with('research')->where('status',1)->get();
            return DataTables::of($member)
            ->editColumn('image',function($each){    
                return '<img src="'.asset("storage/memberimages/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
            })
            ->editColumn('research',function($each){   
                $researchList = ''; 
                foreach($each->research as $res)
                {
                    $researchList .= '<li>'.$res->description.'</li>';
                }
                return '<ul>'.$researchList.'</ul>';
            })
            ->addColumn('status', function($each) use ($status) {
                $statusKey = $each->status;

                // Check if the key exists before accessing it
                return array_key_exists($statusKey, $status) ? $status[$statusKey] : 'Unknown Status';
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.members.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $detail_icon = '<a href="'.route('admin.members.detail',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $resign_icon = '<a href="'.route('admin.formerMembers.edit',$each->id).'" class="btn btn-outline-danger"'.$each->id.'"><i class="fas fa-suitcase-rolling"></i>&nbsp;Transfer</a>';
                return '<div class="action-icon">' . $edit_icon . $detail_icon . $resign_icon . '</div>';
            })
            ->rawColumns(['image','status','research','action'])
            ->make(true);
        }
        return view('backend.members.index');
    }
    public function create()
    {
        return view('backend.members.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'education' => 'required|array',
            'education.*' => 'required|string',
            'about' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);


        $imagePath = $request->file('image')->store('public/memberimages');
        $imageName = basename($imagePath);

        $member_status = config('members.member_status.CurrentMember');

        $member = Member::create([
            'name' => $request['name'],
            'position' => $request['position'],
            'status' => $member_status,
            'about' => $request['about'],
            'facebook' => $request['facebook'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'image' => $imageName,
        ]);

        foreach($request->input('education') as $description)
        {
            MemberEdu::create([
                'member_id' => $member->id,
                'description' => $description,
            ]);
        }
        return redirect()->route('admin.members')->with('success','Member created successfully');
    }
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.members.edit',compact('member'));
    }
    public function detail($id)
    {
        $researches = Research::all();
        $member = Member::findOrFail($id);
        return view('backend.members.detail',compact('member','researches'));
    }
    public function update(Request $request,$id)
    {
        $member = Member::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'about' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'education' => 'required|array',
            'education.*' => 'required|string',
        ]);
        $member->name = $request->name;
        $member->position = $request->position;
        $member->about = $request->about;
        $member->facebook = $request->facebook;
        $member->instagram = $request->instagram;
        $member->twitter = $request->twitter;

        $member->memberedu()->delete(); // Remove existing researches

        foreach ($request->input('education') as $description) {
            $member->memberedu()->create([
                'description' => $description,
        ]);
        }
        if($request->file('image')){
            if($member->image){
                Storage::delete('public/memberimages/'.$member->image);
            }
            $imagePath = $request->file('image')->store('public/memberimages/');
            $imageName = basename($imagePath);

            $member->image = $imageName;
        }
        $member->save();
        return redirect('/admin/members')->with('update','Member Updated Successfully');
    }

    public function formermember_edit($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.members.edit-formermember',compact('member'));
    }
    public function formermember_update(Request $request,$id)
    {
        $member = Member::findOrFail($id);
        $request->validate([
            'position' => 'required'
        ]);
        $member_status = config('members.member_status.FormerMember');
        $member->update([
            'position' => $request['position'],
            'status' => $member_status,
        ]);
        //$member->delete();
        return redirect('/admin/former_members');

    }
    
}
