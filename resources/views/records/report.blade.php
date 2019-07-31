@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<head>
  <title>Report</title>
</head>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <br>
  <br>
  <h2> Report </h2>
  <br>
  <br>

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="insulinSelector" value="Insulin" onchange="showHideInsulin(this, 'insulinSection')" checked>
    <label class="form-check-label" for="insulinSelector">insulin</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="glucoseSelector" value="Glucose" onchange="showHideInsulin(this, 'glucoseSection')" checked>
    <label class="form-check-label" for="glucoseSelector">Glucose</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="carbohydratesSelector" value="Carbohydrates" onchange="showHideInsulin(this, 'carbohydratesSection')" checked>
    <label class="form-check-label" for="carbohydratesSelector">Carbohydrates</label>
  </div>
  <section id="insulinSection">
    @if (count($valuesInsulin) === 0)
        <p class='p-3 mb-2 bg-danger text-white text-center'>There are no records to create a report</p>
    @endif
    <div style="width=50vw; height=80vh;">
        {!! $chartInsulin->container() !!}
        {!! $chartInsulin->script() !!}
    </div>
  </section>
  <section id="glucoseSection">
    @if (count($valuesGlucose) === 0)
        <p class='p-3 mb-2 bg-danger text-white text-center'>There are no records to create a report</p>
    @endif
    <div style="width=50vw; height=80vh;">
        {!! $chartGlucose->container() !!}
        {!! $chartGlucose->script() !!}
    </div>
  </section>
  <section id="carbohydratesSection">
    @if (count($valuesCarbohydrates) === 0)
        <p class='p-3 mb-2 bg-danger text-white text-center'>There are no records to create a report</p>
    @endif
    <div style="width=50vw; height=80vh;">
        {!! $chartCarbohydrates->container() !!}
        {!! $chartCarbohydrates->script() !!}
  </div>
</section>
<div>
@endsection
