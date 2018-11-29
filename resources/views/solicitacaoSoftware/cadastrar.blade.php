@extends('layouts.app')

@section('content') 
  <h1 class="text-center display-4 mt-4 mb-5">Nova Solicitação de Software</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      {!! Form::open(['action'=>'SolicitacaoSoftwareController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        <label for="software">Software</label> 
        <a class="btn btn-sm btn-link" data-toggle="modal" data-target="#modalSW">
          <i class="fas fa-info"></i> 
          Detalhes
        </a>
        <select id="Software" name="idSoftware" class="form-control" onchange="addNovo()">
          @foreach($sw as $s)
            <option value="{{$s->id}}">{{$s->nome}}</option>
          @endforeach
          <option value="0" id="outro">Outro</option>
        </select>
      </div>
      <div id="novoSW"></div>
      <div class="form-group">
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
      {{Form::submit('Cadastrar', ['class'=>'btn btn-success btn-block'])}} <br>
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
    <!-- Modal Software -->
  <div class="modal fade" id="modalSW" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <th>Descrição</th>
                    <th>Versão</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sw as $s)
                    <tr>
                      <td>{{ $s->nome }}</td>
                      <td>{{ $s->descricao }}</td>
                      <td>{{ $s->versao }}</td>
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
    let criado = false;

    function addNovo() {
      let novosw = document.getElementById("novoSW");
      let novoOption = document.querySelector('#outro');
      if(!criado && novoOption.selected) {
        criarCampo(novosw, 'nome', 'Nome', 'Informe o nome do Software');
        criarCampo(novosw, 'descricao', 'Descrição', 'Informe a descrição do Software');
        criarCampo(novosw, 'versao', 'Versão', 'Informe a versão do Software');
        criado = true;
        novosw.setAttribute('class', 'add');
      } else {
        novosw.removeChild(document.getElementById('nome'));
        novosw.removeChild(document.getElementById('descricao'));
        novosw.removeChild(document.getElementById('versao'));
        criado = false;
        novosw.setAttribute('class', 'remove');
      }
    }
    function criarCampo(novo, name, texto, placeholder) {
      let div = document.createElement('div');
      let label = document.createElement('label');
      let input = document.createElement('input');
      div.setAttribute('class', 'form-group');
      div.setAttribute('id', name);
      label.setAttribute('for', name);
      label.textContent = texto;
      input.setAttribute('id', name);
      input.setAttribute('name', name);
      input.setAttribute('class', 'form-control');
      input.setAttribute('type', 'text');
      input.setAttribute('placeholder', placeholder);
      div.appendChild(label);
      div.appendChild(input);
      novo.appendChild(div);
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#laboratorio').change(function(e) {
        e.preventDefault();
        let lab = $('#laboratorio').val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({

        });
      });
    });
  </script>
@endsection