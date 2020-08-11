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

                    {{ __('خوش آمدید!') }}
                    <a href="/posts/create">ایجاد پست</a>
                    <h3>پست های وبلاگ شما</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
