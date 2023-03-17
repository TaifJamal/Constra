@extends('admin.master')
@section('title', 'Add New Menu | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Menu</h1>
    @include('admin.errors')

    <form action="{{ route('admin.menus.store') }}" method="POST" >
        @csrf

        <div class="mb-3 ml-4">
            <label>Item</label>
            <textarea name="item" placeholder="Item" class="form-control">{{ old('item') }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option value="service">Service</option>
                <option value="pricing">Pricing</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option>select</option>
                @foreach ($services as $service)
                  <option value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>pricing</label>
            <select name="pricing_id"  class="form-control">
                <option>select</option>
                @foreach ($Pricings as $Pricing)
                  <option value="{{  $Pricing->id }}">{{  $Pricing->id }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
