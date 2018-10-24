@if(Session::has('success'))
    <input type="hidden" id="successMessage" value="{{ Session::get('success') }}">
    {{--<div class="callout callout-success" style="border-radius: 0px;padding-top: 20px;padding-bottom: 20px;">--}}
        {{--<h4>Excellent !!</h4>--}}
    {{--</div>--}}
@endif

@if(Session::has('error'))
    <div class="callout callout-danger" style="border-radius: 0px;padding-top: 20px;padding-bottom: 20px;">
        <h4><i class="fa fa-warning"></i>Erreurs !!</h4>
        <p>{{ Session::get('error') }}</p>
    </div>
@endif

@if(Session::has('info'))
    <div class="callout callout-info" style="border-radius: 0px;padding-top: 20px;padding-bottom: 20px;">
        <h4><i class="fa fa-info"></i>Excellent !!</h4>
        <p>{{ Session::get('info') }}</p>
    </div>
@endif






{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>--}}

{{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">--}}
{{--<div class='notifications top-right'></div>--}}
{{--<script>--}}
{{--@if(Session::has('info'))--}}
{{--$('.top-right').notify({--}}
{{--message: { text: "{{ Session::get('info') }}" },--}}
{{--type:'info'--}}
{{--}).show();--}}
{{--@endif--}}

{{--@if(Session::has('warning'))--}}
{{--$('.top-right').notify({--}}
{{--message: { text: "{{ Session::get('warning') }}" },--}}
{{--type:'warning'--}}
{{--}).show();--}}
{{--@endif--}}

{{--@if(Session::has('error'))--}}
{{--$('.top-right').notify({--}}
{{--message: { text: "{{ Session::get('error') }}" },--}}
{{--type:'danger'--}}
{{--}).show();--}}
{{--@endif--}}

{{--</script>--}}
