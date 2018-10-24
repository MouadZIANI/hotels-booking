@extends('shared.app')

@section('content')
<div class="container">
        <div id="login-form">
            <h2 class="text-center">Mot de passe oublié ? </h2>
            
            <p>Veuillez saisir votre email. Un nouveau mot de passe vous sera envoyé.</p>   
            <br>   
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-flat btn-block"> Send Password Reset Link </button>
            </form>
        </div>
</div>
@endsection
<!-- Flightplan -->
