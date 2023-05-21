<select name="company" id="" class="form-control w-50 me-5">
    <option value="">All Companies</option>
    @foreach ($data["companies"] as $company)
      <option value="{{$company->id}}" {{ request()->company == $company->id ? 'selected' : ''}}>{{$company->name}}</option>
    @endforeach
</select>