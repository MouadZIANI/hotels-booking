@extends('layouts.master')

@section('title') Devoires @stop

@section('css')
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">

@endsection

@section('content')

    <section class="content-header">
        <h1>Liste des devoires</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#" class="btn bg-orange-active" data-toggle="modal" data-target="#modalAddDevoire"> <i class="ion ion-person-add"></i> Nouvelle devoire</a>
            </li>
        </ol>
    </section>

    <section class="content" id="app">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="ion ion-person-stalker"></i>&nbsp;Devoires</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body table-responcive">
                <div class="">
                    <table class="table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr style="min-width: 100px !important;">
                                <th>#</th>
                                <th>Date publication</th>
                                <th>Date soumission</th>
                                <th>Matiere</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Remarque</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $devoires as $devoire )
                                <tr>
                                    <td>{{ $devoire->id }}</td>
                                    <td>{{ $devoire->date_publication }}</td>
                                    <td>{{ $devoire->date_sounission }}</td>
                                    <td>{{ $devoire->matiere->nom }}</td>
                                    <td>{{ $devoire->enseignant->prenom . ' ' . $devoire->enseignant->nom }}</td>
                                    <td>{{ $devoire->classe->nom }}</td>
                                    <td>{{ $devoire->remarque }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modalEditDevoire{{ $devoire->id }}" class="btn btn-success btn-sm btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form style="display: inline-block;" action="{{ route('devoires.destroy', $devoire->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Start modal edit devoire --}}
                                <div id="modalEditDevoire{{ $devoire->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <form action="{{ route('devoires.update', $devoire->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Editer le devoire</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Date plublication</label>
                                                                <input type="date" name="date_publication" class="form-control" value="{{ $devoire->date_publication }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Date soumission</label>
                                                                <input type="date" name="date_soumission" class="form-control" value="{{ $devoire->date_sounission }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="class_id" class="control-label">Classe <span class="required">*</span></label>
                                                                <select name="class_id" id="class_id" class="form-control select2">
                                                                    @foreach($classes as $class)
                                                                        <option  @if(  $devoire->class_id == $class->id ) selected @endif value="{{ $class->id }}" >{{ $class->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="matiere_id" class="control-label">Matiere <span class="required">*</span></label>
                                                                <select name="matiere_id" id="matiere_id" class="form-control select2">
                                                                    @foreach($matieres as $matiere)
                                                                        <option  @if(  $devoire->matiere_id == $matiere->id ) selected @endif value="{{ $matiere->id }}" >{{ $matiere->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="enseignant_id" class="control-label">Enseignant <span class="required">*</span></label>
                                                        <select name="enseignant_id" id="enseignant_id" class="form-control select2">
                                                            @foreach($enseignants as $enseignant)
                                                                <option  @if( $devoire->enseignant_id == $enseignant->id ) selected @endif value="{{ $enseignant->id }}" >{{ $enseignant->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Remarque</label>
                                                        <textarea name="remarque" class="form-control" placeholder="Remarque...">{{ $devoire->remarque }}</textarea>
                                                    </div>  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-flat btn-success">Modofier</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                {{-- End modal edit devoire --}}

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="modalAddDevoire" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ route('devoires.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nauveau devoire</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date plublication</label>
                                    <input type="date" name="date_publication" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date soumission</label>
                                    <input type="date" name="date_soumission" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class_id" class="control-label">Classe <span class="required">*</span></label>
                                    <select name="class_id" id="class_id" class="form-control select2">
                                        @foreach($classes as $class)
                                            <option  @if( old('class_id') == $class->id ) selected @endif value="{{ $class->id }}" >{{ $class->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="matiere_id" class="control-label">Matiere <span class="required">*</span></label>
                                    <select name="matiere_id" id="matiere_id" class="form-control select2">
                                        @foreach($matieres as $matiere)
                                            <option  @if( old('matiere_id') == $matiere->id ) selected @endif value="{{ $matiere->id }}" >{{ $matiere->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enseignant_id" class="control-label">Enseignant <span class="required">*</span></label>
                            <select name="enseignant_id" id="enseignant_id" class="form-control select2">
                                @foreach($enseignants as $enseignant)
                                    <option  @if( old('enseignant_id') == $enseignant->id ) selected @endif value="{{ $enseignant->id }}" >{{ $enseignant->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Remarque</label>
                            <textarea name="remarque" class="form-control" placeholder="Remarque..."></textarea>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-flat btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection




