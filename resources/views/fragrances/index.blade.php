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

            <form method="GET" action="{{ route('fragrances.index') }}" class="filter-form">
                <label for="brand">Filter by Brand:</label>
                <select name="brand" id="brand">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->brand }}" {{ request('brand') == $brand->brand ? 'selected' : '' }}>{{ $brand->brand }}</option>
                    @endforeach
                </select>

                <label for="scent_type">Filter by Scent Type:</label>
                <select name="scent_type" id="scent_type">
                    <option value="">All Scent Types</option>
                    @foreach($scentTypes as $scent)
                        <option value="{{ $scent->scent_type }}" {{ request('scent_type') == $scent->scent_type ? 'selected': '' }}>{{ $scent->scent_type }}</option>
                    @endforeach
                </select>

                <label for="min_price">Min Price:</label>
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" min="{{ $minAvailablePrice }}" max="{{ $maxAvailablePrice }}">

                <label for="max_price">Max Price:</label>
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" min="{{ $minAvailablePrice }}" max="{{ $maxAvailablePrice }}">

                <button type="submit">Filter</button>
            </form>

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
