@extends('layouts.app')

@section('content') 
  <div class="container-fluid">
    @include('includes.messages')
  </div>
  <h1 class="text-center display-4 mt-4 mb-5">Nova locação</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'LocacaoController@store', 'method' => 'POST', 'id'=>'locacao']) !!}
        <div class="row">
          @if(Auth::user()->type == 'c')
            <div class="col">
              <div class="form-group{{ $errors->has('dataInicio') ? ' has-error' : '' }}">
                {{Form::label('dataInicio', 'Data de Início')}}
                <input type="text" id="dataInicio" name="dataInicio" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#dataInicio" placeholder="Informe a data de início da locação">
                @if ($errors->has('dataInicio'))
                  <span class="text-danger help-block">
                    <strong>{{ $errors->first('dataInicio') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="col">
              <div class="form-group{{ $errors->has('dataFim') ? ' has-error' : '' }}">
                {{Form::label('dataFim', 'Data de Fim')}}
                <input type="text" id="dataFim" name="dataFim" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#dataFim" placeholder="Informe a data de fim da locação">
              </div>
              @if ($errors->has('dataFim'))
                <span class="text-danger help-block">
                  <strong>{{ $errors->first('dataFim') }}</strong>
                </span>
              @endif
            </div>
          @else
            <div class="col">
              <div class="form-group{{ $errors->has('dataInicio') ? ' has-error' : '' }}">
                {{Form::label('dataInicio', 'Data')}}
                <input type="text" id="dataInicio" name="dataInicio" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#dataInicio" placeholder="Informe a data da locação">
                @if ($errors->has('dataInicio'))
                  <span class="text-danger help-block">
                    <strong>{{ $errors->first('dataInicio') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group{{ $errors->has('horaInicio') ? ' has-error' : '' }}">
              {{Form::label('horaInicio', 'Hora de Início')}}
              <input type="text" id="horaInicio" name="horaInicio" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#horaInicio" placeholder="Informe a hora de início da locação">
              @if ($errors->has('horaInicio'))
                <span class="text-danger help-block">
                  <strong>{{ $errors->first('horaInicio') }}</strong>
                </span>
              @endif
            </div>
          </div>
          
          <div class="col">
            <div class="form-group{{ $errors->has('horaFim') ? ' has-error' : '' }}">
              {{Form::label('horaFim', 'Hora de Fim')}}
              <input type="text" id="horaFim" name="horaFim" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#horaFim" placeholder="Informe a hora de fim da locação">
            </div>
            @if ($errors->has('horaFim'))
                  <span class="text-danger help-block">
                    <strong>{{ $errors->first('horaFim') }}</strong>
                  </span>
                @endif
          </div>
        </div>
        <div class="form-group">
          <label>Ambiente</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"  name="amb" value="lab"> Laboratório
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio"  name="amb" value="sala">Sala
          </div>
        </div>
        <div id="ambiente">
          <div id="selectLabs" class="form-group">
            <label for="laboratorio">Laboratório</label> 
            <a class="btn btn-sm btn-link" data-toggle="modal" data-target="#modalLabs">
              <i class="fas fa-info"></i> 
              Detalhes
            </a>
            <select id="laboratorio" name="idLaboratorio" class="form-control">
              @foreach($labs as $lab)
                <option value="{{$lab->id}}">{{$lab->nome}}</option>
              @endforeach
            </select>
          </div>
          <div id="selectSalas" class="form-group">
            <label for="laboratorio">Sala</label> 
            <a class="btn btn-sm btn-link" data-toggle="modal" data-target="#modalSalas">
              <i class="fas fa-info"></i> 
              Detalhes
            </a>
            <select id="sala" name="idSala" class="form-control">
              @foreach($salas as $sala)
                <option value="{{$sala->id}}">{{$sala->nome}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
          {{Form::label('descricao', 'Decrição')}}
          {{Form::textarea('descricao', '', ['class'=>'form-control','placeholder'=>'Informe a descrição da locação'])}}
          @if ($errors->has('descricao'))
            <span class="text-danger help-block">
              <strong>{{ $errors->first('criacao') }}</strong>
            </span>
          @endif
        </div>
        {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}}
      {!! Form::close() !!}
    
    </div>
  </div>

  <!-- Modal Laboratorios -->
  <div class="modal fade" id="modalLabs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes dos Laboratórios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-hover table-borderless">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Nro de Computadores</th>
                    <th>Localização</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($labs as $laboratorio)
                    <tr>
                      <td>{{ $laboratorio->nome }}</td>
                      <td>{{ $laboratorio->nroComputadores }}</td>
                      <td>{{ $laboratorio->localizacao->local }} - {{ $laboratorio->localizacao->andar }} andar</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Salas -->
  <div class="modal fade" id="modalSalas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes das Salas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-hover table-borderless">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Nro de Vagas</th>
                    <th>Localização</th>
                    <th>Tem projetor?</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($salas as $sala)
                    <tr>
                      <td>{{ $sala->nome }}</td>
                      <td>{{ $sala->nroVagas }}</td>
                      <td>{{ $sala->localizacao->local }} - {{ $sala->localizacao->andar }} andar</td>
                      @if($sala->temProjetor == false) 
                        <td>Não</td>
                      @else
                        <td>Sim</td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    //configuração dos campos de data e hora
    $(document).ready(function() {
      $('#dataInicio').datetimepicker({
        locale: 'pt-br',
        format: 'L',
      });
      $('#dataFim').datetimepicker({
        locale: 'pt-br',
        format: 'L',
        
      });
      $('#horaInicio').datetimepicker({
        locale: 'pt-br',
        format: 'LT'
      });
      $('#horaFim').datetimepicker({
        locale: 'pt-br',
        format: 'LT'
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // mostra campo select de acordo com o tipo de ambiente escolhido
      $("#locacao input:radio").on('change', function() {
        let ambiente = $('input[name=amb]:checked', '#locacao').val();
        if(ambiente == 'lab') {
          $('#selectLabs').show();
          $('#selectSalas').hide();
        } else {
          $('#selectLabs').hide();
          $('#selectSalas').show();
        }
      });
    });
  </script>
@endsection