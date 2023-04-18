<?php

namespace App\Http\Controllers\Admin;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\Service;

class MenuController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:menu-list|menu-create|menu-edit|menu-delete', ['only' => ['index','store']]);
         $this->middleware('permission:menu-create', ['only' => ['create','store']]);
         $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=menu::paginate(10);
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $Pricings=Pricing::all();
        return view('admin.menu.create',compact('services','Pricings'));

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
            'item'=>'required',
            'type'=>'required'
        ]);
        menu::create([
            'item'=>$request->item,
            'service_id'=>$request->service_id,
            'pricing_id'=>$request->pricing_id,
            'type'=>$request->type
        ]);
        return redirect()->route('admin.menus.index')->
        with('msg', 'menu added successfully')->with('type', 'success');
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
        $services=Service::all();
        $Pricings=Pricing::all();
        $menu=menu::find($id);
        return view('admin.menu.edit',compact('menu','services','Pricings'));
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
        $menu=menu::find($id);
        $request->validate([
            'item'=>'required',
            'type'=>'required'
        ]);
        $menu->update([
            'item'=>$request->item,
            'service_id'=>$request->service_id,
            'pricing_id'=>$request->pricing_id,
            'type'=>$request->type

        ]);

        return redirect()->route('admin.menus.index')->
        with('msg', 'menu update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=menu::find($id);
        $menu->delete();
        return redirect()->route('admin.menus.index')->
        with('msg', 'menu delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $menus = menu::onlyTrashed()->paginate(10);
        return view('admin.menu.trash', compact('menus'));
    }

    public function restore($id)
    {
        // Client::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        menu::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.menus.index')->with('msg', 'Menu restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        menu::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.menus.index')->with('msg', 'Menu deleted permanintly successfully')->with('type', 'danger');
    }


}
