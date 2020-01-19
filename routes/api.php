<?php

use Illuminate\Http\Request;


Route::group( array( 'prefix' => '/v11'), function()
{
	Route::resource('books', 'BookController');	
});



