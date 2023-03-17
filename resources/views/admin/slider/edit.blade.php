@extends('admin.master')
@section('title', 'Edit Slider | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Slider</h1>
    @include('admin.errors')

    <form action="{{ route('admin.sliders.update',$slider->id) }}" method="POST" >
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label> Titel</label>
            <input type="text" name="titel" placeholder=" Titel" class="form-control" value="{{ $slider->titel}}">
        </div>
        <div class="mb-3 ml-4">
            <label>subTitel</label>
            <input type="text" name="sub_titel" placeholder="subTitel" class="form-control" value="{{ $slider->sub_titel}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ $slider->description}}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label> Btn</label>
            <input type="text" name="btn" placeholder=" Btn" class="form-control" value="{{ $slider->btn}}">
        </div>
        <div class="mb-3 ml-4">
            <label> BtnUrl</label>
            <input type="text" name="btn_url" placeholder=" BtnUrl" class="form-control" value="{{ $slider->btn_url}}">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
