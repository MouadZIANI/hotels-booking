@extends('backend.layouts.master')

@section('title') Clients @stop

@section('content')

    <section class="content-header">
        <h1>Clients</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('clients.create') }}" class="btn bg-orange-active"> <i class="ion ion-person-add"></i> new client</a>
            </li>
        </ol>
    </section>

    <section class="content" id="app">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="ion ion-person-stalker"></i>&nbsp;Clients</h3>
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
                                <th>Name</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr style="min-width: 100px !important;">
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->tel }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->password_client }}</td>
                                    <td>
                                        <a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-info btn-xs btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form style="display: inline-block;" action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection




