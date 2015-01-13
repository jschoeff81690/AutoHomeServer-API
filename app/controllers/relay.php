<?php
class relay extends controller {
	function index() {
		$routes = $this->app->_get('route');
		var_dump($routes);
		$route = $routes['controller'].'/'.$routes['function'].'/'.implode("/",$routes['params']);
		echo '<pre>';
		var_dump($route);
		echo '</pre>';
		$this->app->load_model('relay_model');
		
		$relay_model = &$this->app->relay_model;
		$relay_model->create(array('data'=>$route));
			
				

	}

}


