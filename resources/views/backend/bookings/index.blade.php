@extends('backend.layouts.master')

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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection




