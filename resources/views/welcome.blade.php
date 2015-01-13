<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        {!! Html::style('css/app.css') !!} 

		<style>


		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Who is on data?</div>
				<div class="subTitle">
					<i>{{ $user->name }}</i>
				</div>
			</div>
		</div>
		<div class="content fixed">
			<a href="{{ url('users') }}">Manage</a>
		</div>
	</body>
</html>
