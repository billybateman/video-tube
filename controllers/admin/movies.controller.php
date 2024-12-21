
<?php

class moviesController extends BaseController
{      
    
    public function index($var = '')
    {

        $q = '';
        $start = 0;
        $this->registry->template->url = "/admin/movies?";
        $this->registry->template->first_url = "/admin/movies?";

        if (isset($_REQUEST['start'])) {
            $start = intval($_REQUEST['start']);
        }
        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']); 
            $this->registry->template->url = "/admin/movies/?q=". urlencode($q);
            $this->registry->template->first_url = "/admin/movies?q=" . urlencode($q);
        } 
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->movies_model->total_rows($q);
        $this->registry->template->movies_data = $this->registry->movies_model->get_limit_data(10, $start, $q);
        
        /* $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);
        $this->registry->template->pagination = $this->pagination->create_links(); */
        
        //$this->registry->template->movie('header.view.php');
        $this->registry->template->show('admin/movies/movies_browse.view.php');
        //$this->registry->template->movie('footer.view.php'); 
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
        
        
        $this->registry->template->movies_data = $this->registry->movies_model->get_my_data();

       // $this->registry->template->movie('header.view.php');
        $this->registry->template->show('admin/movies/movie_browse.view.php');
        //$this->registry->template->movie('footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->movies_model->get_by_id($id);
        //var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            //$this->registry->template->movie('header.view.php');
            $this->registry->template->show('admin/movies/movie_view.view.php');
            //$this->registry->template->movie('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/movies');
        }
    }

    public function create(){
       
        //$this->registry->template->movie('header.view.php');
        $this->registry->template->categories_data = $this->registry->categories_model->get_all();
        
        $this->registry->template->show('admin/movies/movies_form.view.php');
        //$this->registry->template->movie('footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $thumbnail = null;
            
            $images_id = 0;

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies/thumbnails/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){

                    // Delete OLD FILE
                    //unlink($video['thumbnail']);

                    //if($images_id > 0){
                       //$this->registry->images_model->delete($images_id);
                    //}
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/movies/thumbnails/" . $suc_file
                    );

                    $thumbnail = CDN_URL ."/movies/thumbnails/" . $suc_file;
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/movies/thumbnails/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                    }

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }
            }
            
            $files_id = 0;

            $filePath = null;

            if(isset($_FILES['videoToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies/files/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('mov', 'mp4'));  //allowed extensions list//
            
                $uploader->setMaxSize(100000000);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('videoToUpload')){

                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'files_users_id' => $user['users_id'],
                    'files_file' => CDN_URL ."/movies/files/" . $suc_file
                    );

                    $filePath = CDN_URL ."/movies/files/" . $suc_file;
            
                    if($this->registry->files_model->create($data)){
                        $file = $this->registry->files_model->get_by_file(CDN_URL ."/movies/files/" . $suc_file);
                        $files_id = $file->files_id;
                        //echo $images_id. " image saved";
                    }

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }
            }

            $cover = null;

            if(isset($_FILES['coverToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/movies/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $data = array(
            'name' => filter_xss($_REQUEST['name']),
            'director' => filter_xss($_REQUEST['director']),
            'description' =>  filter_xss($_REQUEST['description']),
            'description' => $_REQUEST['description'],
            'slug' => $_REQUEST['slug'],
            'rating' => $_REQUEST['rating'],
            'cover' => $cover,
            'thumbnail' => $thumbnail,
            'filePath' => $filePath,
            'movies_images_id' => $images_id,
            'movies_files_id' => $files_id,
            'categoryId' => $_REQUEST['categoryId']
            );

            $this->registry->movies_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/movies');
        } else {

            login();
        }
        
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->movies_model->get_by_id($id);
            if ($row) {
                $this->registry->template->data =  $row;
                //$this->registry->template->movie('admin/header.view.php');
                $this->registry->template->categories_data = $this->registry->categories_model->get_all();
        
                $this->registry->template->show('admin/movies/movies_update_form.view.php');
                //$this->registry->template->movie('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/movies');
            }

        } else {

            login();
        }
    }
    
    public function update_action($id){
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');
            
            $movie = $this->registry->movies_model->get_by_id($id);

            $thumbnail = $movie['thumbnail'];
            
            $images_id = $movie['movies_images_id'];

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies/thumbnails"."/";

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
                    'images_file' => CDN_URL ."/movies/thumbnails"."/" . $suc_file
                    );
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/movies/thumbnails"."/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                        $thumbnail = CDN_URL ."/movies/thumbnails"."/" . $suc_file;
                    }

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $cover = $movie['cover'];;

            if(isset($_FILES['coverToUpload'])){
                
                $dirpath = CDN_FOLDER . "/movies/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/movies/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }
            

            $data = array(
                'name' => filter_xss($_REQUEST['name']),
                'director' => filter_xss($_REQUEST['director']),
                'description' =>  filter_xss($_REQUEST['description']),
                'slug' => $_REQUEST['slug'],
                'categoryId' => $_REQUEST['categoryId'],
                'releaseDate' => $_REQUEST['releaseDate'],
                'rating' => $_REQUEST['rating'],
                'users_id' => $user['users_id'],
                'thumbnail' => $thumbnail,
                'movies_images_id' => $images_id,
                'cover' => $cover
                );

            $this->registry->movies_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/movies');
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->movies_model->get_by_id($id);

        if ($row) {
            $this->registry->movies_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/movies');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/movies');
        }
    }


    public function status($id, $status){
        
        if($this->registry->session->get('user')){

            $data = array(
            'status' => $status
            );

            $this->registry->movies_model->update($id, $data);
        } else {

            login();
        }
        
    }

    public function featured($id, $featured){
        
        if($this->registry->session->get('user')){

            $data = array(
            'featured' => $featured
            );

            $this->registry->movies_model->update($id, $data);
        } else {

            login();
        }
        
    }

    public function import($id){
        
        if($this->registry->session->get('user')){

         
            $user = $this->registry->session->get('user');

            $video = $this->registry->movies_model->get_by_id($id);

            $filePath = $video['filePath'];
            
            $files_id = $video['movies_files_id'];

            $youtube_url = $_REQUEST['youtube_url'];


            $filename = downloadVideo($youtube_url);
           
            $filePath =  CDN_URL . "/movies/files/".$filename;

            if($files_id > 0){
                $this->registry->files_model->delete($files_id);
            }
            
            $data = array(
            'files_users_id' => $user['users_id'],
            'files_file' => CDN_URL ."/movies/files/" . $filename
            );

            
            if($this->registry->files_model->create($data)){
                $file = $this->registry->files_model->get_by_file(CDN_URL ."/movies/files/" . $filename);
                $files_id = $file->files_id;
                $data = array('movies_files_id' => $files_id,'filePath' => "$filePath");
                $this->registry->movies_model->update($id, $data);
            }

            ob_clean();
            $arr = array('video' => "$filePath");
            echo $filePath;

        }
    }

}