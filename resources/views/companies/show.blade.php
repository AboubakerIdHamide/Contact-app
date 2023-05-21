@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Company Details</span>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <div class="p-3 bg-white">
            {{-- Name --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Name</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$company->name}}
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Email</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$company->email}}
                </div>
            </div>

            {{-- Website --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Website</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$company->website}}
                </div>
            </div>

            {{-- Adress --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Adress</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$company->adress}}
                </div>
            </div>
          
            <hr>
            <div class="text-center mb-4">
                <a href="" class="btn btn-primary me-3">Edit</a>
                <form action="{{route('companies.destroy', $company->id)}}" method="POST" class="d-inline">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-outline-danger me-3">
                        Delete
                    </button>
                </form>
                <a href="/companies" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection