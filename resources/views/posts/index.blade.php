@extends('layouts.app')

@section('content')
    <h1>پست ها</h1>
    {{-- check for posts. if statement --}}
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                    </div>
                   <small>نوشته شده در {{ $post->created_at }} توسط {{ $post->user->name }}</small>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>هیچ پستی یافت نشد</p>
    @endif
@endsection