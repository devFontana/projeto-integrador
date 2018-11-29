@extends('layouts.app')

@section('content') 
  <div class="container-fluid">
      @include('includes.messages')
  </div>
  @if(count($solicitacoes) > 0)
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Solicitações de Software</h2>
                @if(Auth::user()->type != 'a')
                  <a href="/solicitacao-software/cadastrar" class="btn btn-success">Cadastrar</a>
                @endif
            </div>
            <div class="card-body mt-2" id="card-tbl">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        @if(Auth::user()->type == 'a')
                          <th>Usuário</th>
                        @endif
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Versão</th>
                        <th>Laboratório</th>
                        <th>Data de Solicitação</th>
                        <th>Data de Instalação</th>
                        <th>Status</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($solicitacoes as $s)
                        <tr>
                          @if(Auth::user()->type == 'a')
                            <td>{{$s->user->name}}</td>
                          @endif
                          <td>{{ $s->software->nome }}</td>
                          <td>{{ $s->software->descricao }}</td>
                          <td>{{ $s->software->versao }}</td>
                          <td>{{ $s->laboratorio->nome }}</td>
                          <td>{{ $s->dataSolicitacao }}</td>
                          @if($s->dataInstalaçao == null)
                            <td>Não instalado</td>
                          @else
                            <td>{{ $s->dataInstalaçao }}</td>
                          @endif
                          <td>{{ $s->status }}</td>
                          <td>
                            {!! Form::open(['action'=>['SolicitacaoSoftwareController@updateStatus', $s->id], 'method' => 'POST']) !!}
                              {{ method_field("PUT") }}
                              {{ csrf_field() }}
                              @if($s->status != 'Cancelado')
                                @if($s->status != 'Instalado' )
                                  @if($s->status == 'Solicitado')
                                    {{Form::hidden('statusNovo', 'Instalando')}}
                                  @else
                                    {{Form::hidden('statusNovo', 'Instalado')}}
                                  @endif
                                  @if(Auth::user()->type == 'a')
                                    <button class="btn btn-sm btn-outline-info" type="submit">Mudar Status</button>
                                  @endif
                                @endif
                              @endif
                              @if($s->status == 'Solicitado' && Auth::user()->type != 'a')
                                <a href="/solicitacao-software/{{$s->id}}/editar" class="btn btn-sm btn-outline-warning">Cancelar</a>
                                
                              @endif
                            {!! Form::close() !!}                        
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <br>  
    <h2 class="text-center mb-3">Nenhuma solicitação realizada.</h2>
    <div class="container">
      <div class="col-md-6 offset-md-3">
        <a href="/solicitacao-software/cadastrar" class="btn btn-success btn-block">Solicitar Software</a>
      </div>
    </div>
  @endif


  <!-- Modal Exclusão -->
  <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <form id="deleteLocalForm" action="/solicitacao-software/" method="POST">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            {{ method_field("DELETE") }}
            {{ csrf_field() }}
            <button class="btn btn-danger" type="submit">Excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
      $('.botaoExcluir').on('click', function (event) {
        var id = $(this).data('id');
        let action = $("#deleteLocalForm").attr('action')  + id;
        console.log(action);
        $('#deleteLocalForm').attr('action', action);
      });

      $('.modal').on('hidden.bs.modal', function() {
        let action = $("#deleteLocalForm").attr('action');
        action = action.replace(/[0-9]/g, "");
        $("#deleteLocalForm").attr('action',action)
      });
  </script>
@endsection