@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Received compliments</h1>
        <div class="row">
            @foreach ($user->receivedCompliments as $compliment)
                <div class="col-md-10">
                    <div class="compliment">
                        <div class="compliment-detail">
                             <p>{{ $compliment->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
