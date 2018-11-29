@extends('layouts.app')

@section('content') 

  <h1 class="text-center display-4 mt-4 mb-5">Editar Localização</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>['LocalizacaoController@update', $localizacao->id], 'method' => 'POST']) !!}
        <div class="form-group">
          {{Form::label('local', 'Local')}}
          {{Form::text('local', $localizacao->local, ['class'=>'form-control','placeholder'=>'Informe o local'])}}
        </div>
        <div class="form-group">
          {{Form::label('andar', 'Andar')}}
          {{Form::number('andar', $localizacao->andar , ['class'=>'form-control','placeholder'=>'Informe o andar'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Alterar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection