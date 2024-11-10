<!-- resources/views/fragrances/show.blade.php -->

@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/fragrances/show.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fragrance-details">
        <header class="details-header">
            <h1>{{ $fragrance->name }}</h1>
            <p class="brand">{{ $fragrance->brand }}</p>
        </header>

        <div class="fragrance-info">
            <p><strong>Scent Type:</strong> {{ $fragrance->scent_type }}</p>
            <p><strong>Description:</strong> {{ $fragrance->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($fragrance->price, 2) }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('fragrances.index') }}" class="btn btn-primary">Back to Collection</a>
            <a href="{{ route('fragrances.edit', $fragrance->id) }}" class="btn btn-secondary">Edit</a>

            <form action="{{ route('fragrances.destroy', $fragrance->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this fragrance?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
