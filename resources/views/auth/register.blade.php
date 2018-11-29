@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row vertical-center">
        <div class="col-md-6 offset-3">
            <div class="card shadow-lg rounded mt">
                <div class="text-center">
                    <h1 class="card-title display-4 mb-4 mt-3">Locação de Salas</h1>
                    <h2 class="card-subtitle">Cadastrar</h2>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail</label>

                            
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Senha</label>

                            
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirmação da senha</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-primary btn-block">
                                Cadastrar
                            </button>

                            <a class="btn btn-link" href="{{ route('login') }}">
                                Já possui conta? <strong>Acesse aqui</strong>
                            </a>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
