<?php

class AuthenticationController extends BaseController
{
	
    public function index($invar = 'notset'){

        $this->login();
        
	}
        
    public function register(){
        
        if(isset($_REQUEST['email']) || isset($_REQUEST['password']) || isset($_REQUEST['name'])){

            $type = $this->registry->users_types_model->get_signup_type();
           
            $type = $type->users_types_id;

            $created = $this->registry->usersmodel->create_user($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['name'], $type);
            if($created){
                $authenticated = $this->registry->usersmodel->authenticate_user($_REQUEST['email'], $_REQUEST['password']);
                if($authenticated){
                        // set session
                        $this->registry->session->set('user', $authenticated);
                        redirect('/');
                } else {
                    redirect('/login');
                }
            } else {
                // not saved
                $this->registry->template->error = true;
                $this->registry->template->show('authentication/register.view.php');
            }
        }

        if($this->registry->session->get('user')){
            redirect('/');
        } else {
            $error = false;
            $this->registry->template->show('authentication/register.view.php');
        }
    }
    
    public function login(){
       
        if(isset($_REQUEST['email']) || isset($_REQUEST['password'])){
            $authenticated = $this->registry->usersmodel->authenticate_user($_REQUEST['email'], $_REQUEST['password']);
            if($authenticated){
                    // set session
                    $this->registry->session->set('user', $authenticated);
                    redirect('/');
            } else {
                // not authenticated
                $this->registry->template->error = true;
                $this->registry->template->show('authentication/login.view.php');
            }
        } else {
            $this->registry->template->error = false;
            $this->registry->template->show('authentication/login.view.php');
        }
    }
    
    
    public function logout(){
        $this->registry->session->destroy();
        redirect('login');
    }
    
    public function forgot(){
        if(isset($_REQUEST['email'])){
            $found = $this->registry->usersmodel->forgot_user($_REQUEST['email']);
            if($found){
                $error = false;
                $forgot = true;
                $this->registry->template->show('authentication/login.view.php');
            } else {
                $error = true;
                $this->registry->template->show('authentication/forgot.view.php');
            }
            
        } else {
            $error = false;
            $this->registry->template->show('authentication/forgot.view.php');
        }
    }

}