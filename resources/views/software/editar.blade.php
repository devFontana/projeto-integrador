@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Alterar Software</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>['SoftwareController@update', $software->id], 'method' => 'POST']) !!}
        <div class="form-group">
          {{Form::label('nome', 'Nome')}}
          {{Form::text('nome', $software->nome, ['class'=>'form-control','placeholder'=>'Informe nome da software'])}}
        </div>
        <div class="form-group">
          {{Form::label('decricao', 'Descrição')}}
          {{Form::textarea('descricao', $software->descricao, ['class'=>'form-control','placeholder'=>'Informe a descrição do Software'])}}
        </div>
        <div class="form-group">
            {{Form::label('versao', 'Versão')}}
            {{Form::text('versao', $software->versao, ['class'=>'form-control','placeholder'=>'Informe a versão do Software'])}}
          </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Alterar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection