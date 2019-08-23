@extends('layouts.app')

@section('content')
<head>
  <title>Home</title>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($diagnostics) == 0)
            <p class='p-3 mb-2 bg-danger text-white text-center'>There are no diagnostics to show</p>
            @else
                @foreach($diagnostics as $diagnostic)
                    <div class="card" style="margin-top:1rem;">
                        <div class="card-header"><h3>{{$diagnostic->symptom}}</h3></div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif     

                            <p><span style="font-size:1.2rem; font-weight:bold;">Affliction:</span> {{$diagnostic->affliction}}</p>
                                
                            <p><span style="font-size:1.2rem; font-weight:bold;">Treatment:</span> {{$diagnostic->treatment}}</p>
                        </div>
                    </div>
                @endforeach 
            @endif   
        </div>
    </div>
</div>
@endsection
