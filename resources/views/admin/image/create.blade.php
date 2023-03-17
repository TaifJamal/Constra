@extends('admin.master')
@section('title', 'Add New Image | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Image</h1>
    @include('admin.errors')

    <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Path</label>
            <input type="file" name="path" class="form-control" >
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select  name="type" class="form-control">
                <option value="">Selected</option>
                <option value="service">Service</option>
                <option value="detaile">Detaile</option>
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option value="">select</option>
                @foreach ($services as $service)
                  <option  value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>projectDetaile</label>
            <select name="project_detaile_id"  class="form-control">
                <option value="">select</option>
                @foreach ($detailes as $detaile)
                  <option  value="{{  $detaile->id }}">{{  $detaile->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
