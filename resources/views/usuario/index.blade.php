@extends('layouts.app')

@section('content') 
  <div class="container-fluid">
      @include('includes.messages')
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-1">
          <div class="card mt-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Usuários</h2>
            </div>
            <div class="card-body mt-2" id="card-tbl">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>E-mail</th>  
                        <th>Tipo</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($usuarios as $usuario)
                        <tr>
                          <td>{{ $usuario->name }}</td>
                          <td>{{ $usuario->email }}</td>
                          @if($usuario->type == 'a')
                            <td>Administrador</td>
                          @elseif($usuario->type == 'c')
                            <td>Coordenador</td>
                          @elseif($usuario->type == 'p')
                            <td>Professor</td>
                          @else
                            <td>Funcionário</td>
                          @endif
                          <td>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm" id="tipo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mudar Tipo <i class="fas fa-caret-down"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="/usuarios/{{$usuario->id}}/f">Funcionário</a>
                                  <a class="dropdown-item" href="/usuarios/{{$usuario->id}}/p">Professor</a>
                                  <a class="dropdown-item" href="/usuarios/{{$usuario->id}}/c">Coordenador</a>
                                  <a class="dropdown-item" href="/usuarios/{{$usuario->id}}/a">Administardor</a>
                                </div>
                            </div>
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