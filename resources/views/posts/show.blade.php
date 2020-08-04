@extends('layouts.app')

@section('content')

    <a href="/posts" class="btn btn-danger">بازگشت</a>

    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-text">
                {{ $post->body }}
            </div>
            <hr>
            <small>نوشته شده در {{ $post->created_at }}</small>
        </div>
    </div>
@endsection