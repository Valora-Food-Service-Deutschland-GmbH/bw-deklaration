@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Dashboard</h1>
        @unless (Auth::check())
            <p>You are not signed in.</p>
        @endunless

        @isset($profile)
            {{dd($profile)}}
        @endisset

    </div>
@endsection
