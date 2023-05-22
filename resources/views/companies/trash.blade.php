@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Deleted Companies</span>
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
              @unless (empty($companies))
                @foreach ($companies as $company)
                  <tr>
                    <th>{{$company->id}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->adress}}</td>
                    <td>{{$company->email}}</td>
                    <td class="d-flex justify-content-between align-items-center gap-2">
                      <form action="{{route("companies.restore", $company->id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-floating d-flex justify-content-center align-items-center">
                          <i class="fa fa-refresh"></i>
                        </button>
                      </form>
                      <form action="{{route("companies.forceDelete", $company->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-floating d-flex justify-content-center align-items-center">
                          <i class="fa fa-x"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else  
                @include("companies._empty")
              @endunless
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            {{ $companies->links() }}
          </div>
        </div>
      </div>
@endsection