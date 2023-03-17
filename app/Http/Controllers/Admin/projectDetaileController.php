<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\projectDetaile;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\File;

class projectDetaileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailes=projectDetaile::paginate(10);
        return view('admin.detaile.index',compact('detailes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::all();
        $clients=Client::all();
        return view('admin.detaile.create',compact('projects','clients'));

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
            'project_id'=>'required',
            'client_id'=>'required',
            'name'=>'required',
            'content'=>'required',
            'image'=>'required',
            'architect'=>'required',
            'location'=>'required',
            'size'=>'required',
            'Year'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/detailes'),$img_name);

        projectDetaile::create([
            'project_id'=>$request->project_id,
            'client_id'=>$request->client_id,
            'name'=>$request->name,
            'content'=>$request->content,
            'image'=>$img_name,
            'architect'=>$request->architect,
            'location'=>$request->location,
            'size'=>$request->size,
            'Year'=>$request->Year
        ]);
        return redirect()->route('admin.project_detailes.index')->
        with('msg', 'projectDetaile added successfully')->with('type', 'success');
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
        $projects=Project::all();
        $clients=Client::all();
        $detaile=projectDetaile::find($id);
        return view('admin.detaile.edit',compact('detaile','projects','clients'));
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
        $detaile=projectDetaile::find($id);
        $request->validate([
            'project_id'=>'required',
            'client_id'=>'required',
            'name'=>'required',
            'content'=>'required',
            'architect'=>'required',
            'location'=>'required',
            'size'=>'required',
            'Year'=>'required'
        ]);
        $img_name=$detaile->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/detailes'),$img_name);
        File::delete(public_path('image/detailes/'.$detaile->image));

        }

        $detaile->update([
            'project_id'=>$request->project_id,
            'client_id'=>$request->client_id,
            'name'=>$request->name,
            'content'=>$request->content,
            'image'=>$img_name,
            'architect'=>$request->architect,
            'location'=>$request->location,
            'size'=>$request->size,
            'Year'=>$request->Year
        ]);

        return redirect()->route('admin.project_detailes.index')->
        with('msg', 'projectDetaile update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detaile=projectDetaile::find($id);
        File::delete(public_path('image/detailes/'.$detaile->image));
        $detaile->delete();
        return redirect()->route('admin.project_detailes.index')->
        with('msg', 'projectDetaile delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        $detailes = projectDetaile::onlyTrashed()->paginate(10);

        return view('admin.detaile.trash', compact('detailes'));
    }

    public function restore($id)
    {
        // projectDetaile::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        projectDetaile::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.project_detailes.index')->with('msg', 'projectDetaile restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        projectDetaile::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.project_detailes.index')->with('msg', 'projectDetaile deleted permanintly successfully')->with('type', 'danger');
    }
}
