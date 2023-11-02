@extends('layouts.main')
@section('content')
    <div class="container bg-white d-flex justify-content-center align-items-center flex-column p-5 gap-4">
        <h1>{{__("welcome.title")}}</h1>
        <p>{{__("welcome.paragraph")}}</p>
        <div>
            <a href="/register" class="btn btn-primary">{{__("welcome.signup")}}</a>
            <a href="/login" class="btn btn-outline-secondary">{{__("welcome.signin")}}</a>
        </div>
    </div>
    @include("layouts._footer")
@endsection