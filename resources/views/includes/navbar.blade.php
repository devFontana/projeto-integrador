<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">
    @if(Auth::user()->type == 'a')
      <a class="navbar-brand" href="{{ url('/solicitacao-software') }}">Locação de Salas</a>   
    @else
      <a class="navbar-brand" href="{{ url('/home') }}">Locação de Salas</a> 
    @endif
  </div>
</nav>