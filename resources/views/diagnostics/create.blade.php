@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create diagnostic
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
      <form method="post" action="{{ route('diagnostics.store') }}">
          <div class="form-group">
              @csrf
              <label for="userId">User ID:</label>
              <input type="number" class="form-control" name="userId"/>
          </div>
          <div class="form-group">
              <label for="symptom">Symptom :</label>
              <input type="text" class="form-control" name="symptom"/>
          </div>
          <div class="form-group">
              <label for="affliction">Affliction:</label>
              <input type="text" class="form-control" name="affliction"/>
          </div>
          <div class="form-group">
              <label for="treatment">Treatment:</label>
              <input type="text" class="form-control" name="treatment"/>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
</div>
@endsection