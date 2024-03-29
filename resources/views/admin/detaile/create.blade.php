@extends('admin.master')
@section('title', 'Add New projectDetaile | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new projectDetaile</h1>
    @include('admin.errors')

    <form action="{{ route('admin.project_detailes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label> Name</label>
            <input type="text" name="name" placeholder=" Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Content</label>
            <textarea  name="content" placeholder=" Content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label> Architect</label>
            <input type="text" name="architect" placeholder=" Architect" class="form-control" value="{{ old('architect') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Location</label>
            <input type="url" name="location" placeholder=" Location" class="form-control" value="{{ old('location') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Size</label>
            <input type="number" name="size" placeholder=" Size" class="form-control" value="{{ old('size') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Year</label>
            <input type="number" name="Year" placeholder=" Year" class="form-control" value="{{ old('Year') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3 ml-4">
            <label>Project</label>
            <select name="project_id"  class="form-control">
                <option value="">Select</option>
                @foreach ($projects as $project)
                  <option value="{{  $project->id }}">{{  $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Client</label>
            <select name="client_id"  class="form-control">
                <option>Select</option>
                @foreach ($clients as $client)
                  <option value="{{  $client->id }}">{{  $client->name }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
