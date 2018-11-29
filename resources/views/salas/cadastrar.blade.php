@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Nova Sala</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'SalasController@store', 'method' => 'POST']) !!}
        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
          {{Form::label('nome', 'Nome')}}
          {{Form::text('nome', '', ['class'=>'form-control','placeholder'=>'Informe nome da sala'])}}
          @if ($errors->has('nome'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('nome') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('nroVagas') ? ' has-error' : '' }}">
          {{Form::label('nroVagas', 'Número de Vagas')}}
          {{Form::number('nroVagas', '', ['class'=>'form-control','placeholder'=>'Informe o número de vagas'])}}
          @if ($errors->has('nroVagas'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('nroVagas') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <label for="localizacao">Localização</label>  
          <select id="localizacao" name="idLocalizacao" class="form-control">
            @foreach($localizacoes as $localizacao)
              <option value="{{$localizacao->id}}">{{$localizacao->local}} - {{$localizacao->andar}} andar</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
          {{Form::checkbox('temProjetor', '1')}}
          {{Form::label('temProjetor', 'Tem projetor?')}}
        </div>
        {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection