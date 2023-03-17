@extends('admin.master')


@section('title', 'Trashed projectDetailes | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed projectDetailes</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>image</th>
                <th>size</th>
                <th>Year</th>
                <th>project</th>
                <th>client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($detailes as $detaile)
                    <td>{{ $detaile->id }}</td>
                    <td>{{ $detaile->name }} </td>
                    <td><img width="80" src="{{ asset('image/detailes/'.$detaile->image) }}" alt=""></td>
                    <td>{{ $detaile->size }} </td>
                    <td>{{ $detaile->Year }} </td>
                    <td>{{ $detaile->project->name }} </td>
                    <td>{{ $detaile->client->name }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.project_detailes.restore', $detaile->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.project_detailes.forcedelete', $detaile->id) }}" method="POST">
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
