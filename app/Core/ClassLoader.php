<?php

function ClassLoader( $class )
{
	$namespace = 'App\\';

	if ( strpos( $class, $namespace ) == 0 ) {
		$relative_class = substr( $class, strlen( $namespace ) );

		$file = APP . '/' . str_replace( '\\', '/', $relative_class ) . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}

spl_autoload_register( 'ClassLoader' );