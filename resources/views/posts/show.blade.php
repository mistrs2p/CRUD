@extends('layouts.app')

@section('content')

    
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-text">
                {!! $post->body !!}
                {{-- {{}} dont parse html instead {!! !!} do --}}
            </div>
            <hr>
            <small>نوشته شده در {{ $post->created_at }}</small>
        </div>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-danger">بازگشت</a>
    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-danger">ویرایش</a>

@endsection