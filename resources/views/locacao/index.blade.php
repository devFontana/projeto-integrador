@extends('layouts.app')

@section('content') 
  <div class="container-fluid">
      @include('includes.messages')
  </div>
  @if(count($locacoes) > 0)
    <div class="container">
      <div class="row">
        <div class="col-md-10 ">
          <div class="card mt-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Locações</h2>
                <a href="/locacao/cadastrar" class="btn btn-success">Cadastrar</a>
            </div>
            <div class="card-body mt-2" id="card-tbl">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Local</th>
                        <th>Data de Início</th>
                        <th>Hora de Início</th>
                        <th>Data do Fim</th>
                        <th>Hora do Fim</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($locacoes as $locacao)
                        <tr>
                          @if($locacao->laboratorio !=null)
                            <td>{{$locacao->laboratorio->nome}}</td>
                          @else
                          <td>{{$locacao->sala->nome}}</td>
                          @endif
                          <td>{{$locacao->dataInicio}}</td>
                          <td>{{$locacao->horaInicio}}</td>
                          <td>{{$locacao->dataFim}}</td>
                          <td>{{$locacao->horaFim}}</td>
                          <td>{{$locacao->descricao}}</td>
                          <td>
                          @if(\Carbon\Carbon::now()->lessThanOrEqualTo($locacao->dataInicio))
                              <a class="botaoExcluir btn btn-sm btn-outline-warning" href="#" data-toggle="modal" data-target="#modalExclusao" data-id="{{ $locacao->id }}">Cancelar</a>
                          @endif
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
    <h2 class="text-center mb-3">Nenhuma locação realizada.</h2>
    <div class="container">
      <div class="col-md-6 offset-md-3">
        <a href="/locacao/cadastrar" class="btn btn-success btn-block">Cadastrar</a>
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
          <form id="deleteLocalForm" action="/locacao/" method="POST">
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