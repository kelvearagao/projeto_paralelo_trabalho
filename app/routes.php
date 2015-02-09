<?php

Route::resource('package', 'PackageController');



Route::get('attendance', 'AttendanceController@index');
Route::post('attendance/apply_room_standard', 'AttendanceController@applyRoomStandard');
Route::get('attendance/lista_registros', 'AttendanceController@listaRegistros');
Route::get('attendance/selecionar_padrao/order_id/{id}', 'AttendanceController@selecionarPadrao');
Route::get('attendance/editar_acomodacao/hotel_id/{hotel_id}/order_id/{order_id}', 'AttendanceController@editarAcomodacao');
Route::post('attendance/aplicarPadrao', 'AttendanceController@aplicarPadrao');
Route::post('attendance/salvarAcomodacao', 'AttendanceController@salvarAcomodacao');
	
