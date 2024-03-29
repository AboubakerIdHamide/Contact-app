@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Add New Contact</span>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <form class="p-3 bg-white" method="POST" action="{{route("contacts.store")}}">
            @csrf

            {{-- First Name --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="firstName">First Name</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="firstName" class="form-control" name="firstName" value="{{old("firstName")}}"/>
                    @error("firstName")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Last Name --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="lastName">Last Name</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="lastName" class="form-control" name="lastName" value="{{old("lastName")}}"/>
                    @error("lastName")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="email">Email</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="email" class="form-control" name="email" value="{{old("email")}}"/>
                    @error("email")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Phone --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="phone">Phone</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="phone" class="form-control" name="phone" value="{{old("phone")}}"/>
                    @error("phone")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Adress --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="adress">Adress</label>
                <div style="flex-basis: 80%;">
                    <textarea id="adress" class="form-control" name="adress">{{old("adress")}}</textarea>
                    @error("adress")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Company --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="company">Company</label>
                <div style="flex-basis: 80%;">
                    <select id="company" class="form-control" name="company" value="{{old("company")}}">
                        @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                    @error("company")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
          
          
            <hr>
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary me-3">Save</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection