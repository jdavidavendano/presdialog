@extends('layouts.app')

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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Email</td>
          <td>ID</td>
          <td>Gender</td>
          <td>Birth date</td>
          <td>Blood type</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($medical_rs as $medical_r)
        <tr>
            <td>{{$medical_r->email}}</td>
            <td>{{$medical_r->id}}</td>
            <td>{{$medical_r->gender}}</td>
            <td>{{$medical_r->birthDate}}</td>
            <td>{{$medical_r->bloodType}}</td>
            <td>
                @if (Auth::user()->hasRole('Medico'))
                    <a href="{{route('diagnostics.show', $medical_r->id)}}" class="btn btn-primary">Check</a>
                @endif
            </td>

            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection