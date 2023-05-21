<tr>
    <th>{{$company->id}}</th>
    <td>{{$company->name}}</td>
    <td>{{$company->adress}}</td>
    <td>{{$company->email}}</td>
    <td class="d-flex justify-content-between align-items-center gap-2">
      <a href="companies/{{$company->id}}" class="btn btn-outline-info btn-floating d-flex justify-content-center align-items-center">
        <i class="fa fa-eye"></i>
      </a>
      <a href="{{route("companies.edit", $company->id)}}" class="btn btn-outline-secondory btn-floating d-flex justify-content-center align-items-center">
        <i class="fa fa-edit"></i>
      </a>
      <form action="{{route("companies.destroy", $company->id)}}" method="POST">
        @method("DELETE")
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-floating d-flex justify-content-center align-items-center">
          <i class="fa fa-x"></i>
        </button>
      </form>
    </td>
  </tr>