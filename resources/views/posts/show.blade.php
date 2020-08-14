@extends('layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}" class="btn btn-primary">بازگشت</a>
    
    <div class="card my-3">
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

    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-secondary">ویرایش</a>
    <form action="{{ action('PostsController@destroy', ['post' => $post]) }}" method="POST" class="float-left">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="btn btn-danger" value="حذف">       
    </form>

@endsection