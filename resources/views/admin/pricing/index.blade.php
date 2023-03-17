@extends('admin.master')
@section('title', 'Pricing | ' . env('APP_NAME'))
@section('content')

    <h1>All Pricing</h1>
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
                        <a class="btn btn-primary" href="{{ route('admin.pricings.edit', $pricing->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.pricings.destroy', $pricing->id) }}" method="POST">
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

