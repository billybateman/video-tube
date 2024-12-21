<?php

class IndexController extends BaseController
{
	
        public function index($invar = 'notset'){
	
            if($this->registry->session->get('user')){
                
                $user = $this->registry->session->get('user');
               
                $this->registry->template->user = $user;

                $this->registry->template->notifications = $this->registry->notifications_model->get_limit_data($user['users_id'], 10, 0, '');
			    $this->registry->template->new_notifications = $this->registry->notifications_model->get_new($user['users_id']);
			    $this->registry->template->users_online = $this->registry->users_online_model->get_all($user['users_id']);
                
                //$this->registry->template->locations = $this->registry->locations_model->get_all();

		        $this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('admin/index.view.php');
                $this->registry->template->show('admin/footer.view.php');


                //redirect('/admin/shows');


            } else {
                login();
            }
	    }
        
        public function register(){
            
            if(isset($_POST['email']) || isset($_POST['password']) || isset($_POST['name'])){
                $created = $this->registry->usersmodel->register_user($_POST['email'], $_POST['password'], $_POST['name'], $_POST['type']);
                if($created){
                    // set session
                    $this->registry->session->set('user', $created);
                    redirect('/admin');
                } else {
                    // not saved
                    $this->registry->template->error = true;
                }
            }

            if($this->registry->session->get('user')){
                redirect('/admin');
            } 

            $this->registry->template->show('authentication/register.view.php');
        }
        
        public function login(){
            if(isset($_POST['email']) || isset($_POST['password'])){
                $authenticated = $this->registry->usersmodel->authenticate_user($_POST['email'], $_POST['password']);
               
                if($authenticated){
                    // set session
                     $this->registry->session->set('user', $authenticated);
                    redirect('/admin');
                } else {
                    // not authenticated
                    $this->registry->template->error = true;
                    $this->registry->template->site = $this->getSiteModelData();
                    $this->registry->template->show('authentication/login.view.php');
                }
            } else {
                $this->registry->template->error = true;
                $this->registry->template->site = $this->getSiteModelData();
		        $this->registry->template->show('authentication/login.view.php');
            }
        }
        
        
        public function logout(){
            $this->registry->session->destroy();
            login();
        
        }
        
        public function forgot(){
            if(isset($_POST['email'])){
                $found = $this->registry->usersmodel->forgot_user($_POST['email'], $_POST['password']);
                if($found){
                    /* Send email */
                }
                $this->registry->template->forgot = true;
                $this->registry->template->error = true;
                $this->registry->template->site = $this->getSiteModelData();
		        $this->registry->template->show('authentication/login.view.php');
            } else {
                $this->registry->template->error = true;
                $this->registry->template->site = $this->getSiteModelData();
		        $this->registry->template->show('authentication/forgot.view.php');
            }
        }

}
