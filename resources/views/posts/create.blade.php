@extends('layouts.app')

@section('content')
    <h1>ایجاد پست</h1>
    <form action="{{ action('PostsController@store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" name="title" placeholder="عنوان">
        </div>

        <div class="form-group">
            <label for="body">متن بدنه</label>
            <textarea class="form-control" id="editor1" name="body" placeholder="متن بدنه" style="font-family: 'IRANSansFaNum'"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">ایجاد پست</button>
    </form>
    
@endsection