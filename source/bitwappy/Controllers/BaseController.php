<?php
namespace Bitwappy\Controllers;
use Bitwappy\Bitwappy;

class BaseController
{
	protected $app;
	protected $config;
	protected $data;

	public function __construct()
	{
		$this->app = Bitwappy::getApp();
		$this->config = $this->app->config;
		$this->data = [];
		$this->data['meta_title'] = $this->config->get('bitwappy.title');
		$this->data['meta_description'] = $this->config->get('bitwappy.description');
		$this->data['meta_keywords'] = $this->config->get('bitwappy.keywords');
	}

	public function __get($name)
	{
		if (isset($this->data[$name]))
		{
			return $this->data[$name];
		}
		return null;
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}

	public function display($template)
	{
		$this->app->render($template, $this->data);
	}
}
