@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Novo Software</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'SoftwareController@store', 'method' => 'POST']) !!}
        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
          {{Form::label('nome', 'Nome')}}
          @if ($errors->has('nome'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('nome') }}</strong>
            </span>
          @endif
          {{Form::text('nome', '', ['class'=>'form-control','placeholder'=>'Informe nome da software'])}}
          
        </div>
        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
          {{Form::label('decricao', 'Descrição')}}
          @if ($errors->has('descricao'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('descricao') }}</strong>
            </span>
          @endif
          {{Form::textarea('descricao', '', ['class'=>'form-control','placeholder'=>'Informe a descrição do Software'])}}
          
        </div>
        <div class="form-group{{ $errors->has('versao') ? ' has-error' : '' }}">
          {{Form::label('versao', 'Versão')}}
          @if ($errors->has('nome'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('versao') }}</strong>
            </span>
          @endif
          {{Form::text('versao', '', ['class'=>'form-control','placeholder'=>'Informe a versão do Software'])}}
        </div>
        {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection