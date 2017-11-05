@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Welcome back {{ Auth::user()->name }}!</h2>
                    <br>
                    <h4>Your recent received compliments.</h4>

                        <br>

                    @foreach ($user->receivedCompliments->sortByDesc('created_at')->take(5) as $compliment)
                        <div class="compliment">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="compliment-recent">
                                        @if ($compliment->created_at->diffInSeconds(\Carbon\Carbon::now()) < 60)
                                            <p>{{  $compliment->created_at->diffInSeconds(\Carbon\Carbon::now())  }}s : <strong>{{ $compliment->content }}</strong></p>
                                        @elseif ($compliment->created_at->diffInMinutes(\Carbon\Carbon::now()) < 60)
                                            <p>{{  $compliment->created_at->diffInMinutes(\Carbon\Carbon::now())  }}m : <strong>{{ $compliment->content }}</strong></p>
                                        @elseif ($compliment->created_at->diffInHours(\Carbon\Carbon::now()) < 24)
                                            <p>{{  $compliment->created_at->diffInHours(\Carbon\Carbon::now())  }}h : <strong>{{ $compliment->content }}</strong></p>
                                        @else
                                            <p>{{  $compliment->created_at->diffInDays(\Carbon\Carbon::now())  }}d : <strong>{{ $compliment->content }}</strong></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
