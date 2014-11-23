<h1>Registration form for Phill's Parks</h1>

{{ Form::open(array('url' => 'registration')) }}

	{{-- Username field. ------------------------}}
	<ul class="errors">
		@foreach($errors->get('username') as $message)
			<li>{{ $message }}</li>
		@endforeach
	</ul>
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username') }}
	
	<ul class="errors">
		@foreach($errors->get('email') as $message)
			<li>{{ $message }}</li>
		@endforeach
	</ul>
	{{-- Email address field. -------------------}}
	{{ Form::label('email', 'Email address') }}
	{{ Form::email('email') }}

	{{-- Password field. ------------------------}}
	<ul class="errors">
		@foreach($errors->get('password') as $message)
			<li>{{ $message }}</li>
		@endforeach
	</ul>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}

	{{-- Password confirmation field. -----------}}
	<ul class="errors">
		@foreach($errors->get('password_confirmation') as $message)
			<li>{{ $message }}</li>
		@endforeach
	</ul>
	{{ Form::label('password_confirmation', 'Password confirmation') }}
	{{ Form::password('password_confirmation') }}

	{{-- Form submit button. --------------------}}
	{{ Form::submit('Register') }}

{{ Form::close() }}
