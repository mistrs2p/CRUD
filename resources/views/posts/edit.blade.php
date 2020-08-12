@extends('layouts.app')

@section('content')
    <h1>ویرایش پست</h1>
    <form action="{{ action('PostsController@update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="form-group">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" name="title" placeholder="عنوان" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <label for="body">متن بدنه</label>
            <textarea class="form-control" id="editor1" name="body" placeholder="متن بدنه" style="font-family: 'IRANSansFaNum'">
                {{$post->body}}
            </textarea>
        </div>

        <div class="form-group">
            <input type="file" name="cover_image" value="">
        </div>

        <button type="submit" class="btn btn-primary">ویرایش پست</button>
    </form>
    
@endsection