@extends('admin.master')
@section('title', 'Trashed Menu | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Menus</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <th>item</th>
                <th>type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($menus as $menu)
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->item }} </td>
                    <td>{{ $menu->type }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.menus.restore', $menu->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.menus.forcedelete', $menu->id) }}" method="POST">
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
