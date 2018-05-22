<?php

	/**
	 * 	session start
	 */
	session_start();

	/**
	 * 	define
	 */
	define('BASE_DIR', __DIR__);

	define('APP', BASE_DIR . '/app');

	define('CORE', APP . '/Core');

	define('SOURCE', BASE_DIR . '/public/resources');

	date_default_timezone_set("Asia/Seoul");

	/**
	 * 	error reporting
	 */
	// error_reporting( E_ALL );

	// ini_set( 'display_errors', 1 );

	/**
	 * 	ClassLoader
	 */
	require_once CORE . '/ClassLoader.php';

	set_exception_handler('App\\Core\\Handler::exception');
	set_error_handler('App\\Core\\Handler::error');

	/**
	 * 	Route
	 */
	$Route = new App\Core\Route();

	/**
	 * 	require routes/web.php
	 */
	require_once BASE_DIR . '/routes/web.php';

	/**
	 * 	Route dispatch
	 */ 
	$Route->dispatch();