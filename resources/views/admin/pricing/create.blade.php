@extends('admin.master')
@section('title', 'Add New Pricing | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Pricing</h1>
    @include('admin.errors')

    <form action="{{ route('admin.pricings.store') }}" method="POST" >
        @csrf

        <div class="mb-3 ml-4">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Per</label>
            <input type="text" name="per" placeholder="Per" class="form-control" value="{{ old('per') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option>Select</option>
                @foreach ($services as $service)
                  <option value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>

        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
