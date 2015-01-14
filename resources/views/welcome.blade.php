<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        {!! Html::style('css/app.css') !!} 

		<style>


		</style>
	</head>
	<body>
		<div class="table-container">
			<div class="content">
				<div class="title">Who is on data?</div>
                @if($user)
                    <div class="subTitle">
                        <i>{{ $user->name }}</i>
                    </div>
                @endif
			</div>
		</div>
		<div class="content fixed">
			<a href="{{ route('users.index') }}" class="button large">Manage</a>
		</div>
	</body>
</html>
