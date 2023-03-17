@extends('admin.master')
@section('title', 'Trashed Testimonials | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Testimonials</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>text</th>
                <th>author</th>
                <th>sub_text</th>
                <th>service</th>
                <th>type</th>
                <th>image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($testimonials as $testimonial)
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->text }} </td>
                    <td>{{ $testimonial->author }} </td>
                    <td>{{ $testimonial->sub_text }} </td>
                    <td>{{ $testimonial->service->titel }} </td>
                    <td>{{ $testimonial->type }} </td>
                    <td><img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.testimonials.restore', $testimonial->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.testimonials.forcedelete', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
