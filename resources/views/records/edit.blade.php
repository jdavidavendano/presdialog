@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Record
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
        <form method="post" action="{{ route('records.update', $record->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="glucose">Glucose:</label>
                <input type="text" class="form-control" name="glucose" value="{{ $record->glucose }}"/>
            </div>
            <div class="form-group">
                <label for="insulin">Insulin:</label>
                <input type="text" class="form-control" name="insulin" value="{{ $record->insulin }}"/>
            </div>
            <div class="form-group">
                <label for="carbohydrates">Carbohydrates:</label>
                <input type="text" class="form-control" name="carbohydrates" value="{{ $record->carbohydrates }}"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value="{{ $record->description }}"/>
            </div>
            <div class="form-group">
              <label for="date">Date and time:</label>
              <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>"/>
              <input type="time" class="form-control" name="time" value="<?php echo date("H:m"); ?>"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('records')}}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</div>
@endsection