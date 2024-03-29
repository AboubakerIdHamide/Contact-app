@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">All Contacts</span>
            <a href="/contacts/create" class="btn btn-success">Add New</a>
        </div>
    </nav>
    <div class="p-2 bg-light">
        {{-- Filter --}}
        @includeIf("contacts._filter")

        {{-- Table --}}
        <hr>
        <div class="container">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">FirstName</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Company</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Great Why To Include Component --}}
              @each ("contacts._contact", $data["contacts"], "contact", "contacts._empty")
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            {{ $data["contacts"]->links() }}
          </div>
        </div>
      </div>
@endsection