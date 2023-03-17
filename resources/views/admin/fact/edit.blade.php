@extends('admin.master')
@section('title', 'Edit Fact | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Fact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.facts.update',$fact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')


        <div class="mb-3 ml-4">
            <label> Titel</label>
            <input type="text" name="titel" placeholder=" Titel" class="form-control" value="{{ $fact->titel }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Icoun</label>
            <input type="text" name="icoun" placeholder=" Icoun" class="form-control" value="{{ $fact->icoun }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Count</label>
            <input type="number" name="count" placeholder=" Count" class="form-control" value="{{ $fact->count }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
