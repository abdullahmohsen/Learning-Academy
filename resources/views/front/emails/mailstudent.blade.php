@extends('front.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="title">
                {{ $details['title'] }}
            </div>
            <div class="body">
                <p>{{ $details['body'] }}</p>
            </div>
        </div>
    </div>


@endsection
