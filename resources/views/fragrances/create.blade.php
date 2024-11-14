
@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/fragrances/form.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fragrance-container">
        <h1 class="fragrance-title">Add a New Fragrance</h1>

        <form action="{{ route('fragrances.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-input @error('name') invalid-input @enderror"
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="brand">Brand</label>
                <input type="text" class="form-input @error('brand') invalid-input @enderror"
                       id="brand" name="brand" value="{{ old('brand') }}" required>
                @error('brand')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="scent_type">Scent Type</label>
                <select class="form-input @error('scent_type') invalid-input @enderror"
                        id="scent_type" name="scent_type" required>
                    <option value="">Select a scent type</option>
                    <option value="Floral" {{ old('scent_type') == 'Floral' ? 'selected' : '' }}>Floral</option>
                    <option value="Woody" {{ old('scent_type') == 'Woody' ? 'selected' : '' }}>Woody</option>
                    <option value="Oriental" {{ old('scent_type') == 'Oriental' ? 'selected' : '' }}>Oriental</option>
                    <option value="Fresh" {{ old('scent_type') == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                    <option value="Citrus" {{ old('scent_type') == 'Citrus' ? 'selected' : '' }}>Citrus</option>
                </select>
                @error('scent_type')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-input @error('description') invalid-input @enderror"
                          id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Price</label>
                <div class="price-wrapper">
                    <input type="number" class="form-input price-input @error('price') invalid-input @enderror"
                           id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
                </div>
                @error('price')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Add Fragrance</button>
        </form>
    </div>
@endsection
