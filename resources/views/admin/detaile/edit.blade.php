@extends('admin.master')
@section('title', 'Edit projectDetaile | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit projectDetaile</h1>
    @include('admin.errors')

    <form action="{{ route('admin.project_detailes.update',$detaile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label> Name</label>
            <input type="text" name="name" placeholder=" Name" class="form-control" value="{{ $detaile->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Content</label>
            <textarea  name="content" placeholder=" Content" class="form-control">{{ $detaile->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label> Architect</label>
            <input type="text" name="architect" placeholder=" Architect" class="form-control" value="{{ $detaile->architect }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Location</label>
            <input type="url" name="location" placeholder=" Location" class="form-control" value="{{ $detaile->location }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Size</label>
            <input type="number" name="size" placeholder=" Size" class="form-control" value="{{ $detaile->size }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Year</label>
            <input type="number" name="Year" placeholder=" Year" class="form-control" value="{{ $detaile->Year }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/detailes/'.$detaile->image) }}" alt="">
        </div>

        <div class="mb-3 ml-4">
            <label>Project</label>
            <select name="project_id"  class="form-control">
                <option>Select</option>
                @foreach ($projects as $project)
                  <option {{$detaile->project->id == $project->id?'Selected':''  }} value="{{  $project->id }}">{{  $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Client</label>
            <select name="client_id"  class="form-control">
                <option>Select</option>
                @foreach ($clients as $client)
                  <option {{$detaile->client->id == $client->id?'Selected':''  }} value="{{  $client->id }}">{{  $client->name }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
