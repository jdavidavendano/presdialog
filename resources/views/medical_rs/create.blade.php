@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create medical record
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('medical_rs.store') }}">
          <div class="form-group">
              @csrf
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="id">ID:</label>
              <input type="number" class="form-control" name="id"/>
          </div>
          <div class="form-group">
              <label for="gender">Gender:</label>
              <select class='form-control' name="gender" id="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
          </div>
          <div class="form-group">
              <label for="birthDate">Birth date:</label>
              <input type="date" class="form-control" name="birthDate"/>
          </div>
          <div class="form-group">
              <label for="bloodType">Blood type:</label>
              <select class='form-control' name="bloodType" id="bloodType">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
</div>
@endsection