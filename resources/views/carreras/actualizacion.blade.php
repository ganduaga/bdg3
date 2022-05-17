@extends('base')

@section('contenido')
<div class="text-center">
    <h2>Edición de carreras</h2>
    <p class="lead">Completa los datos solicitados</p>
</div>
  <div class="row justify-content-center my-5">
    <div class="col-lg-6">
      <form action="/carrera/{{$carrera->id}}" method="POST">
        @csrf
        @method('PATCH')
        @include('carreras.formulario')
@endsection