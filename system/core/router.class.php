<?php

class Router
{
	private $registry, $path, $ismodule, $isadmin, $controller, $route, $routes, $action, $arguments;
	static $instance;

	public function __construct($registry)
	{
			
		$this->registry = $registry;
                
                if (file_exists(__APP_PATH.'/config/routes.php')){
                    include(__APP_PATH.'/config/routes.php');
                    $this->routes = $routes;
                }
        
                
		$route = (empty($_GET['request'])) ? '' : $_GET['request'];
                $route = trim($route,'/');
                $route = str_replace('index.php-', '', $route);
                $route = str_replace('.html', '', $route);
                //var_dump($route);
                
                if (array_key_exists($route, $this->routes)) {
                         
                    $split = explode('/',trim($this->routes[$route],'/'));  
                    $this->route = explode('/', $this->routes[$route]);
                    
                } else {
                    
                    $split = explode('/',trim($route,'/'));
                    $this->route = explode('/', $route);
		}
		//var_dump($split);
                //exit;
                $this->process($split);
		
		
	}
        
        public function process($split){
            switch($split[0]){
			case 'modules':
				$this->ismodule = true;
                                $this->isadmin = false;
				/*** load arguments for action ***/
                                $arguments = array();
                                foreach ($this->route as $key => $val) 
                                {
                                        if ($key == 0 || $key == 1 || $key = 2)
                                        {
                                                switch($key){
                                                        case 0:
                                                        break;
                                                        case 1:
                                                                $this->controller = $val;
                                                        break;
                                                        case 2:
                                                                $this->action = $val;
                                                        break;
                                                }
                                        }
                                        else
                                        {
                                                $arguments[$key] = $val;
                                        }
                                }


                                $this->arguments = $arguments;
		
			
			break;
                        case 'admin':
				$this->ismodule = false;
                                $this->isadmin = true;    
				/*** load arguments for action ***/
                                $arguments = array();
                                foreach ($this->route as $key => $val) 
                                {
                                        
                                                
                                                if ($key == 0 || $key == 1 || $key == 2)
                                        {
                                                switch($key){
                                                        case 0:
                                                            $this->controller = "admin";
                                                                $this->action = "index";
                                                        break;
                                                        case 1:
                                                                $this->controller = $val;
                                                                $this->controller = !empty($split[1]) ? $split[1] : 'index';
                                                        break;
                                                        case 2:
                                                                $this->action = $val;
                                                                $this->action = !empty($split[2]) ? $split[2] : 'index';
                                                        break;
                                                }
                                        }
                                        else
                                        {
                                                //var_dump($key);
                                                //var_dump($val);
                                                $arguments[$key] = $val;
                                        }
                                }


                                $this->arguments = $arguments;
		
			
			break;
			default:
				
                                
                                $this->ismodule = false;
                                $this->isadmin = false;
				/*** load arguments for action ***/
                                $arguments = array();
                                foreach ($this->route as $key => $val) 
                                {
                                        if ($key == 0 || $key == 1)
                                        {

                                        } else {
                                         $arguments[$key] = $val;
                                        }
                                }

                                $this->controller = !empty($split[0]) ? $split[0] : 'index';
                                $this->action = !empty($split[1]) ? $split[1] : 'index';
                                $this->arguments = $arguments;
		
			break;
		}
        }

	public function route()
	{
		require_once('BaseController.class.php');
		if($this->ismodule){
			
			$file = __APP_PATH.'/modules/'.$this->controller.'/controllers/' . $this->controller . '.controller.php';
			
		} else {
		
			if($this->isadmin){
                            $file = __APP_PATH.'/controllers/admin/' . $this->controller . '.controller.php';
                        } else {
                            $file = __APP_PATH.'/controllers/' . $this->controller . '.controller.php';
                        }
		
		}
                
		if(is_readable($file))
		{
			include $file;
			$class = $this->controller . 'Controller';
		}
		else
		{
			include __APP_PATH.'/controllers/error.controller.php';
			$class = 'ErrorController';
		}
                
                
                
                
		$controller = new $class($this->registry);

		if (!empty($this->action))
		//call_user_func_array(array($controller, $this->action), $this->arguments);
			$action = $this->action;
		else
			$action = 'index';
		//var_dump($this);
		call_user_func_array(array($controller, $action), $this->arguments);
		//$controller->$action();
	}
}
