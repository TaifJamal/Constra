@extends('admin.master')
@section('title', 'Add New Fact | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Fact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.facts.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="mb-3 ml-4">
            <label> Titel</label>
            <input type="text" name="titel" placeholder=" Titel" class="form-control" value="{{ old('titel') }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Icoun</label>
            <input type="file" name="icoun"  class="form-control" >
        </div>
        <div class="mb-3 ml-4">
            <label> Count</label>
            <input type="number" name="count" placeholder=" Count" class="form-control" value="{{ old('count') }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
