@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Nova Sala</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'AmbienteController@store', 'method' => 'POST']) !!}
        {{Form::hidden('tipo','S')}}
        <div class="form-group">
          {{Form::label('nome', 'Nome')}}
          {{Form::text('nome', '', ['class'=>'form-control','placeholder'=>'Informe nome da sala'])}}
        </div>
        <div class="form-group">
          {{Form::label('nroVagas', 'Número de Vagas')}}
          {{Form::number('nroVagas', '', ['class'=>'form-control','placeholder'=>'Informe o número de vagas'])}}
        </div>
        <div class="form-group">
          <label for="localizacao">Localização</label>  
          <select id="localizacao" name="idLocalizacao" class="form-control">
            @foreach($localizacoes as $localizacao)
              <option value="{{$localizacao->id}}">{{$localizacao->local}} - {{$localizacao->andar}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
          {{Form::checkbox('temProjetor', '')}}
          {{Form::label('temProjetor', 'Tem projetor?')}}
        </div>
        {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}} <br>
      {!! Form::close() !!}
    </div>
  </div>

@endsection