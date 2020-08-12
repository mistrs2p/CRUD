@extends('layouts.app')

@section('content')
    <h1>پست ها</h1>
    {{-- check for posts. if statement --}}
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/cover_images/{{ $post->cover_image }}" width="100%">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="card-title">
                            <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                        </div>
                       <small>نوشته شده در {{ $post->created_at }} توسط {{ $post->user->name }}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>هیچ پستی یافت نشد</p>
    @endif
@endsection