@extends('layouts.app')

@section('content')
    <h1>خدمات</h1>
    <h1>{{ $title }}</h1>
    <p>این یک پنل کراد اپ است
    </p>
    @if(count($services) > 0)

        <ul class="bg-color">
            @foreach ($services as $service)
                <li>{{$service}}</li>    
            @endforeach
        </ul>    
    @endif
@endsection
