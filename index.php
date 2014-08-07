<?php

/**
 *	This index.php at the root of your project will act as a router.
 *	@classes directory contains all classes.
 *	@controllers directory contains all controllers.
 */
foreach (glob("classes/*.php") as $filename)
	include $filename;
foreach (glob("controllers/*Controller.php") as $filename)
	include $filename;

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
$route->add('/register', 'RegisterController');
$route->add('/login', 'LoginController');

/**
 *	Adding Modules to the router.
 *	A module should possess the following directories.
 *	@classes
 *	@controllers
 *	@views
 */

/*********TODO MISSING CODE*********/

/**
 *	Finaly ready to go!
 */
$route->submit();