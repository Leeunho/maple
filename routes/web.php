<?php

	$Route->get( '/', 'WebController@index' );
	$Route->get( '/search', 'WebController@search' );
	$Route->get( '/server', 'WebController@server' );
	$Route->get( '/history', 'WebController@history' );
	$Route->get( '/dojang', 'WebController@dojang');
	$Route->get( '/dojang/{idx}', 'WebController@dojang');
	$Route->get( '/log', 'WebController@log' );
	$Route->get( '/test', 'WebController@test');
	$Route->get( '/data/ranking', 'DataController@ranking');