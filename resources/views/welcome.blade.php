<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        {!! Html::style('css/bootstrap.css') !!} 
        {!! Html::style('css/app.css') !!} 

		<style>


		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
        <div class="row">
            <div class="title text-center">Who is on data?</div>
            @if($user)
                <div class="subTitle text-center">
                    <i>{{ $user->name }}</i>
                </div>
            @endif
        </div>
		<div class="content fixed">
			<a href="{{ route('users.index') }}" class="button large">Manage</a>
		</div>
	</body>
</html>
