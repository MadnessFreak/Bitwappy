<?php
namespace Bitwappy\Controllers;
use Bitwappy\Controllers;

class PageController extends BaseController
{
	public function index()
	{
		//$this->title = 'Bitwappy';
		$this->display('pages/upload.twig');
	}

	public function about()
	{
		$this->title = 'About';
		$this->display('pages/about.twig');
	}

	public function upload()
	{
		$this->title = 'Upload';
		$this->display('pages/upload.twig');
	}

	public function support()
	{
		$this->title = 'Support';
		$this->display('pages/support.twig');
	}

	public function contact()
	{
		$this->title = 'Contact';
		$this->display('pages/contact.twig');
	}

	public function test()
	{
		echo "Hello world!";
	}
}
