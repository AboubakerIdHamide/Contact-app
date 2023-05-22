@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">Deleted Contacts</span>            
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
              @unless (empty($data["contacts"]))
                @foreach ($data["contacts"] as $contact)
                  <tr>
                    <th>{{$contact->id}}</th>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->company->name}}</td>
                    <td class="d-flex justify-content-between align-items-center gap-2">
                      <form action="{{route('contacts.restore', $contact->id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-floating d-flex justify-content-center align-items-center">
                          <i class="fa fa-refresh"></i>
                        </button>
                      </form>
                      <form action="{{route('contacts.forceDelete', $contact->id)}}" method="POST">
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
                  @include("contacts._empty")
              @endunless
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            {{ $data["contacts"]->links() }}
          </div>
        </div>
      </div>
@endsection