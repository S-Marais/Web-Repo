<?php

class FilesLoader
{
	static public function loadGlobals()
	{
		require_once 'config/globals.php';
	}

	static public function loadSmarty()
	{
		require_once 'Smarty-3.1.21/libs/Smarty.class.php';
		require_once 'tpl.class.php';
	}

	/**
	 *	@classes directory contains all classes.
	 */
	static public function loadClasses()
	{
		foreach (glob("classes/*.php") as $filename)
			include_once $filename;
		foreach (glob("classes/db_objects/*.php") as $filename)
			include_once $filename;
		// @TODO : load module classes from loaded modules
	}

	/**
	 *	@controllers directory contains all controllers.
	 */
	static public function loadControllers()
	{
		foreach (glob("controllers/*Controller.php") as $filename)
			include_once $filename;
		// @TODO : load module controllers from loaded modules
	}

	static public function loadActiveModules()
	{
		// @TODO each modules will have to be activated/installed
	}

	static public function init() {
		self::loadGlobals();
		self::loadSmarty();
		self::loadClasses();
		self::loadControllers();
	}
}
