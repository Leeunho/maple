<?php
	
	/**
	 *	메인페이지
	 */
	$Route->get( '/', 'WebController@index' );

	/**
	 * 	무릉도장 검색 페이지
	 */
	$Route->get( '/search', 'WebController@search' );

	/**
	 * 	무릉도장 보스 정보 페이지
	 */
	$Route->get( '/dojang', 'WebController@dojang');
	$Route->get( '/dojang/{idx}', 'WebController@dojang');

	/**
	 * 	무릉도장 로그 페이지
	 */
	$Route->get( '/log', 'WebController@log' );

	/**
	 * 	마스터라벨 정보 페이지
	 */
	$Route->get( '/label/master', 'LabelController@master' );
	$Route->get( '/label/master/{idx}', 'LabelController@master_detail' );

	$Route->get( '/test', 'WebController@test');

	/**
	 * 	ajax 요청시
	 *	무릉도장 랭킹 json으로 전달
	 */
	$Route->get( '/data/ranking', 'DataController@ranking');