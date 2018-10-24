<!DOCTYPE html>


<!--/
                        _   _       _a_a
            _   _     _{.`=`.}_    {/ ''\_
      _    {.`'`.}   {.'  _  '.}  {|  ._oo)
     { \  {/ .-. \} {/  .' '.  \} {/  |
~^~^~`~^~`~^~`~^~`~^~^~`^~^~`^~^~^~^~^~^~`^~~` Mouad ZIANI ( ROMAC ).
/-->


<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/Lobibox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

    <style type="text/css">
        
        .ui-widget.ui-widget-content {
            border: 1px solid #c5c5c5;
            top: 184px;
            left: 256px;
            overflow-y: scroll;
            overflow-x: hidden;
            max-height: 200px;
        }
    
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>



@include('_partiales._header')



<div class="content-wrapper" style="min-height: 800px !important;">

    @yield('content')

</div>



@include('_partiales._aside')



<footer class="main-footer">

    <div class="pull-right hidden-xs">

        <b>Version</b> 1.0.0

    </div> 

    All rights reserved.

</footer>



<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed

     immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/lobibox.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

@yield('javascript')

<script>

    $(document).ready(function () {

        $('.select2').select2({ width:'100%' });
        
        $('.sidebar-menu').tree();

        $('.dataTable').DataTable({

            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "bAutoWidth"  : false,
            'bRetrieve'   : true,
            dom: 'Bfrtip',
            buttons: [

                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            "language":
            {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "sZeroRecords": "Aucun résultat trouvé",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Aucune ligne affichée",
                "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
                "sInfoPostFix": "",
                "sSearch": "Chercher:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Chargement...",
                "oPaginate": {
                    "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
                },

                "oAria": {
                    "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
                }
            }
        });
    })

</script>
</body>
</html>

