@extends('base')

@section('contenido')
<div class="row align-items-start">
    <div class="col">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('storage').'/'.$alumno->foto }}" class="img-fluid rounded-start" alt="Foto del alumno">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title text-muted">Alumno: {{$alumno->nombre}}</h5>
              <p class="card-text text-muted">Sexo: {{$alumno->sexo}}</p>
              <p class="card-text text-muted">Edad: {{$alumno->edad}}</p>
              <p class="card-text"><small class="text-muted">Carrera: {{$alumno->carreras->nombre}}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="col">
      <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
            Mostrar Materias
        </button>
      </p>
      <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample">
          <div class="card card-body" style="width: 500px;">
            <form method="POST" action="/alumnomaterias">
                @csrf
                <select class="form-select" aria-label="Carreras en la escuela" id="materia_id" name="materia_id">
                  @foreach ($materiascarrera as $disponible)
                  <option value="{{$disponible->id}}">{{$disponible->nombre}}</option>  
                  @endforeach
                </select>
                <input type="hidden" value="{{$alumno->id}}" id="alumno_id" name="alumno_id">
                <button class="btn btn-primary" type="submit">Agregar Materia</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <table class="table table-success table-striped">
        <thead>
            <th scope="col">Materia</th>
            <th scope="col">Creditos</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($alumno->materias as $materia)
            <tr>
                <td>{{$materia->nombre}}</td>
                <td>{{$materia->creditos}}</td>
                <td>
                <div class="row align-items-start">
                    <div class="col">
                    <form action="/alumnomaterias/{{$materia->pivot->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onClick="return confirm('¿Estas seguro?')" class="btn btn-danger" type="submit">
                            Quitar materia
                        </button>
                    </form>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
