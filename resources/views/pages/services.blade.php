@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>خدمات</h1>
            <h1>{{ $title }}</h1>
            <p>این یک پنل کراد اپ است
            </p>
            @if(count($services) > 0)

                <ul class="bg-color list-group  p-0">
                    @foreach ($services as $service)
                        <li class="list-group-item">{{$service}}</li>    
                    @endforeach
                </ul>    
            @endif
        </div>
    </div>
@endsection
