<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/app.css') !!}
    <title>Who is on {{ Config::get('app.name') }}</title>
	</head>
	<body>
		<div class="container">
			<div class="content">
        <div class="row">
            <div class="title text-center">Who is on <span class="dropdown">{{ $topic ? $topic->name : Config::get('app.name') }}</span>?</div>
            @if($user)
                <div class="subTitle text-center">
                    <i>{{ $user->name }}</i>
                </div>
            @endif
        </div>
		<div class="content fixed">
            <a href="{{ route('periods.index') }}" class="button large">Time Periods</a>
			<a href="{{ route('users.index') }}" class="button large">Users</a>
		</div>
	</body>
</html>
