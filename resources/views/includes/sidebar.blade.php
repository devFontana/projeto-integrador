<div id="sidebar" class="col-md-2 ">
  <div class="accordion" id="sidemenu">
    @if(Auth::user()->type == 'f' || Auth::user()->type == 'p' || Auth::user()->type == 'c')
      <div class="card">
        <div class="card-header" id="locacao-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#locacao-collapse" aria-expanded="false" aria-controls="locacao-menu">
              Locação
            </button>
          </h5>
        </div>
    
        <div id="locacao-collapse" class="collapse" aria-labelledby="locacao-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/home">Calendário</a>
              </li>              
              @if(Auth::user()->type == 'p' || Auth::user()->type == 'c')
                <li class="nav-item">
                  <a class="nav-link active" href="/locacao">Minhas Locações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/locacao/cadastrar">Nova locação</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    @endif

    @if(Auth::user()->type == 'a' || Auth::user()->type == 'p' || Auth::user()->type == 'c')
    <div class="card">
        <div class="card-header" id="solicitacaoSoftware-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#solicitacaoSoftware-collapse" aria-expanded="false" aria-controls="solicitacaoSoftware-menu">
              Solicitação de Software
            </button>
          </h5>
        </div>
    
        <div id="solicitacaoSoftware-collapse" class="collapse" aria-labelledby="solicitacaoSoftware-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/solicitacao-software">Listar</a>
              </li>
              @if(Auth::user()->type == 'p' || Auth::user()->type == 'c')
                <li class="nav-item">
                  <a class="nav-link" href="/solicitacao-software/cadastrar">Nova Solicitação</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    @endif
    @if(Auth::user()->type == 'a')
      <div class="card">
        <div class="card-header" id="sala-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sala-collapse" aria-expanded="false" aria-controls="salas-menu">
              Salas
            </button>
          </h5>
        </div>
    
        <div id="sala-collapse" class="collapse" aria-labelledby="sala-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/sala">Listar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/sala/cadastrar">Nova Sala</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="lab-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#lab-collapse" aria-expanded="false" aria-controls="lab-menu">
              Laboratório
            </button>
          </h5>
        </div>
    
        <div id="lab-collapse" class="collapse" aria-labelledby="lab-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/laboratorio">Listar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/laboratorio/cadastrar">Novo laboratório</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      

      <div class="card">
        <div class="card-header" id="localizacao-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#localizacao-collapse" aria-expanded="false" aria-controls="localizacao-menu">
              Localizações
            </button>
          </h5>
        </div>
    
        <div id="localizacao-collapse" class="collapse" aria-labelledby="localizacao-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/localizacao">Listar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/localizacao/cadastrar">Nova localização</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="card">
        <div class="card-header" id="software-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#software-collapse" aria-expanded="false" aria-controls="software-menu">
              Software
            </button>
          </h5>
        </div>
    
        <div id="software-collapse" class="collapse" aria-labelledby="software-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/software">Listar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/software/cadastrar">Novo Software</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="usuarios-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#usuarios-collapse" aria-expanded="false" aria-controls="usuarios-menu">
              Usuários
            </button>
          </h5>
        </div>
    
        <div id="usuarios-collapse" class="collapse" aria-labelledby="usuarios-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/usuarios">Listar</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endif
    <div class="card">
        <div class="card-header" id="usuario-menu">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#usuario-collapse" aria-expanded="false" aria-controls="usuario-menu">
                <i class="fas fa-user-circle mr-3 user"></i>{{ Auth::user()->name }}
            </button>
          </h5>
        </div>
    
        <div id="usuario-collapse" class="collapse" aria-labelledby="usuario-menu" data-parent="#sidemenu">
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link">
                      Sair
                  </a>
  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  
</div>