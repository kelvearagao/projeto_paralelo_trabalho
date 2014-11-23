<?php

Route::resource('users', 'UserController');

Route::get('/', function()
{
	return View::make('teste/form');
});

Route::post('/registration', function()
{
	$data = Input::all();

	$rules = array(
		'username' => 'required|alpha_num|min:3|max:32',
		'email' => 'required|email',
		'password' => array('required', 'confirmed', 'min:3')
	);

	$validator = Validator::make($data, $rules);
	
	if ($validator->passes()) {
		return 'Data was saved.';
	}

	return Redirect::to('/')->withErrors($validator);
});

Route::get('/teste', function()
{
	
	$packages = Package::find(3);
	echo '--Pacote: '.$packages.'<br/>';
	
	$packageDays = $packages->packageDays;
	
	foreach($packageDays as $packageDay) {
		echo '----Pacote do dia: '.$packageDay.'<br/>';
		
		$mainServices = $packageDay->mainServices;
		foreach($mainServices as $mainService) {
			$texts = $mainService->serviceDay->texts;
			
			foreach($texts as $text) {
				echo '-------'.$text->service_day_id.' - '.$text->language.' - '.$text->title.'<br/>';
			}
		}
	}
	
});
