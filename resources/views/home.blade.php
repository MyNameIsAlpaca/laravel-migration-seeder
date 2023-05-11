@extends('layout/main-layout')

@section('content')
<div class="background">
  <div class="container">
    <h1>Lista dei Treni in laravel</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Partenza</th>
          <th scope="col">Arrivo</th>
          <th scope="col">Ora di partenza</th>
          <th scope="col">Ora di arrivo</th>
          <th scope="col">Numero</th>
          <th scope="col">Carrozze</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($trains as $train)
        <tr>
          <th scope="row">{{$train['company']}}</th>
          <td>{{$train['start_station']}}</td>
          <td>{{$train['destination_station']}}</td>
          <td>{{$train['time_departure']}}</td>
          <td>{{$train['time_arrive']}}</td>
          <td>{{$train['train_number']}}</td>
          <td>{{$train['train_carriage']}}</td>
          <td class="@if($train['cancelled'] == 1) cancelled @elseif($train['in_time'] == 0) delay @else in-time @endif">&#x2022</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="legend">
    <span class="title">Legenda:</span> 
    <div>
      <span class="section-legend"><span class="in-time">&#x2022</span> = Treno in orario</span>
      <br>
      <span class="section-legend"><span class="delay">&#x2022</span> = Treno in ritardo</span>
      <br>
      <span class="section-legend"><span class="cancelled">&#x2022</span> = Treno cancellato</span>
    </div>

  </div>
</div>


@endsection