<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $publications = Publication::with('authors')->get();
            return DataTables::of($publications)
          
            ->editColumn('author',function($each){   
                $authorList = ''; 
                foreach($each->authors as $res)
                {
                    $authorList .= '<li>'.$res->author_name.'</li>';
                }
                return '<ul>'.$authorList.'</ul>';
            })
            ->editColumn('author_link',function($each){   
                $authorList = ''; 
                foreach($each->authors as $res)
                {
                    $authorList .= '<li>'.$res->author_link.'</li>';
                }
                return '<ul>'.$authorList.'</ul>';
            })
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.publications.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['author','author_link','action'])
            ->make(true);
        }
        return view('backend.publications.index');
    }
    public function create()
    {
        return view('backend.publications.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_link' => 'required',
            'journal' => 'required',
            'journal_link' => 'required',
            
            'author_name' => 'required|array',
            'author_name.*' => 'required|string',  
            'author_link' => 'required|array',
            'author_link.*' => 'required|string',  
        ]);
        $publication = Publication::create([
            'name' => $request['name'],
            'name_link' => $request['name_link'],
            'journal' => $request['journal'],
            'journal_link' => $request['journal_link'],
        ]);

        foreach ($request->input('author_name') as $index => $authorName) {
            Author::create([
                'publication_id' => $publication->id,
                'author_name' => $authorName,
                'author_link' => $request->input('author_link')[$index],
            ]);
        }
        return redirect()->route('admin.publications')->with('create','Publication created successfully');
    }
    public function edit($id)
    {
        $publication = Publication::with('authors')->find($id);
        return view('backend.publications.edit',compact('publication'));
    }
    public function update(Request $request,$id)
    {
        $publication = Publication::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'name_link' => 'required',
            'journal' => 'required',
            'journal_link' => 'required',
            'author_name' => 'required|array',
            'author_name.*' => 'required|string',  
            'author_link' => 'required|array',
            'author_link.*' => 'required|string',  
        ]);
        $publication->name = $request->name;
        $publication->name_link = $request->name_link;
        $publication->journal = $request->journal;
        $publication->journal_link = $request->journal_link;

        $publication->authors()->delete();

        foreach ($request->input('author_name') as $index => $authorName) {
            $publication->authors()->create([
                'author_name' => $authorName,
                'author_link' => $request->input('author_link')[$index],
        ]);
        }
        $publication->save();
        return redirect('/admin/publications')->with('update','Publication Profile Updated Successfully');
    }
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        if ($publication->image) {
            Storage::delete('public/publicationimages/' . $publication->image);
        }
        $publication->delete();
        return 'success';
    }
}
