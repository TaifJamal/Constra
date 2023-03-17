@extends('admin.master')
@section('title', 'Add New Testimonial | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Testimonial</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label> Author</label>
            <input type="text" name="author" placeholder=" Author" class="form-control" value="{{ old('author') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Text</label>
            <textarea  name="text" placeholder="Text" class="form-control">{{ old('text') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>subText</label>
            <textarea  name="sub_text" placeholder="subText" class="form-control">{{ old('sub_text') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option value="">select</option>
                @foreach ($services as $service)
                  <option value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option value="service">Service</option>
                <option value="testimonial">Testimonial</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
