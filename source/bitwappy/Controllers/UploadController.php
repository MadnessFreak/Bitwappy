<?php
namespace Bitwappy\Controllers;
use Bitwappy\Controllers;

class UploadController extends BaseController
{
	public function process()
	{
		/*Array
		(
		    [name] => jgvjgv.PNG
		    [type] => image/png
		    [tmp_name] => C:\XAMPP\tmp\php6E7D.tmp
		    [error] => 0
		    [size] => 112534
		)*/
		print_r($this->app->request->params());
		print_r($_FILES['file']);
	}
}