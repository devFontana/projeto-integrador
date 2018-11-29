@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row vertical-center">
        <div class="col-md-6 offset-3">
            <div class="card shadow-lg rounded">
                <div class="text-center">
                    <h1 class="card-title display-4 mb-4 mt-3">Locação de Salas</h1>
                    <h2 class="card-subtitle">Entrar</h2>
                </div>
                <div class="card-body ">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail</label>

                            
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="text-danger help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div> 

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Senha</label>

                            
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="text-danger help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group">
                            
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Manter-me conectado
                                    </label>
                                </div>
                            
                        </div>

                        <div class="form-group text-center">
                            
                                <button type="submit" class="btn btn-primary btn-block">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Não possui conta? <strong>Cadastre-se aqui</strong>
                                </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
