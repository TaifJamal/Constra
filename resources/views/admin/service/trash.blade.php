@extends('admin.master')
@section('title', 'Trashed Services | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Services</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>icoun</th>
                <th>titel</th>
                <th>content</th>
                <th>description</th>
                <th>small_description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($services as $service)
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->icoun }} </td>
                    <td>{{ $service->titel }} </td>
                    <td>{{ $service->content }} </td>
                    <td>{{ $service->description }} </td>
                    <td>{{ $service->small_description }} </td>
                    <td><img width="80" src="{{ asset('image/services/'.$service->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.services.restore', $service->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.services.forcedelete', $service->id) }}" method="POST">
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
