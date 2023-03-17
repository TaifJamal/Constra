@extends('admin.master')
@section('title', 'Add New Service | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Service</h1>
    @include('admin.errors')

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label> Icoun</label>
            <input type="text" name="icoun" placeholder=" Icoun" class="form-control" value="{{ old('icoun') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Titel</label>
            <input type="text" name="titel" placeholder="Titel" class="form-control" value="{{ old('titel') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea  name="content" placeholder="Content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>smallDescription</label>
            <textarea  name="small_description" placeholder="smallDescription" class="form-control">{{ old('small_description') }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
