@extends('layouts.main')
@section("content")
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand text-white">All Contacts</span>
            <a href="/contacts/create" class="btn btn-success">Add New</a>
        </div>
    </nav>
    <div class="p-2 bg-light">
        <div class="container-fluid w-100 d-flex flex-row-reverse">
          <form class="d-flex input-group w-50">
            <select name="" id="" class="form-control w-50 me-5">
                <option value="company1">company1</option>
                <option value="company1">company1</option>
                <option value="company1">company1</option>
                <option value="company1">company1</option>
            </select>
            <div class="input-group">
                <div class="form-outline">
                  <input id="search-input" type="search" id="form1" class="form-control" />
                  <label class="form-label" for="form1">Search</label>
                </div>
                <button id="search-button" type="button" class="btn btn-outline-secondary">
                    <i class="fas fa-refresh"></i>
                </button>
                <button id="search-button" type="button" class="btn btn-outline-secondary">
                  <i class="fas fa-search"></i>
                </button>
            </div>
          </form>
        </div>

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
              @foreach ($contacts as $contact)
                <tr>
                  <th>{{$contact->id}}</th>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->phone}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->company}}</td>
                  <td class="d-flex justify-content-between align-items-center">
                    <a href="contacts/show" class="btn btn-outline-info btn-floating d-flex justify-content-center align-items-center">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="contacts/edit" class="btn btn-outline-secondory btn-floating d-flex justify-content-center align-items-center">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="contacts/destroy">
                      @csrf
                      <button class="btn btn-outline-danger btn-floating d-flex justify-content-center align-items-center">
                        <i class="fa fa-x"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
            {{ $contacts->links() }}
          </div>
        </div>
      </div>
@endsection