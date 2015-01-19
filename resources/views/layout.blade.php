<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Who is on data?</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        {!! Html::style('css/normalize.css') !!} 
        {!! Html::style('css/bootstrap.css') !!} 
        {!! Html::style('css/datepicker.css') !!} 
        {!! Html::style('css/app.css') !!} 
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        {!! Html::script('js/jquery.js') !!}
        {!! Html::script('js/bootstrap.js') !!}
        {!! Html::script('js/bootstrap-datepicker.js') !!}
        @yield('ext_js')
    </body>
</html>
