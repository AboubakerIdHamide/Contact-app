@extends('layouts.main')
@section('content')
    <div class="container bg-white d-flex justify-content-center align-items-center flex-column p-5 gap-4">
        <h1>Contact App</h1>
        <p>Contact App gives you everything you need to organize your contacts easily.</p>
        <div>
            <a href="/signup" class="btn btn-primary">Sign up</a>
            <a href="/signin" class="btn btn-outline-secondary">Sign in</a>
        </div>
    </div>
    @include("layouts._footer")
@endsection