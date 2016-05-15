<?php
namespace Bitwappy;

class Routes
{
	public static function setup($app)
	{
		// Home
		$app->get('/', 'Bitwappy\Controllers\PageController:index')->name('home');
		$app->get('/about', 'Bitwappy\Controllers\PageController:about');
		$app->get('/upload', 'Bitwappy\Controllers\PageController:upload');
		$app->get('/support', 'Bitwappy\Controllers\PageController:support');
		$app->get('/contact', 'Bitwappy\Controllers\PageController:contact');

		// Upload
		$app->post('/upload', 'Bitwappy\Controllers\UploadController:process')->name('upload');

		// Files
		$app->get('/i/:hash', 'Bitwappy\Controllers\FileController:image')->name('image');
		$app->get('/v/:hash', 'Bitwappy\Controllers\FileController:video')->name('video');
		$app->get('/f/:hash', 'Bitwappy\Controllers\FileController:file')->name('file');
		$app->get('/d/:hash', 'Bitwappy\Controllers\FileController:destroy')->name('destroy');
	}
}
