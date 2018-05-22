<?php

namespace App\Core;

class Handler
{

	public static function error($error_level, $error_message, $error_file, $error_line, $error_context) {
		echo $error_message . '<br>';
		// echo 'error';
	}

	public static function exception( $error ) {
		// echo $error->getMessage();
		echo 'exception';
	}

}