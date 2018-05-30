<?php

namespace App\Core;

class Route
{

	private $GET;

	private $POST;

	public function get( $uri, $action )
	{
		$this->addRoute( 'GET', $uri, $action );
	}

	public function post( $uri, $action )
	{
		$this->addRoute( 'POST', $uri, $action );
	}

	public function addRoute( $method, $uri, $action )
	{
		$this->{ $method }[] = $this->parseRoute( $uri, $action );
	}

	public function parseRoute( $uri, $action )
	{
		$params = explode( '@', $action );

		return [
			'uri' => $this->parseURI( $uri ),

			'controller' => 'App\\Controller\\' . $params[ 0 ],

			'action' => $params[ 1 ]
		];
	}

	public function parseURI( $uri )
	{
		$uri = preg_replace( '/\//', '\\/', $uri );

		$uri = preg_replace( '/{([^{}]+)}/', '(.+)', $uri );

		$uri = '/^' . $uri . '$/i';

		return $uri;
	}

	public function getURI()
	{
		$uri = '/';

		if ( isset( $_GET['uri'] ) ) {
			$uri = rtrim( '/' . $_GET['uri'], '/' );

			$uri = filter_var( $uri, FILTER_SANITIZE_URL );
		}

		return $uri;
	}

	public function getArgs( $o_uri )
	{
		$uri = trim( $this->getURI(), '/' );
		$cnt = count(explode('/', $o_uri)) - 2;

		return array_slice( explode( '/', $uri ), $cnt );
	}

	public function dispatch()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		$uri = $this->getURI();

		if ( !is_null( $this->{ $method } ) ) {
			foreach ( $this->{ $method } as $route ) {
				if ( preg_match( $route['uri'], $uri ) ) {
					$route['controller'] = new $route['controller']();
					return $route['controller']->{ $route['action'] }( ...$this->getArgs( $uri ) );
				}
			}
		}

		header('Location:/');
	}

}