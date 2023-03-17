@extends('admin.master')
@section('title', 'Trashed Pricings | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Pricings</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>price</th>
                <th>per</th>
                <th>service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($pricings as $pricing)
                <td>{{ $pricing->id }}</td>
                <td>{{ $pricing->price }} </td>
                <td>{{ $pricing->per }} </td>
                <td>{{ $pricing->service->titel }} </td>
                 <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.pricings.restore', $pricing->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.pricings.forcedelete', $pricing->id) }}" method="POST">
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
