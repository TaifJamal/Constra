@extends('admin.master')
@section('title', 'Edit Testimonial | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Testimonial</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonials.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label> Author</label>
            <input type="text" name="author" placeholder=" Author" class="form-control" value="{{ $testimonial->author }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Text</label>
            <textarea  name="text" placeholder="Text" class="form-control">{{ $testimonial->text }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>subText</label>
            <textarea  name="sub_text" placeholder="subText" class="form-control">{{ $testimonial->sub_text }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt="">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id"  class="form-control">
                <option value="">select</option>
                @foreach ($services as $service)
                  <option  {{ $testimonial->service_id== $service->id ?'selected':'' }}  value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Selected</option>
                <option {{   $testimonial->type=='service' ? 'selected':''  }}  value="service">Service</option>
                <option {{   $testimonial->type=='testimonial' ? 'selected':''  }}  value="testimonial">Testimonial</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
