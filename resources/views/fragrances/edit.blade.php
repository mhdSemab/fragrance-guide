<!-- resources/views/fragrances/edit.blade.php -->

@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/fragrances/form.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fragrance-container">
        <h1 class="fragrance-title">Edit a Fragrance</h1>

        <form action="{{ route('fragrances.update', $fragrance) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Add this line to specify that the form is using PUT for updating -->

            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-input @error('name') invalid-input @enderror"
                       id="name" name="name" value="{{ old('name', $fragrance->name) }}" required>
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="brand">Brand</label>
                <input type="text" class="form-input @error('brand') invalid-input @enderror"
                       id="brand" name="brand" value="{{ old('brand', $fragrance->brand) }}" required>
                @error('brand')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="scent_type">Scent Type</label>
                <select class="form-input @error('scent_type') invalid-input @enderror"
                        id="scent_type" name="scent_type" required>
                    <option value="">Select a scent type</option>
                    <option value="Floral" {{ old('scent_type', $fragrance->scent_type) == 'Floral' ? 'selected' : '' }}>Floral</option>
                    <option value="Woody" {{ old('scent_type', $fragrance->scent_type) == 'Woody' ? 'selected' : '' }}>Woody</option>
                    <option value="Oriental" {{ old('scent_type', $fragrance->scent_type) == 'Oriental' ? 'selected' : '' }}>Oriental</option>
                    <option value="Fresh" {{ old('scent_type', $fragrance->scent_type) == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                    <option value="Citrus" {{ old('scent_type', $fragrance->scent_type) == 'Citrus' ? 'selected' : '' }}>Citrus</option>
                </select>
                @error('scent_type')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-input @error('description') invalid-input @enderror"
                          id="description" name="description" required>{{ old('description', $fragrance->description) }}</textarea>
                @error('description')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <div class="price-wrapper">
                    <input type="number" class="form-input price-input @error('price') invalid-input @enderror"
                           id="price" name="price" step="0.01" min="0" value="{{ old('price', $fragrance->price) }}" required>
                </div>
                @error('price')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Update Fragrance</button>
        </form>
    </div>
@endsection
