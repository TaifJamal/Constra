@extends('admin.master')
@section('title', 'Edit Menu | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Menu</h1>
    @include('admin.errors')

    <form action="{{ route('admin.menus.update',$menu->id) }}" method="POST" >
        @csrf
        @method('put')


        <div class="mb-3 ml-4">
            <label>Item</label>
            <textarea name="item" placeholder="Item" class="form-control">{{ $menu->item }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option {{  $menu->type=='service' ? 'selected':'' }} value="service">Service</option>
                <option  {{  $menu->type=='pricing' ? 'selected':'' }} value="pricing">Pricing</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option>select</option>
                @foreach ($services as $service)
                  <option  {{ $menu->service_id== $service->id ?'selected':'' }} value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>pricing</label>
            <select name="pricing_id"  class="form-control">
                <option>select</option>
                @foreach ($Pricings as $Pricing)
                  <option {{ $menu->pricing_id == $Pricing->id ?'selected':'' }}  value="{{  $Pricing->id }}">{{  $Pricing->id }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
