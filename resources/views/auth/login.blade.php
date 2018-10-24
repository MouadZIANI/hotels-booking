@extends('shared.app')

@section('title') Login @endsection

@section('content')

<div class="container">
    <div id="login-form">
        <h2 class="text-center text-nowrap">Accédez à votre compte</h2>
        <br>     
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}        
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email</label>
                <input id="e" mailtype="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail ..." required >
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Mot de passe </label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe..." required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Garder ma session active
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-link pull-right" href="{{ route('password.request') }}"> Mot de passe Oublié ? </a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-flat btn-primary btn-block"> Connexion </button>
        </form>
    </div>
</div>
@endsection
