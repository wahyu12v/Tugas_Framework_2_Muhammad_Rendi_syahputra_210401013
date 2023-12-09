@extends('layouts.navbar_home')
@section('content')

<div class="container" style="max-width: 800px; margin-top: 20px;">
    <div class="card">
        <img style="height: 400px; object-fit: cover;" src="{{ asset('images/' . $article->image) }}" class="card-img-top" alt="Article Image">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->content }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted"></small>
        </div>
    </div>
</div>
@endsection