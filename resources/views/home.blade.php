@extends('layouts.app')

@section('content')
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
                    @else
                        <p>Hi {{ Auth::user()->username }} you're not patient (Work in progress).</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
