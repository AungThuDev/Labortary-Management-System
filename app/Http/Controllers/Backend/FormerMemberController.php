<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class FormerMemberController extends Controller
{
    public function index(Request $request)
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        if($request->ajax())
        {
            $member = Member::with('research')->where('status',2)->get();
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
                $detail_icon = '<a href="'.route('admin.former.detail',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';
                
                return '<div class="action-icon">' . $detail_icon.$delete_icon . '</div>';
            })
            ->rawColumns(['image','status','research','action'])
            ->make(true);
        }
        return view('backend.members.formermember');
    }
    public function detail($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.members.formerdetail',compact('member'));
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        if ($member->image) {
            Storage::delete('public/memberimages/' . $member->image);
        }
        return 'success';
    }
    
}
