
<?php

class videosController extends BaseController
{      
    public function index(){
        redirect('/admin/videos/browse');
    }
    public function browse($start = 0, $q = '')
    {

       
        $this->registry->template->url = "/admin/videos?";
        $this->registry->template->first_url = "/admin/videos?";

        $start = intval($start);
        $q = urldecode($q); 
           
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;

        $total_rows = $this->registry->videos_model->total_rows($q);

        $this->registry->template->total_rows = $total_rows;
        $this->registry->template->videos_data = $this->registry->videos_model->get_limit_data(10, $start, $q);
        
       
        
        //$this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/videos/videos_browse.view.php');
        //$this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->videos_model->get_by_id($id);
        var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            $this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/videos/video_view.view.php');
            $this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/videos');
        }
    }

    public function create(){
       
        //$this->registry->template->show('admin/header.view.php');

        $this->registry->template->movies_data = $this->registry->movies_model->get_all();

        $this->registry->template->shows_data = $this->registry->shows_model->get_all();


        $this->registry->template->show('admin/videos/videos_form.view.php');
        //$this->registry->template->show('admin/footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $thumbnail = null;
            
            $images_id = 0;

            if(isset($_FILES['fileToUpload'])){
                
                $dirpath = CDN_FOLDER . "/videos/thumbnails/";

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
                    'images_file' => CDN_URL ."/videos/thumbnails/" . $suc_file
                    );

                    $thumbnail = CDN_URL ."/videos/thumbnails/" . $suc_file;
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/videos/thumbnails/" . $suc_file);
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
                
                $dirpath = CDN_FOLDER . "/videos/files/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('mov', 'mp4'));  //allowed extensions list//
            
                $uploader->setMaxSize(100000000);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('videoToUpload')){

                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'files_users_id' => $user['users_id'],
                    'files_file' => CDN_URL ."/videos/files/" . $suc_file
                    );

                    $filePath = CDN_URL ."/videos/files/" . $suc_file;
            
                    if($this->registry->files_model->create($data)){
                        $file = $this->registry->files_model->get_by_file(CDN_URL ."/videos/files/" . $suc_file);
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
                
                $dirpath = CDN_FOLDER . "/videos/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/videos/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }

            $data = array(
            'title' => $_REQUEST['title'],
            'releaseDate' => $_REQUEST['releaseDate'],
            'description' => $_REQUEST['description'],
            'entityId' => $_REQUEST['entityId'],
            'season' => $_REQUEST['season'],
            'episode' => $_REQUEST['episode'],
            
            'slug' => $_REQUEST['slug'],
            'cover' => $cover,
            'thumbnail' => $thumbnail,
            'filePath' => $filePath,
            'videos_images_id' => $images_id,
            'videos_files_id' => $files_id

            );

            $this->registry->videos_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/videos');
        } else {

            login();
        }
        
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->videos_model->get_by_id($id);
            
            $this->registry->template->movies_data = $this->registry->movies_model->get_all();

            $this->registry->template->shows_data = $this->registry->shows_model->get_all();

            if ($row) {
                $this->registry->template->data =  $row;
                ///$this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('admin/videos/videos_update_form.view.php');
                ///$this->registry->template->show('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/videos');
            }

        } else {

            login();
        }
    }
    
    public function update_action($id){
        
        if($this->registry->session->get('user')){


         
            $user = $this->registry->session->get('user');

            $video = $this->registry->videos_model->get_by_id($id);


            $filePath = $video['filePath'];
            
            $files_id = $video['videos_files_id'];

            if(isset($_FILES['videoToUpload'])){
                
                $dirpath = CDN_FOLDER . "/videos/files/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('mov', 'mp4'));  //allowed extensions list//
            
                $uploader->setMaxSize(100000000);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('videoToUpload')){

                    // Delete OLD FILE
                    //unlink($video['thumbnail']);

                    if($files_id > 0){
                        $this->registry->files_model->delete($files_id);
                    }
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'files_users_id' => $user['users_id'],
                    'files_file' => CDN_URL ."/videos/files/" . $suc_file
                    );

                    $filePath = CDN_URL ."/videos/files/" . $suc_file;
            
                    if($this->registry->files_model->create($data)){
                        $file = $this->registry->files_model->get_by_file(CDN_URL ."/videos/files/" . $suc_file);
                        $files_id = $file->files_id;
                        //echo $images_id. " image saved";
                        $data = array('videos_files_id' => $files_id);
                        $this->registry->videos_model->update($id, $data);
                    }

                } else {                    
                    //upload failed
                    echo $uploader->getMessage(); //get upload error message
                }

            
            }

            $cover = $video['cover'];

            if(isset($_FILES['coverToUpload'])){
                
                $dirpath = CDN_FOLDER . "/videos/covers"."/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('coverToUpload')){
                    
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";
                    $cover = CDN_URL ."/videos/covers"."/" . $suc_file;
                    

                } else {                    
                    //upload failed
                    //echo $uploader->getMessage(); //get upload error message
                }

            }
           
            $thumbnail = $video['thumbnail'];

            $images_id = $video['videos_images_id'];

            if(isset($_FILES['fileToUpload'])){
                
                $thumbnail = $video['thumbnail'];
            
                $images_id = $video['videos_images_id'];
                
                $dirpath = CDN_FOLDER . "/videos/thumbnails/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){

                    // Delete OLD FILE
                    //unlink($video['thumbnail']);

                    if($images_id > 0){
                        $this->registry->images_model->delete($images_id);
                    }
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    //echo $suc_file." successfully uploaded";

                    $data = array(
                    'images_users_id' => $user['users_id'],
                    'images_file' => CDN_URL ."/videos/thumbnails/" . $suc_file
                    );

                    $thumbnail = CDN_URL ."/videos/thumbnails/" . $suc_file;
            
                    if($this->registry->images_model->create($data)){
                        $image = $this->registry->images_model->get_by_file(CDN_URL ."/videos/thumbnails/" . $suc_file);
                        $images_id = $image->images_id;
                        //echo $images_id. " image saved";
                        $data = array('videos_images_id' => $images_id,'thumbnail' => "$thumbnail");
                        $this->registry->videos_model->update($id, $data);
                    }

                } else {                    
                    //upload failed
                    echo $uploader->getMessage(); //get upload error message
                }
            }

            if($_REQUEST['video_link'] != ""){
                if($files_id > 0){
                    $this->registry->files_model->delete($files_id);
                    $files_id = 0;
                }
                $filePath = $_REQUEST['video_link'];

            }


            $data = array(
            'title' => $_REQUEST['title'],
            'releaseDate' => $_REQUEST['releaseDate'],
            'description' => $_REQUEST['description'],
            'entityId' => $_REQUEST['entityId'],
            'season' => $_REQUEST['season'],
            'episode' => $_REQUEST['episode'],
            'slug' => $_REQUEST['slug'],
            'cover' => $cover,
            'thumbnail' => $thumbnail,
            'filePath' => $filePath,
            'videos_images_id' => $images_id,
            'videos_files_id' => $files_id
            );


            $this->registry->videos_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/videos/');
        } else {

            login();
        }
        
    }

    public function import($id){
        
        if($this->registry->session->get('user')){

         
            $user = $this->registry->session->get('user');

            $video = $this->registry->videos_model->get_by_id($id);

            $filePath = $video['filePath'];
            
            $files_id = $video['videos_files_id'];

            $youtube_url = $_REQUEST['youtube_url'];


            $filename = downloadVideo($youtube_url);
           
            $filePath =  CDN_URL . "/videos/files/".$filename;

            if($files_id > 0){
                $this->registry->files_model->delete($files_id);
            }
            
            $data = array(
            'files_users_id' => $user['users_id'],
            'files_file' => CDN_URL ."/videos/files/" . $filename
            );

            
            if($this->registry->files_model->create($data)){
                $file = $this->registry->files_model->get_by_file(CDN_URL ."/videos/files/" . $filename);
                $files_id = $file->files_id;
                $data = array('videos_files_id' => $files_id,'filePath' => "$filePath");
                $this->registry->videos_model->update($id, $data);
            }

            ob_clean();
            $arr = array('video' => "$filePath");
            echo json_encode($filePath);

        }
    }


    public function update_video($id){
        
        if($this->registry->session->get('user')){
    
            $user = $this->registry->session->get('user');

            $video = $this->registry->videos_model->get_by_id($id);

            /*$filename = "test.mp4";

            /* Choose where to save the uploaded file */
            //$location = CDN_FOLDER . "/videos/files/".$filename;

            //file_put_contents($location, base64_decode($_POST["videoToUpload"]));
            /* Get the name of the uploaded file */
            

            /* Save the uploaded file to the local filesystem */
            //if ( move_uploaded_file($_FILES['videoToUpload']['tmp_name'], $location) ) { 
            //    echo 'Success'; 
            //} else { 
            //    echo 'Failure'; 
           // }


            if(isset($_FILES['videoToUpload'])){
                
                $filePath = $video['filePath'];
            
                $files_id = $video['videos_files_id'];
                
                $dirpath = CDN_FOLDER . "/videos/files/";


                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('mov', 'mp4', 'mpeg'));  //allowed extensions list//
            
                $uploader->setMaxSize(100000000);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('videoToUpload')){

                    // Delete OLD FILE
                    //unlink($video['thumbnail']);

                    if($files_id > 0){
                        $this->registry->files_model->delete($files_id);
                    }
                    $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
                    echo $suc_file." successfully uploaded";

                    $data = array(
                    'files_users_id' => $user['users_id'],
                    'files_file' => CDN_URL ."/videos/files/" . $suc_file
                    );

                    $filePath = CDN_URL ."/videos/files/" . $suc_file;
            
                    if($this->registry->files_model->create($data)){
                        $file = $this->registry->files_model->get_by_file(CDN_URL ."/videos/files/" . $suc_file);
                        $files_id = $file->files_id;
                        echo $files_id. " file saved";
                        $data = array('videos_files_id' => $files_id,'filePath' => "$filePath");
                        $this->registry->videos_model->update($id, $data);
                    }

                } else {                    
                    //upload failed
                    echo $uploader->getMessage(); //get upload error message
                }

            

                
            }

            


        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->videos_model->get_by_id($id);

        if ($row) {
            $this->registry->videos_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/videos');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/videos');
        }
    }


    public function status($id, $status){
        
        if($this->registry->session->get('user')){

            $data = array(
            'status' => $status
            );

            $this->registry->videos_model->update($id, $data);
        } else {

            login();
        }
        
    }

    public function featured($id, $featured){
        
        if($this->registry->session->get('user')){

            $data = array(
            'featured' => $featured
            );

            $this->registry->videos_model->update($id, $data);
        } else {

            login();
        }
        
    }

}