<?php

/**
 * Loading required files and configuration
 */
require_once 'config/config.php';

/**
 *	Instanciate a route object.
 */
$route = new Route();

/**
 * @TODO LIST :
 * 
 *	Adding Session or Context class and Cookies
 *	Creating The profile object with an Admin and a Anonymous row
 *	Better catching the errors and displaying them
 * 	--------------------------------------------------------------------------
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
