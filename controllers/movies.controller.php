
<?php

class moviesController extends BaseController
{      
    
    public function index($var = '')
    {

        $q = '';
        $start = 0;
        $this->registry->template->url = "/movies?";
        $this->registry->template->first_url = "/movies?";

        if (isset($_REQUEST['start'])) {
            $start = intval($_REQUEST['start']);
        }
        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']); 
            $this->registry->template->url = "/movies/?q=". urlencode($q);
            $this->registry->template->first_url = "/movies?q=" . urlencode($q);
        } 
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 12;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->movies_model->total_rows($q);
        $this->registry->template->movies_data = $this->registry->movies_model->get_limit_data(12, $start, $q);
        
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('movies/movies_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }

    public function my($var = '')
    {

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/movies/?q=". urlencode($q);
            $this->registry->template->first_url = "/movies/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/movies/";
            $this->registry->template->first_url = "/movies/";
        }
        
        
        $this->registry->template->shows_data = $this->registry->movies_model->get_my_data();

        $this->registry->template->show('header.view.php');
        $this->registry->template->show('movies/movie_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }
    
    public function watch($id){
        $row = $this->registry->movies_model->get_by_slug($id);
      // var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            //$this->registry->template->show('header.view.php');
            $this->registry->template->show('videos/player.view.php');
            //$this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/movies');
        }
    }

    public function view($id){
        $row = $this->registry->movies_model->get_by_id($id);
        var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('movies/movie_view.view.php');
            $this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/movies');
        }
    }

    public function create(){
       
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('movies/movie_form.view.php');
        $this->registry->template->show('footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $images_id = 0;

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){
                   
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/movies"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/movies"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }
                    
                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $data = array(
            'movies_images_id' => $images_id,
            'movies_name' => $_REQUEST['movies_name'],
            'movies_users_id' => $user['users_id']
            );

            $this->registry->movies_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/movies/my');
        } else {

            login();
        }
        
    }
    
    public function update() {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->movies_model->get_by_users_id($user['users_id']);
            if ($row) {
                $this->registry->template->data =  $row;
                $this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('movies/movies_update_form.view.php');
                $this->registry->template->show('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/movies/my');
            }

        } else {

            login();
        }
    }
    
    public function update_action(){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $movie = $this->registry->movies_model->get_by_users_id($user['users_id']);
            
            $images_id = $movie['movies_images_id'];

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies"."/";

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
                    'images_file' => CDN_URL ."/movies"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/movies"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $data = array(
            'movies_images_id' => $images_id,
            'movies_name' => $_REQUEST['movies_name'],
            'movies_users_id' => $user['users_id']
            );

            $this->registry->movies_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/movies/my');
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->movies_model->get_by_id($id);

        if ($row) {
            $this->registry->movies_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/movies/my');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/movies/my');
        }
    }

}