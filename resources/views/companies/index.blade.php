@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">All Companies</span>
            <a href="/companies/create" class="btn btn-success">Add New</a>
        </div>
    </nav>
    <div class="p-2 bg-light">
        {{-- Filter --}}
        @includeIf("companies._filter")

        {{-- Table --}}
        <hr>
        <div class="container">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Adress</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Great Why To Include Component --}}
              @each ("companies._company", $companies, "company", "companies._empty")
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            {{ $companies->links() }}
          </div>
        </div>
      </div>
@endsection