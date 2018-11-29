@extends('layouts.app')

@section('content') 

  <h1 class="text-center display-4 mt-4 mb-5">Nova Localização</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'LocalizacaoController@store', 'method' => 'POST']) !!}
        <div class="form-group{{ $errors->has('local') ? ' has-error' : '' }}">
          {{Form::label('local', 'Local')}}
          {{Form::text('local', '', ['class'=>'form-control','placeholder'=>'Informe o local'])}}
          @if ($errors->has('local'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('local') }}</strong>
            </span>
          @endif
        </div> 
        <div class="form-group{{ $errors->has('andar') ? ' has-error' : '' }}">
          {{Form::label('andar', 'Andar')}}
          {{Form::number('andar', '', ['class'=>'form-control','placeholder'=>'Informe o andar'])}}
          @if ($errors->has('andar'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('andar') }}</strong>
            </span>
          @endif
        </div>
        {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection