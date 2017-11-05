@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="users-title">Users</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-2">
                    <a href="/user/{{ $user->id }}" class="alist">
                        <div class="user">
                            <img src="{{ $user->avatar }}" alt="avatar">
                            <p>{{ $user->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
