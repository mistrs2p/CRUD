@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('داشبورد') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary mb-4">ایجاد پست</a>
                    <h3>پست های وبلاگ شما</h3>
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>عنوان</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary">ویرایش</a></td>
                                    <td>
                                        <form action="{{ action('PostsController@destroy', ['post' => $post ]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" class="btn btn-danger" value="حذف">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            شما هیچ پستی ندارید!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
