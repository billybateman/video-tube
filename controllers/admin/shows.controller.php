
<?php

class showsController extends BaseController
{      
    
    public function index($start = 0, $q = '')
    {
        $this->browse();
    }
    public function browse($start = 0, $q = '')
    {
        $this->registry->template->url = "/admin/shows/";
        $this->registry->template->first_url = "/admin/shows/";

        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->shows_model->total_rows($q);
        $this->registry->template->shows_data = $this->registry->shows_model->get_limit_data(10, $start, $q);
        
        /* $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);
        $this->registry->template->pagination = $this->pagination->create_links(); */
        
        //$this->registry->template->show('header.view.php');
        $this->registry->template->show('admin/shows/shows_browse.view.php');
        //$this->registry->template->show('footer.view.php'); 
    }

    public function my($var = '')
    {

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/shows/?q=". urlencode($q);
            $this->registry->template->first_url = "/shows/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/shows/";
            $this->registry->template->first_url = "/shows/";
        }
        
        
        $this->registry->template->shows_data = $this->registry->shows_model->get_my_data();

        $this->registry->template->show('header.view.php');
        $this->registry->template->show('shows/show_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->shows_model->get_by_id($id);
        var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('admin/shows/shows_view.view.php');
            $this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/shows');
        }
    }

    public function create(){
       
        //$this->registry->template->show('admin/header.view.php');

        $this->registry->template->categories_data = $this->registry->categories_model->get_all();
        
        $this->registry->template->show('admin/shows/shows_form.view.php');
        //$this->registry->template->show('footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            
            $images_id = 0;

            $thumbnail = "";

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/shows/thumbnails"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){
                   
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/shows/thumbnails"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/shows/thumbnails"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }

                    $thumbnail = CDN_URL ."/shows/thumbnails"."/" . $suc_file;
                    
                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $cover = null;
            
            if(isset($_FILES['coverToUpload'])){
                
                $dirpath = CDN_FOLDER . "/shows/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/shows/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }
            
            $status = 0;
            if( $_REQUEST['status'] == "on"){
                $status = 1;

            }

            $data = array(
                'name' => filter_xss($_REQUEST['name']),
                'description' =>  filter_xss($_REQUEST['description']),
                'slug' => $_REQUEST['slug'],
                'categoryId' => $_REQUEST['categoryId'],
                'seasons' => $_REQUEST['seasons'],
                'episodes' => $_REQUEST['episodes'],
                'years' => $_REQUEST['years'],
                'rating' => $_REQUEST['rating'],
                'status' => $status,
                'users_id' => $user['users_id'],
                'thumbnail' => $thumbnail,
                'shows_images_id' => $images_id,
                'cover' => $cover
                );

            $this->registry->shows_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/shows');
        } else {

            login();
        }
        
    }


   
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $row = $this->registry->shows_model->get_by_id($id);

            //var_dump($row);
            //exit;
            
            if ($row) {
                $this->registry->template->data =  $row;
                //$this->registry->template->show('admin/header.view.php');
                $this->registry->template->categories_data = $this->registry->categories_model->get_all();
        
                $this->registry->template->show('admin/shows/shows_update_form.view.php');
                //$this->registry->template->show('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/shows/');
            }

        } else {

            login();
        }
    }
    
    public function update_action($id){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $show = $this->registry->shows_model->get_by_id($id);

          
            
            $thumbnail = $show['thumbnail'];

            $images_id = $show['shows_images_id'];

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/shows/thumbnails"."/";

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
                    'images_file' => CDN_URL ."/shows/thumbnails"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/shows/thumbnails"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                        $thumbnail = CDN_URL ."/shows/thumbnails"."/" . $suc_file;
                    }

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $cover = $show['cover'];;

            if(isset($_FILES['coverToUpload'])){
                
                $dirpath = CDN_FOLDER . "/shows/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/shows/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $status = 0;
            if( $_REQUEST['status'] == "on"){
                $status = 1;

            }

            $data = array(
                'name' => filter_xss($_REQUEST['name']),
                'description' =>  filter_xss($_REQUEST['description']),
                'slug' => $_REQUEST['slug'],
                'categoryId' => $_REQUEST['categoryId'],
                'seasons' => $_REQUEST['seasons'],
                'episodes' => $_REQUEST['episodes'],
                'years' => $_REQUEST['years'],
                'rating' => $_REQUEST['rating'],
                'status' => $status,
                'users_id' => $user['users_id'],
                'thumbnail' => $thumbnail,
                'shows_images_id' => $images_id,
                'cover' => $cover
                );

               // var_dump($data);
            $this->registry->shows_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/shows/update/'.$id);
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->shows_model->get_by_id($id);

        if ($row) {
            $this->registry->shows_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/shows');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/shows');
        }
    }


    public function status($id, $status){
        
        if($this->registry->session->get('user')){

            $data = array(
            'status' => $status
            );

            $this->registry->shows_model->update($id, $data);
        } else {

            login();
        }
        
    }

    public function featured($id, $featured){
        
        if($this->registry->session->get('user')){

            $data = array(
            'featured' => $featured
            );

            $this->registry->shows_model->update($id, $data);
        } else {

            login();
        }
        
    }


}