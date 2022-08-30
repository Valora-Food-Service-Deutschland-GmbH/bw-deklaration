@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{  $profile->toJson() }}</h1>

    </div>

@endsection
