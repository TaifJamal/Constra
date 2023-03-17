@extends('admin.master')
@section('title', 'Edit Service | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Service</h1>
    @include('admin.errors')

    <form action="{{ route('admin.services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label> Icoun</label>
            <input type="text" name="icoun" placeholder=" Icoun" class="form-control" value="{{ $service->icoun }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Titel</label>
            <input type="text" name="titel" placeholder="Titel" class="form-control" value="{{ $service->titel }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea  name="content" placeholder="Content" class="form-control">{{ $service->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ $service->description }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>smallDescription</label>
            <textarea  name="small_description" placeholder="smallDescription" class="form-control">{{ $service->small_description }}</textarea>
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/services/'.$service->image) }}" alt="">
        </div>
        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
