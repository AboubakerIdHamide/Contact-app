@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Edit Contact</span>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <form class="p-3 bg-white" method="POST" action="{{route("companies.update", $company->id)}}">
            @csrf
            @method("PUT")
            
            {{-- Name --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="name">Name</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="name" class="form-control" name="name" value="{{$company->name}}"/>
                    @error("name")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="email">Email</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="email" class="form-control" name="email" value="{{$company->email}}"/>
                    @error("email")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Website --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="website">Website</label>
                <div style="flex-basis: 80%;">
                    <input type="text" id="website" class="form-control" name="website" value="{{$company->website}}"/>
                    @error("website")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- Adress --}}
            <div class="form-group d-flex mb-4">
                <label class="form-label" style="flex-basis: 20%;" for="adress">Adress</label>
                <div style="flex-basis: 80%;">
                    <textarea id="adress" class="form-control" name="adress">{{$company->adress}}</textarea>
                    @error("adress")
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