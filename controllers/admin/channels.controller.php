
<?php

class channelsController extends BaseController
{      
    
    public function index($var = '')
    {

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/admin/channels/?q=". urlencode($q);
            $this->registry->template->first_url = "/admin/channels/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/admin/channels/";
            $this->registry->template->first_url = "/admin/channels/";
        }
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->channels_model->total_rows();
        $this->registry->template->channels_data = $this->registry->channels_model->get_limit_data(10, $start, $q);
        
        /* $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);
        $this->registry->template->pagination = $this->pagination->create_links(); */
        
        $this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/channels/channel_browse.view.php');
        $this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->channels_model->get_by_id($id);
        var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            $this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/channels/channel_view.view.php');
            $this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/channels');
        }
    }

    public function create(){
       
        $this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/channels/channel_form.view.php');
        $this->registry->template->show('admin/footer.view.php'); 

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
            'channels_users_id' => $user['users_id']
            );

            $this->registry->channels_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/channels');
        } else {

            login();
        }
        
    }
    
    public function update() {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->channels_model->get_by_users_id($user['users_id']);
            if ($row) {
                $this->registry->template->data =  $row;
                $this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('admin/channels/channels_update_form.view.php');
                $this->registry->template->show('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/channels');
            }

        } else {

            login();
        }
    }
    
    public function update_action(){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $channel = $this->registry->channels_model->get_by_users_id($user['users_id']);
            
            $images_id = $channel['channels_images_id'];

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
            'channels_users_id' => $user['users_id']
            );

            $this->registry->channels_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/channels');
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->channels_model->get_by_id($id);

        if ($row) {
            $this->registry->channels_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/channels');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/channels');
        }
    }

}