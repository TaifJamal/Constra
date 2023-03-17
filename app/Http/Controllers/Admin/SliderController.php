<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');

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
            'sub_titel'=>'required',
            'description'=>'required',
            'btn'=>'required',
            'btn_url'=>'required'
        ]);

        Slider::create([
            'titel'=>$request->titel,
            'sub_titel'=>$request->sub_titel,
            'description'=>$request->description,
            'btn'=>$request->btn,
            'btn_url'=>$request->btn_url,

        ]);
        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider added successfully')->with('type', 'success');
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
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider=Slider::find($id);
        $request->validate([
            'titel'=>'required',
            'sub_titel'=>'required',
            'description'=>'required',
            'btn'=>'required',
            'btn_url'=>'required'
        ]);

        $slider->update([
            'titel'=>$request->titel,
            'sub_titel'=>$request->sub_titel,
            'description'=>$request->description,
            'btn'=>$request->btn,
            'btn_url'=>$request->btn_url,
        ]);

        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        $sliders = Slider::onlyTrashed()->paginate(10);
        return view('admin.slider.trash', compact('sliders'));
    }

    public function restore($id)
    {
        // Slider::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Slider::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.sliders.index')->with('msg', 'Slider restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Slider::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.sliders.index')->with('msg', 'Slider deleted permanintly successfully')->with('type', 'danger');
    }
}
