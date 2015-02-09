<html>

<body>
	{{ Form::model($package, array('method' => 'PATCH', 
		'route' => array('package.update', $package->id))) }}
		{{Form::label('id', 'Id: ')}}
	    {{Form::text('id')}}

	    {{Form::label('city_id', 'City Id: ')}}
	    {{Form::text('city_id')}}
	    <br/>
	    {{Form::label('days', 'Days: ')}}
	    {{Form::text('days')}}
	    <br/>
	    {{Form::label('code', 'Code: ')}}
	    {{Form::text('code')}}
	    <br/>
	    {{Form::label('status', 'Status: ')}}
	    {{Form::text('status')}}
	    <br/>
	    {{Form::submit('Salvar')}}
	{{ Form::close() }}
</body>
</html>