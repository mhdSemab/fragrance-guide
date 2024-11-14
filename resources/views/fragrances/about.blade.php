
@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/fragrances/index.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="fragrance-collection">
        <header class="collection-header">
            <h1>About</h1>
        </header>
    </div>
    <body>

    <div class="text-body" style="text-align: center;">
        <p><strong>This app is a guide to help you decide on your next fragrance. By Muhammad Semab.</strong></p>
    </div>
    </body>
@endsection
