@extends('admin.master')
@section('title', 'Fact | ' . env('APP_NAME'))
@section('content')

    <h1>All Facts</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <th>titel</th>
                <th>icoun</th>
                <th>count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($facts as $fact)
                    <td>{{ $fact->id }}</td>
                    <td>{{ $fact->titel }} </td>
                    <td>{{ $fact->icoun }} </td>
                    <td>{{ $fact->count }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.facts.edit', $fact->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.facts.destroy', $fact->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

