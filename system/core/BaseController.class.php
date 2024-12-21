<?php

abstract class BaseController
{
	protected $registry;

	function __construct($registry)
	{
		$this->registry = $registry;
		if($this->registry->session->get('user')){
			$user = $this->registry->session->get('user');
			$this->registry->template->user = $user;

			$this->registry->template->subscriptions_data = $this->registry->subscriptions_model->get_subscriptions($user['users_id']);
			
		}

		$this->registry->template->categories_data = $this->registry->categories_model->get_all();
       
	}

	abstract function index();
        
        public function loadModel($name)
	{
		require(__APP_PATH .'/models/'. $name .'.model.php');
		$model = new $name;
		return $model;
	}
        
        public function loadLibrary($name)
	{
		require(__APP_PATH .'/libraries/'. $name .'.php');
		$library = new $name;
		return $library;
	}
        
        public function loadHelper($name)
	{
		require(__APP_PATH .'/libraries/'. $name .'.php');
		$helper = new $name;
		return $helpery;
	}
}
