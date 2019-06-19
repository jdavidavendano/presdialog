@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('records.create')}}" class="btn btn-primary">Create</a>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Glucose</td>
          <td>Insulin</td>
          <td>Carbohydrates</td>
          <td>Description</td>
          <td>Date and time</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{$record->glucose}}</td>
            <td>{{$record->insulin}}</td>
            <td>{{$record->carbohydrates}}</td>
            <td>{{$record->description}}</td>
            <td>{{$record->date}}</td>
            <td><a href="{{ route('records.edit',$record->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('records.destroy', $record->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection