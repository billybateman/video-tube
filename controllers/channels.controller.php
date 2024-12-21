
<?php

class channelsController extends BaseController
{      
    
    public function index($var = '')
    {

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/channels/?q=". urlencode($q);
            $this->registry->template->first_url = "/channels/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/channels/";
            $this->registry->template->first_url = "/channels/";
        }
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->channels_model->total_rows();

        if($this->registry->session->get('user')){
            $user = $this->registry->session->get('user');
        } else {
            $user['users_id'] = 0;
        }
        $this->registry->template->channels_data = $this->registry->channels_model->get_limit_data(10, $start, $q, $user['users_id']);
        

        $this->registry->template->videos_featured_data = $this->registry->videos_model->get_featured();

        //$this->loadLibrary('pagination');
        //$pagination->initialize($this->registry->template);
        //$this->registry->template->pagination = $pagination->create_links();
        
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('channels/channels_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }

    public function my($var = '')
    {

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/channels/?q=". urlencode($q);
            $this->registry->template->first_url = "/channels/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/channels/";
            $this->registry->template->first_url = "/channels/";
        }
        
        
        $this->registry->template->channels_data = $this->registry->channels_model->get_my_data();

        $this->registry->template->videos_featured_data = $this->registry->videos_model->get_featured();


        $this->registry->template->show('header.view.php');
        $this->registry->template->show('channels/channel_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->channels_model->get_by_slug($id);
        //var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
            $channel_id = $row->channels_id;
            $channel_users_id = $row->channels_users_id;
            $this->registry->template->channels_user_data = $this->registry->usersmodel->get_user($channel_users_id);

            $users_id = 0;

            if($this->registry->session->get('user')){
                $user = $this->registry->session->get('user');
                $this->registry->template->user = $user;
                $users_id = $user['users_id'];
                $this->registry->template->subscription_data = $this->registry->subscriptions_model->get_subscription($user['users_id'], $channel_id);
            }

            if (isset($_REQUEST['q'])) {
                $q = urldecode($_REQUEST['q']);
                $start = intval($_REQUEST['start']);
                
                $this->registry->template->url = "/channels/?q=". urlencode($q);
                $this->registry->template->first_url = "/channels/?q=" . urlencode($q);
            } else {
                $q = '';
                $start = 0;
                $this->registry->template->url = "/channels/";
                $this->registry->template->first_url = "/channels/";
            }
            
            $this->registry->template->q = $q;
            $this->registry->template->start = $start;
            $this->registry->template->per_page = 10;
            $this->registry->template->page_query_string = TRUE;
            $this->registry->template->total_rows = $this->registry->videos_model->total_rows_channel($q, $channel_id);
            $this->registry->template->videos_data = $this->registry->videos_model->get_limit_data_channel(12, $start, $q, $users_id, $channel_id);
            

            //$this->registry->template->videos_featured_data = $this->registry->videos_model->get_featured();

	    
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('channels/channels_view.view.php');
            $this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/channels');
        }
    }

    public function create(){

        
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('channels/channels_form.view.php');
        $this->registry->template->show('footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $images_id = 0;

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/channels"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){
                   
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/channels"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/channels"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }
                    
                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $data = array(
            'channels_images_id' => $images_id,
            'channels_name' => $_REQUEST['channels_name'],
            'channels_description' => $_REQUEST['channels_description'],
            'channels_slug' => $_REQUEST['channels_slug'],
            'channels_categories_id' => $_REQUEST['channels_categories_id'],
            'channels_rating' => $_REQUEST['channels_rating'],
            'channels_users_id' => $user['users_id'],

            );

            $this->registry->channels_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/content');
        } else {

            login();
        }
        
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->channels_model->get_by_id($id);
            if ($row) {
                if($row->channels_users_id == $user['users_id']){
                    $this->registry->template->data =  $row;
                    $this->registry->template->show('header.view.php');
                    $this->registry->template->show('channels/channels_update_form.view.php');
                    $this->registry->template->show('footer.view.php'); 
                } else {
                    redirect('/content');
                }
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/content');
            }

        } else {

            login();
        }
    }
    
    public function update_action($id){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $channel = $this->registry->channels_model->get_by_id($id);

            if($channel->channels_users_id == $user['users_id']){
            
                $images_id = $channel->channels_images_id;

                if(isset($_FILES['fileToUpload'])){
                    
                    $dirpath = CDN_FOLDER . "/channels"."/";

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
                        'images_file' => CDN_URL ."/channels"."/" . $suc_file
                        );
                
                        if($this->registry->images_model->create($data)){
                            $image = $this->registry->images_model->get_by_file(CDN_URL ."/channels"."/" . $suc_file);
                            $images_id = $image->images_id;
                            //echo $images_id. " image saved";
                        }

                    } else {                    
                        //upload failed
                        //echo $uploader->getMessage(); //get upload error message
                    }

                }

                $data = array(
                    'channels_images_id' => $images_id,
                    'channels_name' => $_REQUEST['channels_name'],
                    'channels_description' => $_REQUEST['channels_description'],
                    'channels_slug' => $_REQUEST['channels_slug'],
                    'channels_categories_id' => $_REQUEST['channels_categories_id'],
                    'channels_rating' => $_REQUEST['channels_rating']
                );

                $this->registry->channels_model->update($id, $data);

                $this->view($_REQUEST['channels_slug']);

                
            } else {
                redirect('/content');
            }
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->channels_model->get_by_id($id);

        if ($row) {
            $this->registry->channels_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/channels/my');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/channels/my');
        }
    }


}