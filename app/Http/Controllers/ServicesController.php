<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Services;
use App\Models\ServicesImage;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services=Services::query()->orderBy('id','DESC')->get();
        return view('services.show',compact('services'));
    }


    public function create(Request $request)
    {
        return(view('services.formadd'));
    }

    public function store(Request $request)
    {
        $service=Services::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
        ]);
        if(request()->hasFile('path')) {
            foreach (request()->file("path") as $item ){
                $file = $item->getClientOriginalExtension();
                $file_name = time() . '.' . $file;
                $path = 'images/images';
                $request->path->move($path, $file_name);
                ServicesImage::create([
                    'service_id'=>$service->id,
                    'path'=>$file_name,
                ]);
            }
        }
        return redirect()->route('services.index');
    }

//FOR SEARCH
    public function show(Request $request)
    {
        $search_name=$request['search'] ?? "";
        if ($request != ""){
            $services=Services::where('name','LIKE','%'.$search_name.'%')->orderBy('id','DESC')->get();
        }else{
            $services=Services::query()->orderBy('id','DESC')->get();
        }
        $data=compact('services','search_name');

        return view('services.search')->with($data);
    }


    public function edit($id)
    {
        $services=Services::findorfail($id);
        return view('services.formedit',compact('services'));
    }


    public function update(Request $request, $id)
    {
        $Services=Services::findorfail($id);
        $Services->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('services.index');
    }


    public function destroy($id)
    {
        Services::findorfail($id)->delete();
        return redirect()->route('services.index');
    }
}
