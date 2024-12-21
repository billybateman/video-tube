<?php

class IndexController extends BaseController
{
	public function index($invar = 'notset'){


        $this->registry->template->categories_data = $this->registry->categories_model->get_all();

        $user['users_id'] = 0;

        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');
            
            $this->registry->template->subscriptions_data = $this->registry->subscriptions_model->get_subscriptions($user['users_id']);
        
        }

        $this->registry->template->videos_featured_data = $this->registry->videos_model->get_featured($user['users_id']);

        $this->registry->template->channels_featured_data = $this->registry->channels_model->get_featured($user['users_id']);
	
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('index.view.php');
        $this->registry->template->show('footer.view.php');
        
	}
        
        
    public function page($slug = ''){
	
            if($slug != ''){
                $this->registry->template->site = $this->registry->site_content_model->get_by_slug($slug);
                //var_dump($this->registry->site_content_model->get_by_slug($slug));
                $this->registry->template->show('page.view.php');
            } else {
                $this->index();
            }
	}

}
