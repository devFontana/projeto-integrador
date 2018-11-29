@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Alterar Laboratório</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>['LaboratorioController@update', $laboratorio->id], 'method' => 'POST']) !!}
        <div class="form-group">
          {{Form::label('nome', 'Nome')}}
          {{Form::text('nome', $laboratorio->nome, ['class'=>'form-control','placeholder'=>'Informe nome da Laboratorio'])}}
        </div>
        <div class="form-group">
          {{Form::label('nroComputadores', 'Número de Computadores')}}
          {{Form::number('nroComputadores', $laboratorio->nroComputadores, ['class'=>'form-control','placeholder'=>'Informe o número de computadores'])}}
        </div>
        <div class="form-group">
          <label for="localizacao">Localização</label>  
          <select id="localizacao" name="idLocalizacao" class="form-control">
              @foreach($localizacoes as $localizacao)
              @if($localizacao->id == $laboratorio->localizacao->id)
                <option value="{{$localizacao->id}}" selected>{{$localizacao->local}} - {{$localizacao->andar}} andar</option>
              @else 
                <option value="{{$localizacao->id}}">{{$localizacao->local}} - {{$localizacao->andar}} andar</option>
              @endif
            @endforeach
            </select>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Alterar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection