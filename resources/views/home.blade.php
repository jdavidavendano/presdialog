@extends('layouts.app')

@section('content')
<head>
  <title>Home</title>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->hasRole('Paciente'))
                        <a href="{{url('records')}}" class="btn btn-primary">Records</a>
                        <a href="{{ route('records.create')}}" class="btn btn-primary">Add record</a>
                    @elseif (Auth::user()->hasRole('Medico'))
                        <a href="{{url('medical_rs')}}" class="btn btn-primary">Medical records</a>
                        <a href="{{ route('medical_rs.create')}}" class="btn btn-primary">Create medical record</a>
                    @else 
                        <a href="{{url('medical_rs')}}" class="btn btn-primary">Medical records</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
