
<?php

class usersController extends BaseController
{      
    
    public function index()
    {
        
        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/admin/users/?q=". urlencode($q);
            $this->registry->template->first_url = "/admin/users/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/admin/users/";
            $this->registry->template->first_url = "/admin/users/";
        }
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->usersmodel->total_rows();
        $this->registry->template->users_data = $this->registry->usersmodel->get_limit_data(10, $start, $q);
/*
        $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);

        $this->registry->template->pagination = $this->pagination->create_links();
        */
        //$this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/users/users_browse.view.php');
        //$this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->usersmodel->get_user($id);
       
        if ($row) {
            $this->registry->template->data = array(
            'users_id' => $row->users_id,
            'users_name' => $row->users_name,
            'users_password' => $row->users_password,
            'users_email' => $row->users_email,
            'users_type' => $row->users_type
            );
	    
            //$this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/users/users_view.view.php');
            //$this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/users');
        }
    }

    public function create(){
        if($this->registry->session->get('user')){

            $user = $this->registry->session->get('user');
            
            if($user['users_types_id'] == 1){
            
                $this->registry->template->users_types = $this->registry->users_types_model->get_all();

                //$this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('admin/users/users_form.view.php');
                //$this->registry->template->show('admin/footer.view.php'); 
            } else {
                redirect('/admin/users');
            }
        } else {
            login();
        }
    }
    
    public function create_action(){

        $images_id = 0;
           
        if(isset($_FILES['fileToUpload'])){
                
            $dirpath = CDN_FOLDER . "/users"."/";

            $uploader   =   new Uploader();
        
            $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
        
            $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
        
            $uploader->setDir($dirpath);
        
            if($uploader->uploadFile('fileToUpload')){
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
        
        $data = array(
        'users_images_id' => $images_id,
        'users_first_name' => $_REQUEST['users_first_name'],
        'users_last_name' => $_REQUEST['users_last_name'],
        'users_email' => $_REQUEST['users_email'],
        'users_phone' => $_REQUEST['users_phone'],
        'users_address' => $_REQUEST['users_address'],
        'users_city' => $_REQUEST['users_city'],
        'users_state' => $_REQUEST['users_state'],
        'users_zip' => $_REQUEST['users_zip'],
        'users_password' => $_REQUEST['users_password'],
        'users_types_id' => $_REQUEST['users_types_id']
	    );



        $this->registry->usersmodel->create($data);
        //$this->session->set_flashdata('message', 'Create Record Success');
        redirect('/admin/users');
        
    }

    public function profile() {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');
            
           
            $row = $this->registry->usersmodel->get_user($user['users_id']);
            
            if ($row) {
                $this->registry->template->data =  $row;
                //$this->registry->template->show('header.view.php');

                $this->registry->template->users_types = $this->registry->users_types_model->get_all();

                $this->registry->template->show('admin/users/users_update_form.view.php');
               // $this->registry->template->show('footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/users');
            }

        } else {

            login();
        }
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');
            
            if($id){
               $row = $this->registry->usersmodel->get_user($id);
            } else {
                $row = $this->registry->usersmodel->get_user($user['users_id']);
            }
            if ($row) {
                $this->registry->template->data =  $row;
                //$this->registry->template->show('header.view.php');

                $this->registry->template->users_types = $this->registry->users_types_model->get_all();

                $this->registry->template->show('admin/users/users_update_form.view.php');
               // $this->registry->template->show('footer.view.php'); 
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

            $users_id = $_REQUEST['users_id'];

            if($user['users_id'] == $users_id ){
                $images_id = $user['images_id'];

            } else {
                $user = $this->registry->usersmodel->get_user($users_id);
                $images_id = $user['images_id'];
            }
            
            

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
                    'images_users_id' => $users_id,
                    'images_file' => CDN_URL ."/users"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/users"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }
                }
            
            }

            if(!empty($_REQUEST['users_password']) || !empty($_REQUEST['users_password_confirm'])){
                if($_REQUEST['users_password'] == $_REQUEST['users_password_confirm']){
                    $password = md5($_REQUEST['users_password']);
                    $data = array('users_password' => $password);
                    $this->registry->usersmodel->update($users_id, $data);
                } 
            } 

            if(!empty($_REQUEST['users_types_id'])){
                $data = array('users_types_id' => $_REQUEST['users_types_id']);
                $this->registry->usersmodel->update($users_id, $data);
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

            
            
            $row = $this->registry->usersmodel->update($users_id, $data);
            

           
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/users');
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->usersmodel->get_user($id);

        if ($row) {
            $this->registry->usersmodel->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/users');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/users');
        }
    }


    public function block($id, $status){
        
        if($this->registry->session->get('user')){

            $data = array(
            'users_blocked' => $status
            );

            $this->registry->usersmodel->update($id, $data);
        } else {

            login();
        }
        
    }


    public function subscribe($id, $status){
        
        if($this->registry->session->get('user')){

            $data = array(
                'users_subscriber' => $status
            );

            $this->registry->usersmodel->update($id, $data);
        } else {

            login();
        }
        
    }



}