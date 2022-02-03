<?php
	Route::namespace('Mtms\Service\Controllers')->prefix('api')->group(function () {
		Route::get('/migrate', 'InstallController@forceMigrate');
	});
?>
