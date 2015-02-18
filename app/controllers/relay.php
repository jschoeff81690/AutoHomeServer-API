<?php

class relay extends controller {

	function index() {
		$routes = $this->app->_get ( 'route' );
		// var_dump ( $routes );
		$route = $routes ['controller'] . '/' . $routes ['function'] . '/' . implode ( "/", $routes ['params'] );
		
		if (isset ( $_SESSION ['count'] ))
			$_SESSION ['count'] += 1;
		else
			$_SESSION ['count'] = 0;
		;
		echo '<pre>';
		var_dump ( $_POST );
		echo '</pre>';
		echo '<pre>';
		var_dump ( $_SESSION );
		echo '</pre>';
		$this->app->load_model ( 'relay_model' );
		
		$relay_model = &$this->app->relay_model;
		$relay_model->create ( array (
				'data' => $route 
		) );
	}

}


