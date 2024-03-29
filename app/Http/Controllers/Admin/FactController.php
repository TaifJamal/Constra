<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FactController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:fact-list|fact-create|fact-edit|fact-delete', ['only' => ['index','store']]);
         $this->middleware('permission:fact-create', ['only' => ['create','store']]);
         $this->middleware('permission:fact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fact-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts=Fact::paginate(10);
        return view('admin.fact.index',compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fact.create');

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
            'titel'=>'required',
            'icoun'=>'required',
            'count'=>'required'
        ]);
        $img_name=rand().time().$request->file('icoun')->getClientOriginalName();
        $request->file('icoun')->move(public_path('image/facts'),$img_name);
        Fact::create([
            'titel'=>$request->titel,
            'icoun'=> $img_name,
            'count'=>$request->count

        ]);
        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact added successfully')->with('type', 'success');
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
        $fact=Fact::find($id);
        return view('admin.fact.edit',compact('fact'));
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
        $fact=Fact::find($id);
        $request->validate([
            'titel'=>'required',
            'icoun'=>'required',
            'count'=>'required'
        ]);

        $fact->update([
            'titel'=>$request->titel,
            'icoun'=>$request->icoun,
            'count'=>$request->count
        ]);

        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fact=Fact::find($id);
        $fact->delete();
        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        $facts = Fact::onlyTrashed()->paginate(10);
        return view('admin.fact.trash', compact('facts'));
    }

    public function restore($id)
    {
        // Fact::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Fact::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.facts.index')->with('msg', 'Fact restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Fact::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.facts.index')->with('msg', 'Fact deleted permanintly successfully')->with('type', 'danger');
    }
}
