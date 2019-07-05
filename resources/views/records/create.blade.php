@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<head>
  <title>Create new record</title>
</head>
<div class="card uper">
  <div class="card-header">
    Add Record
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
      <form method="post" action="{{ route('records.store') }}">
          <div class="form-group">
              @csrf
              <label for="glucose">Glucose:</label>
              <input type="text" class="form-control" name="glucose"/>
          </div>
          <div class="form-group">
              <label for="insulin">Insulin:</label>
              <input type="text" class="form-control" name="insulin"/>
          </div>
          <div class="form-group">
              <label for="carbohydrates">Carbohydrates:</label>
              <input type="text" class="form-control" name="carbohydrates"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="date">Date and time:</label>
              <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>"/>
              <input type="time" class="form-control" name="time" value="<?php echo date("H:i"); ?>"/>
          </div>
          <button type="submit" class="btn btn-primary">Add record</button>
          <a href="{{ url('records')}}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection
