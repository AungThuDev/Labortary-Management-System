<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        //dd($request->all());
        if($request->ajax())
        {
            $user = User::query();
            return DataTables::of($user)
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.users.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.users.index');
    }
    public function create()
    {
        return view('backend.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect('/admin/users')->with('create','User Created Successfully');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            "name" => "required",
            "email" => "required",
            "old_password" => "required",
            "new_password" => "required",
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!Hash::check($request->old_password,$user->password)){
            return redirect()->route('users.edit',['id'=>$id])->with('error','Old Password is incorrect!');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect('/admin/users')->with('update','User Profile Updated Successfully');
    }
    public function destroy($id)
    {
       $user = User::findOrFail($id);
       $user->delete();

       return "success";
    }
}
