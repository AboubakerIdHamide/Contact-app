@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Add New Contact</span>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <form class="w-50 m-auto bg-white">
            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" id="form4Example1" class="form-control" />
              <label class="form-label" for="form4Example1">Name</label>
            </div>
          
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form4Example2" class="form-control" />
              <label class="form-label" for="form4Example2">Email address</label>
            </div>
          
          
            <hr>
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary me-3">Save</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection