
<?php

class usersController extends BaseController
{      
    
    public function index()
    {
        
       redirect('/profile');
    }


    public function add_favorite($type, $id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $data = array(
            'favorites_users_id' => $user['users_id'],
            'favorites_media_id' => "$id",
            'favorites_type' => $type
            );

            $this->registry->favorites_model->create($data);
        } else {

            login();
        }
        
    }

    public function un_favorite($type, $id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $favorite = $this->registry->favorites_model->get_by_type_and_id($type, $id);

            $this->registry->favorites_model->delete($favorite['favorites_id']);
        } else {

            login();
        }
        
    }


    public function add_history($id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $data = array(
                'users_id' => $user['users_id'],
                'videoId' => "$id",
                'progress' => '0',
                'finished' => '0'
            );

            $this->registry->videoProgress_model->create($data);

            $video = $this->registry->videos_model->get_by_id($id);
            $views = $video['views'] + 1;
            $data = array(
                'views' => "$views"
            );

            $this->registry->videos_model->update($id, $data);


            echo json_encode("success");

        } else {

            login();
        }
        
    }


    public function update_history($id, $progress, $finished){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $progress = $this->registry->videoProgress_model->get_by_user_and_video($id, $user['users_id']);

            $data = array(
                'progress' => "$progress",
                'finished' => "$finished"
            );

            $this->registry->videoProgress_model->update($progress->id, $data);

            echo json_encode("success");

        } else {

            login();
        }
        
    }

    public function remove_history($id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $progress = $this->registry->videoProgress_model->get_by_user_and_video($id, $user['users_id']);

            $this->registry->videoProgress_model->delete("$progress->id");

            echo json_encode("success");
            
        } else {

            login();
        }
        
    }
    
    public function favorites(){
        if($this->registry->session->get('user')){
                
            $user = $this->registry->session->get('user');
            
            $this->registry->template->favorites = $this->registry->favorites_model->get_favorites($user['users_id']);
           
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('users/favorites.view.php');
            $this->registry->template->show('footer.view.php'); 

        } else {
            login();
        }
    }


    public function add_subscription($id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $data = array(
            'subscriptions_users_id' => $user['users_id'],
            'subscriptions_channels_id' => "$id"
            );

            $this->registry->subscriptions_model->create($data);
        } else {

            login();
        }
        
    }

    public function un_subscription($id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $subscribe = $this->registry->subscriptions_model->get_by_user_and_id($id, $user['users_id']);

            $this->registry->subscriptions_model->delete($subscribe['subscriptions_id']);
        } else {

            login();
        }
        
    }


    public function subscriptions(){
        if($this->registry->session->get('user')){
                
            $user = $this->registry->session->get('user');
            
            $this->registry->template->favorites = $this->registry->favorites_model->get_favorites($user['users_id']);
           
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('users/subscriptions.view.php');
            $this->registry->template->show('footer.view.php'); 

        } else {
            login();
        }
    }


    public function content(){
        if($this->registry->session->get('user')){
                
            $user = $this->registry->session->get('user');
            
            $this->registry->template->videos_data = $this->registry->videos_model->get_limit_data_my($user['users_id']);
            $this->registry->template->new_videos_data = $this->registry->videos_model->get_limit_data_my_new($user['users_id']);
            $this->registry->template->channels_data = $this->registry->channels_model->get_limit_data_my($user['users_id']);
        
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('users/content.view.php');
            $this->registry->template->show('footer.view.php'); 

        } else {
            login();
        }
    }


    public function get_playlists($id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $this->registry->template->videos_id = $id;

            $this->registry->template->playlists = $this->registry->channels_model->get_by_users_id($user['users_id']);

            $this->registry->template->show('users/playlists_form.view.php');

        } else {

            login();
        }
        
    }

    public function add_playlist(){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $users_id = $user['users_id'];

            $videos_id = $_POST['videos_id'];

            $channels_id = $_POST['channels_id'];

            $data = array(
                'playlists_channels_id' => filter_xss($channels_id),
                'playlists_users_id' => filter_xss($users_id),
                'playlists_videos_id' =>  filter_xss($videos_id)
                );

            $favorite = $this->registry->playlists_model->create($data);

            return true;

        } else {

            login();
        }
        
    }

    public function remove_playlist($videos_id, $channels_id){
        
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');

            $users_id = $user['users_id'];

            $row = $this->registry->playlists_model->get_by_ids($videos_id, $channels_id, $users_id);

            if(is_array($row)){
                //var_dump($row);

                $this->registry->playlists_model->delete($row[0]->playlists_id);
            }
            return true;

        } else {

            login();
        }
        
    }
    
    public function update() {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->usersmodel->get_user($user['users_id']);
            if ($row) {
                $this->registry->template->data =  $row;
                $this->registry->template->show('header.view.php');
                $this->registry->template->show('users/users_update_form.view.php');
                $this->registry->template->show('footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/users');
            }

        } else {

            login();
        }
    }
    
    public function update_action(){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');
            
            $images_id = $user['images_id'];

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/users"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){
                    if($images_id > 0){
                        $this->registry->images_model->delete($images_id);
                    }
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/users"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/users"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }

                   
                    
                } else {                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            
            }

            if(!empty($_REQUEST['users_password']) || !empty($_REQUEST['users_password_confirm'])){
                if($_REQUEST['users_password'] == $_REQUEST['users_password_confirm']){
                    $password = md5($_REQUEST['users_password']);
                    $data = array('users_password' => $password);
                    $this->registry->usersmodel->update($user['users_id'], $data);
                } else {
                    $password = $user['users_password'];
                }
                
            } else {
                $password = $user['users_password'];
            }

            $data = array(
            'users_images_id' => $images_id,
            'users_first_name' => $_REQUEST['users_first_name'],
            'users_last_name' => $_REQUEST['users_last_name'],
            'users_email' => $_REQUEST['users_email'],
            'users_phone' => $_REQUEST['users_phone'],
            'users_address' => $_REQUEST['users_address'],
            'users_city' => $_REQUEST['users_city'],
            'users_state' => $_REQUEST['users_state'],
            'users_zip' => $_REQUEST['users_zip']
            );

            $this->registry->usersmodel->update($user['users_id'], $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/profile');
        } else {

            login();
        }
        
    }


}