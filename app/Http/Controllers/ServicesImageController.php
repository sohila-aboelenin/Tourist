<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Services;
use App\Models\ServicesImage;
use Illuminate\Http\Request;

class ServicesImageController extends Controller
{

    public function index()
    {
        $images=ServicesImage::query()->orderBy('id','DESC')->get();
        return view('images.show',compact('images'));
    }


    public function create(Request $request)
    {
        return(view('images.formadd'));
    }


    public function store(Request $request)
    {
        if(request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/images';
            $request->path->move($path, $file_name);
        }else{
            $file_name = 'default.png';
        }

        ServicesImage::create([
            'service_id'=>$request->service_id,
            'path'=>$file_name,

        ]);
        return redirect()->route('service_images.index');
    }


    public function show(ServicesImage $servicesImage)
    {
        //
    }


    public function edit($id)
    {
        $images=ServicesImage::findorfail($id);
        return view('images.formedit',compact('images'));
    }


    public function update(Request $request,$id)
    {
        $data = request()->all();
        if(request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/images';
            $request->path->move($path, $file_name);
            $data['path'] = $file_name;

        }

        $images=ServicesImage::findorfail($id);
        $images->update($data);
        return redirect()->route('service_images.index');
    }


    public function destroy($id)
    {
        ServicesImage::findorfail($id)->delete();
        return redirect()->route('service_images.index');
    }
}
