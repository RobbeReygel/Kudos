@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->

        <div class="user-detail">
            <h2>{{ $user->name }}</h2>
            <img src="{{ $user->avatar }}" alt="avatar">
        </div>

        <h1>Give {{ $user->name  }} a compliment</h1>
        <form method="POST" action="{{ route('compliments.give') }}">
            {{ csrf_field() }}
            <input type="hidden" name="to_id" value="{{ $user->id }}">
            <input type="text" name="compliment" placeholder="" class="form-control input-lg">
            <br>
            <input type="submit" value="Give compliment" class="btn btn-primary">
        </form>
    </div>
@endsection
