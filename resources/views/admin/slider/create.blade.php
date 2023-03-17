@extends('admin.master')
@section('title', 'Add New Slider | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Slider</h1>
    @include('admin.errors')

    <form action="{{ route('admin.sliders.store') }}" method="POST" >
        @csrf

        <div class="mb-3 ml-4">
            <label> Titel</label>
            <input type="text" name="titel" placeholder=" Titel" class="form-control" value="{{ old('titel') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>subTitel</label>
            <input type="text" name="sub_titel" placeholder="subTitel" class="form-control" value="{{ old('sub_titel') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label> Btn</label>
            <input type="text" name="btn" placeholder=" Btn" class="form-control" value="{{ old('btn') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> BtnUrl</label>
            <input type="text" name="btn_url" placeholder=" BtnUrl" class="form-control" value="{{ old('btn_url') }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
