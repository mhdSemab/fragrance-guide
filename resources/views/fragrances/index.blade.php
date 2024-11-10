<!-- resources/views/fragrances/index.blade.php -->

@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/fragrances/index.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fragrance-collection">
        <header class="collection-header">
            <h1>Fragrance Collection</h1>
            <form action = "{{ route('fragrances.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search for a Fragrance" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </header>


        <table class="fragrance-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Scent Type</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fragrances as $fragrance)
                <tr>
                    <td>
                        <a href="{{ route('fragrances.show', $fragrance->id) }}" class="fragrance-link">
                            {{ $fragrance->name }}
                        </a>
                    </td>
                    <td>{{ $fragrance->brand }}</td>
                    <td>{{ $fragrance->scent_type }}</td>
                    <td>{{ Str::limit($fragrance->description, 100) }}</td>
                    <td>${{ number_format($fragrance->price, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginator-container">
            {{ $fragrances->links() }}
        </div>

    </div>
@endsection
