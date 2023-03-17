<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class PricingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings=Pricing::paginate(10);
        return view('admin.pricing.index',compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.pricing.create',compact('services'));

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
            'price'=>'required',
            'per'=>'required',
            'service_id'=>'required'
        ]);

        Pricing::create([
            'price'=>$request->price,
            'per'=>$request->per,
            'service_id'=>$request->service_id

        ]);
        return redirect()->route('admin.pricings.index')->
        with('msg', 'Pricing added successfully')->with('type', 'success');
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
        $pricing=Pricing::find($id);
        return view('admin.pricing.edit',compact('pricing','services'));
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
        $pricing=Pricing::find($id);
        $request->validate([
            'price'=>'required',
            'per'=>'required',
            'service_id'=>'required'
        ]);

        $pricing->update([
            'price'=>$request->price,
            'per'=>$request->per,
            'service_id'=>$request->service_id
        ]);

        return redirect()->route('admin.pricings.index')->
        with('msg', 'Pricing update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pricing=Pricing::find($id);
        $pricing->delete();
        return redirect()->route('admin.pricings.index')->
        with('msg', 'Pricing delete successfully')->with('type', 'success');
    }

    public function trash()
    {
        $pricings = Pricing::onlyTrashed()->paginate(10);
        return view('admin.pricing.trash', compact('pricings'));
    }

    public function restore($id)
    {
        // Pricing::onlyTrashed()->find($id)->update(['deleted_at' => null]);
        Pricing::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.pricings.index')->with('msg', 'Pricing restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Pricing::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.pricings.index')->with('msg', 'Pricing deleted permanintly successfully')->with('type', 'danger');
    }
}
