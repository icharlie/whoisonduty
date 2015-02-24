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
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#whoisduty-navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="whoisduty-navbar">
                        <ul class="nav navbar-nav">
                        	<li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        {!! Html::script('js/jquery.js') !!}
        {!! Html::script('js/bootstrap.js') !!}
        {!! Html::script('js/bootstrap-datepicker.js') !!}
        @yield('ext_js')
    </body>
</html>
