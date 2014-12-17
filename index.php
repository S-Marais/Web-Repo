<?php

/**
 * Loading required files
 */
require_once 'classes/filesloader.php';
FilesLoader::init();

/**
 * Revision of data base :
 */
DbRevision::processRevision();

/**
 * start session here (may be moved later into a Session class)
 */
session_start();

/**
 *	Instanciate a route object.
 */
$route = new Route();

/**
 *	Setting routes.
 *	All routes should be defined here as follow:
 *	@route->add($uri, $method = null);
 */
$route->add('/', 'HomeController');
$route->add('/home', 'HomeController');
$route->add('/register', 'RegisterController');
$route->add('/login', 'LoginController');

/**
 *	Adding Modules to the framework.
 * 	@Todo: Static method in file loader to seek all directories in "modules",
 * 	Route method to seek and register all controllers from modules
 *	A module should possess the following directories:
 * 	/moduleName/ <- its own directory
 *	/moduleName/classes
 *	/moduleName/controllers
 *	/moduleName/views
 * 	/moduleName/moduleName.php <- Controllers from modules are  defined here.
 */

/**
 *	Finaly ready to go!
 */
$route->submit();
