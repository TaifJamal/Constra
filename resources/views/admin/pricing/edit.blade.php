@extends('admin.master')
@section('title', 'Edit Pricing | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Pricing</h1>
    @include('admin.errors')

    <form action="{{ route('admin.pricings.update',$pricing->id) }}" method="POST" >
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control" value="{{$pricing->price}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Per</label>
            <input type="text" name="per" placeholder="Per" class="form-control" value="{{$pricing->per}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                @foreach ($services as $service)
                  <option {{ $pricing->service->id ==$service->id ? 'selected':''  }} value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>

        </div>
        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
