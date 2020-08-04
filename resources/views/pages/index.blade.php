@extends('layouts.app')

@section('content')
    {{-- <div class="row"> --}}
        {{-- <div class="col-12"> --}}
            <div class="jumbotron text-center">
                <h1>به کراد اپ خوش آمدید</h1>
                <h1>{{ $title }}</h1>
                <p>این یک پنل کراد اپ است
                </p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/login" role="button">ورود به پنل</a> <a class="btn btn-success btn-lg" href="/register" role="button">ثبت نام!</a>
                  </p>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
        
@endsection

   