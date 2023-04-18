<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\projectDetaile;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:image-list|image-create|image-edit|image-delete', ['only' => ['index','store']]);
         $this->middleware('permission:image-create', ['only' => ['create','store']]);
         $this->middleware('permission:image-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:image-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::paginate(10);
        return view('admin.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailes=projectDetaile::all();
        $services=Service::all();
        return view('admin.image.create',compact('services','detailes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'path'=>'required',
            'type'=>'required'
        ]);
        $img_name=rand().time().$request->file('path')->getClientOriginalName();
        $request->file('path')->move(public_path('image/images'),$img_name);
        Image::create([
            'path'=>$img_name,
            'type'=>$request->type,
            'service_id'=>$request->service_id,
            'project_detaile_id'=>$request->project_detaile_id
        ]);
        return redirect()->route('admin.images.index')->
        with('msg', 'Image added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailes=projectDetaile::all();
        $services=Service::all();
        $image=Image::find($id);
        return view('admin.image.edit',compact('image','detailes','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image=Image::find($id);
        $request->validate([
            'path'=>'required',
            'type'=>'required'
        ]);
        $image->update([
            'path'=>$request->path,
            'type'=>$request->type,
            'service_id'=>$request->service_id,
            'project_detaile_id'=>$request->project_detaile_id

        ]);

        return redirect()->route('admin.images.index')->
        with('msg', 'Image update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::find($id);
        $image->delete();
        return redirect()->route('admin.images.index')->
        with('msg', 'Image delete successfully')->with('type', 'success');
    }


}

