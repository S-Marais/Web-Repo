<?php

/*
 * Error reporting for developpement mode :
 */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/*
 * Session start may be moved later in a session class
 */
session_start();

/*
 * Setting globals
 */
require_once 'config/globals.php';

/*
 * Require smarty template engine.
 */
require_once 'Smarty-3.1.21/libs/Smarty.class.php';
require_once 'tpl.class.php';

/*
 * Require AutoLoader function.
 */
require_once _ROOT_DIR_.'config/autoloader.php';

/**
 * Revision of data base :
 */
DbRevision::processRevision();

/*
 * Initialise Context.
 */
Context::getContext()->initContext();
