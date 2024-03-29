@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Contact Details</span>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <div class="p-3 bg-white">
            {{-- First Name --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">First Name</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->first_name}}
                </div>
            </div>

            {{-- Last Name --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Last Name</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->last_name}}
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Email</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->email}}
                </div>
            </div>

            {{-- Phone --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Phone</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->phone}}
                </div>
            </div>

            {{-- Adress --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Adress</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->adress}}
                </div>
            </div>

            {{-- Company --}}
            <div class="form-group d-flex mb-4">
                <p class="form-label" style="flex-basis: 20%;">Company</p>
                <div style="flex-basis: 80%;" class="text-secondary">
                    {{$contact->company->name}}
                </div>
            </div>
          
          
            <hr>
            <div class="text-center mb-4">
                <a href="/contacts/{{$contact->id}}/edit" class="btn btn-primary me-3">Edit</a>
                <form action="{{route('contacts.destroy', $contact->id)}}" method="POST" class="d-inline">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-outline-danger me-3">
                        Delete
                    </button>
                </form>
                <a href="/contacts" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection