<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::paginate(10);
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.testimonial.create',compact('services'));

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
            'author'=>'required',
            'text'=>'required',
            'sub_text'=>'required',
            'image'=>'required',
            'type'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/testimonials'),$img_name);

        Testimonial::create([
            'author'=>$request->author,
            'text'=>$request->text,
            'sub_text'=>$request->sub_text,
            'service_id'=>$request->service_id,
            'type'=>$request->type,
            'image'=>$img_name

        ]);
        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial added successfully')->with('type', 'success');
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
        $testimonial=Testimonial::find($id);
        $services=Service::all();
        return view('admin.testimonial.edit',compact('testimonial','services'));
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
        $testimonial=Testimonial::find($id);
        $request->validate([
            'author'=>'required',
            'text'=>'required',
            'sub_text'=>'required',
            'type'=>'required'
        ]);
        $img_name=$testimonial->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/testimonials'),$img_name);
        File::delete(public_path('image/testimonials/'.$testimonial->image));

        }

        $testimonial->update([
            'author'=>$request->author,
            'text'=>$request->text,
            'sub_text'=>$request->sub_text,
            'service_id'=>$request->service_id,
            'type'=>$request->type,
            'image'=>$img_name

        ]);

        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::find($id);
        File::delete(public_path('image/testimonials/'.$testimonial->image));
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        $testimonials = Testimonial::onlyTrashed()->paginate(10);

        return view('admin.testimonial.trash', compact('testimonials'));
    }

    public function restore($id)
    {
        // Testimonial::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Testimonial::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Testimonial::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial deleted permanintly successfully')->with('type', 'danger');
    }
}
