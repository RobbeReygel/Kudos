@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Given compliments</h1>
        @foreach ($user->givenCompliments as $compliment)

            <a href="/user/{{$compliment->to_id}}" class="alist">
                <div class="compliments-given">
                    <img src="{{ $compliment->sentTo->avatar }}" alt="avatar">
                    <h3>{{ $compliment->sentTo->name }}</h3>
                    <p>{{ $compliment->content }}</p>
                </div>
            </a>

        @endforeach
    </div>
@endsection
