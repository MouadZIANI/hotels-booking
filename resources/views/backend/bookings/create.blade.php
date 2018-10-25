@extends('layouts.master')

@section('title') Nouvel enseignant @endsection



@section('content')
    <section class="content-header">
        <h1>Nouvelle enseignant</h1>
        <ol class="breadcrumb">
            <li><a class="btn bg-orange-active" href="{{ route('enseignants.index') }}"><i class="fa fa-users"></i>Liste des enseignant</a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        @include('_partiales.flush')
        <form method="POST" action="{{ route('enseignants.store') }}">
            {{ csrf_field() }}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="ion ion-person-add"></i>&nbsp; Ajouter nouvel enseignant</h3>
                    <div class="box-tools pull-right">
                        <span class="text-red box-text-helper">( * ) Champs obligatoires</span>
                    </div>
                </div>
                <div class="box-body">
                    <h3>Informations personnel</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <label for="nom" class="control-label">Nom <span class="required">*</span></label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" placeholder="Nom...">
                                @if ($errors->has('nom'))
                                    <span class="help-block"> {{ $errors->first('nom') }} </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                <label for="prenom" class="control-label">Prénom <span class="required">*</span></label>
                                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" placeholder="Prénom...">
                                @if ($errors->has('prenom'))
                                    <span class="help-block"> {{ $errors->first('prenom') }} </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="control-label">Telephone <span class="required">*</span></label>
                                <input type="text" name="tel" id="tel" class="form-control" value="{{ old('tel') }}" placeholder="Telephone...">
                                @if ($errors->has('tel'))
                                    <span class="help-block"> {{ $errors->first('tel') }} </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                        <label for="adresse" class="control-label">Adresse <span class="required">*</span></label>
                        <textarea name="adresse" id="adresse" class="form-control" placeholder="Adresseephone...">{{ old('adresse') }}</textarea>
                        @if ($errors->has('adresse'))
                            <span class="help-block"> {{ $errors->first('adresse') }} </span>
                        @endif
                    </div>

                    <br>

                    <h3>Informations d'authentification</h3>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-mail <span class="required">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail...">
                                @if ($errors->has('email'))
                                    <span class="help-block"> {{ $errors->first('email') }} </span>
                                @endif
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Mot de passe <span class="required">*</span></label>
                                <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Mot de passe...">
                                @if ($errors->has('password'))
                                    <span class="help-block"> {{ $errors->first('password') }} </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                <label for="tel" class="control-label">Confirmation de mot de passe <span class="required">*</span></label>
                                <input type="text" name="password-confirm" id="password-confirm" class="form-control" value="{{ old('password-confirm') }}" placeholder="Confirmation de mot de passe...">
                                @if ($errors->has('password-confirm'))
                                    <span class="help-block"> {{ $errors->first('password-confirm') }} </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <button class="btn btn-primary btn-flat"><i class="fa fa-save"></i>&nbsp; Enregestrer</button>
                    <a href="{{ url('enseignants') }}" class="btn btn-warning btn-flat"><i class="fa fa-remove"></i>&nbsp; Annuler</a>
                </div>
            </div>
        </form>
    </section>
@endsection