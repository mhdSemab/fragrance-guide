@extends('layouts.app')

@section('content')
    <h1>Fragrance Collection</h1>

    <a href="{{ route('fragrances.create') }}">Add New Fragrance</a>

    <table>
        <thead>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Scent Type</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fragrances as $fragrance)
            <tr>
                <td>{{ $fragrance->name }}</td>
                <td>{{ $fragrance->brand }}</td>
                <td>{{ $fragrance->scent_type }}</td>
                <td>{{ $fragrance->description }}</td>
                <td>${{ $fragrance->price }}</td>
                <td>
                    <a href="{{ route('fragrances.show', $fragrance->id) }}">View</a>
                    <a href="{{ route('fragrances.edit', $fragrance->id) }}">Edit</a>
                    <form action="{{ route('fragrances.destroy', $fragrance->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $fragrances->links() }}
@endsection
