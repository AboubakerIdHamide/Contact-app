<tr>
    <th>{{$contact->id}}</th>
    <td>{{$contact->first_name}}</td>
    <td>{{$contact->phone}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->company->name}}</td>
    <td class="d-flex justify-content-between align-items-center gap-2">
      <a href="contacts/{{$contact->id}}" class="btn btn-outline-info btn-floating d-flex justify-content-center align-items-center">
        <i class="fa fa-eye"></i>
      </a>
      <a href="contacts/{{$contact->id}}/edit" class="btn btn-outline-secondory btn-floating d-flex justify-content-center align-items-center">
        <i class="fa fa-edit"></i>
      </a>
      <form action="{{route('contacts.destroy', $contact->id)}}" method="POST">
        @method("DELETE")
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-floating d-flex justify-content-center align-items-center">
          <i class="fa fa-x"></i>
        </button>
      </form>
    </td>
  </tr>