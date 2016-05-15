<?php
namespace Bitwappy;
use Bitwappy\Routes;
use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig_Extensions_Extension_Text;

/**
* Bitwappy
* 
* @author     MadnessFreak <hello@bitwappy.co>
* @copyright  2016 MadnessFreak
* @package    Bitwappy
*/
class Bitwappy
{
	/**
	 * slim object
	 * @var	\Slim\Slim
	 */
	protected static $app;

	public static function getApp() {
		return static::$app;
	}

	public static function preload()
	{
		require '../vendor/autoload.php';
	}

	public static function init()
	{
		// Prepare app
		Bitwappy::$app = $app = new Slim([
			'templates.path' => '../templates',
		]);

		// Prepare view
		$app->view(new Twig());
		$app->view->parserOptions = array(
			'charset' => 'utf-8',
			'cache' => realpath('../templates/cache'),
			'auto_reload' => true,
			'strict_variables' => false,
			'autoescape' => true
		);
		$app->view->parserExtensions = [
			new TwigExtension(),
			new Twig_Extensions_Extension_Text()
		];

		// Prepare config
		$config = new Config;
		$config->load('../config.inc.php');

		// Install config container
		$app->container->set('config', function() use($config)
		{
			return $config;
		});

		// Setup routes
		Routes::setup($app);
	}

	public static function run()
	{
		// preload and init
		Bitwappy::preload();
		Bitwappy::init();

		// run app
		Bitwappy::$app->run();
	}
}
