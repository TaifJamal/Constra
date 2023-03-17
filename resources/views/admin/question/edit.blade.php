@extends('admin.master')
@section('title', 'Edit Question | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Question</h1>
    @include('admin.errors')

    <form action="{{ route('admin.questions.update',$question->id) }}" method="POST" >
        @csrf
        @method('put')


        <div class="mb-3 ml-4">
            <label> Question</label>
            <input type="text" name="question" placeholder=" Question" class="form-control" value="{{$question->question }}">
        </div>
        <div class="mb-3 ml-4">
            <label> Answer</label>
            <input  type="text"  name="answer" placeholder=" Answer" class="form-control" value="{{$question->answer }}"></input>
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select {{ $question->type!='service'?'disabled':'' }} name="service_id"  class="form-control">
                <option>select</option>
                @foreach ($services as $service)
                  <option {{ $question->service->id == $service->id ?'selected':'' }} value="{{  $service->id }}">{{  $service->titel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select  name="type" class="form-control">
                <option value="">Selected</option>
                <option {{  $question->type=='service' ? 'selected':'' }} value="service">Service</option>
                <option {{  $question->type=='faq' ? 'selected':'' }} value="faq">Faq</option>
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
