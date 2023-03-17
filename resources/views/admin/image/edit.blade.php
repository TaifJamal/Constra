@extends('admin.master')
@section('title', 'Edit Image | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Image</h1>
    @include('admin.errors')

    <form action="{{ route('admin.images.update',$image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Path</label>
            <input type="text" name="path" placeholder="Path" class="form-control" value="{{ $image->path }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select  name="type" class="form-control">
                <option value="">Selected</option>
                <option {{  $image->type=='service' ? 'selected':''  }}   value="service">Service</option>
                <option {{  $image->type=='detaile' ? 'selected':''  }}   value="detaile">Detaile</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option value="">select</option>
                @foreach ($services as $service)
                  <option {{ $image->service->id == $service->id ?'selected':'' }}  value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>projectDetaile</label>
            <select name="project_detaile_id"  class="form-control">
                <option value="">select</option>
                @foreach ($detailes as $detaile)
                  <option {{ $image->detaile->id == $detaile->id ?'selected':'' }}  value="{{  $detaile->id }}">{{  $detaile->name }}</option>
                @endforeach
            </select>
        </div>




        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
