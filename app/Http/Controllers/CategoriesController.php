<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $all=Categories::query()->orderBy('id','DESC')->get();
        return view('categories.show',compact('all'));
    }


    public function create(Request $request)
    {
        return(view('categories.formadd'));
    }


    public function store(Request $request)
    {
        if(request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/category';
            $request->path->move($path, $file_name);
        }else{
            $file_name = 'default.png';
        }

        Categories::create([
            'name'=>$request->name,
            'path'=>$file_name,

        ]);
        return redirect()->route('categories.index');
    }

///this function for search
    public function show(Request $request)
    {
        $search_name=$request['search'] ?? "";
        if ($request != ""){
            $categories=Categories::where('name','LIKE','%'.$search_name.'%')->orderBy('id','DESC')->get();
        }else{
            $categories=Categories::query()->orderBy('id','DESC')->get();
        }
        $data=compact('categories','search_name');

        return view('categories.search')->with($data);
    }



    public function edit($id)
    {
        $cat=Categories::findorfail($id);
        return view('categories.formedit',compact('cat'));
    }


    public function update(Request $request, $id)
    {
        $data = request()->all(); // ['name'=>'abc']
        if(request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/category';
            $request->path->move($path, $file_name);
            $data['path'] = $file_name;

        }

        $cat=Categories::findorfail($id);
        $cat->update($data);
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        Categories::findorfail($id)->delete();
        return redirect()->route('categories.index');
    }

}
