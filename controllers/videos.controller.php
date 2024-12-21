
<?php

class videosController extends BaseController
{      
    
    public function index(){
        redirect('/videos/browse');
    }

    public function browse($start = 0, $q = '')
    {
        $start = intval($start);
        $q = urldecode($q); 
        $this->registry->template->url = "/videos/browse";
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 12;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->videos_model->total_rows($q);

        if($this->registry->session->get('user')){
            $user = $this->registry->session->get('user');
            $users_id = $user['users_id'];
        } else {
            $users_id = 0;
        }
        $this->registry->template->videos_data = $this->registry->videos_model->get_limit_data(12, $start, $q, $users_id);
        
       // $this->loadLibrary('pagination');
       // $this->pagination->initialize($this->registry->template);
       // $this->registry->template->pagination = $this->pagination->create_links();
        
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('videos/videos_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }

    public function category($category, $start = 0, $q = '')
    {
        $start = intval($start);
        $q = urldecode($q); 
        $this->registry->template->url = "/videos/category/".$category;
        
        if($this->registry->session->get('user')){
            $user = $this->registry->session->get('user');
            $users_id = $user['users_id'];
        } else {
            $users_id = 0;
        }

        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 12;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->videos_model->total_rows($q, $category);
        $this->registry->template->videos_data = $this->registry->videos_model->get_limit_data(12, $start, $q, $users_id, $category);
        
       // $this->loadLibrary('pagination');
       // $this->pagination->initialize($this->registry->template);
       // $this->registry->template->pagination = $this->pagination->create_links();
        
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('videos/videos_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }

    public function my($var = '')
    {

        $videos_data = $this->registry->shows_model->get_all();
        foreach($videos_data as $video){
            $video = (array) $video;
            $title = $video['name'];
            $slug = convertTitleToURL($title);

            $data = array('slug' => $slug);
            $this->registry->shows_model->update($video['id'], $data);
        }

        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/videos/?q=". urlencode($q);
            $this->registry->template->first_url = "/videos/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/videos/";
            $this->registry->template->first_url = "/videos/";
        }
        
        
        $this->registry->template->shows_data = $this->registry->videos_model->get_my_data();

        $this->registry->template->show('header.view.php');
        $this->registry->template->show('videos/video_browse.view.php');
        $this->registry->template->show('footer.view.php'); 
    }
    
    public function watch($id){
        $row = $this->registry->videos_model->get_by_slug($id);
      // var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;

            $this->registry->template->upNextVideo = $this->registry->videos_model->get_next($row['videos_id']);
            //var_dump($upNextVideo);
            //exit;
	    
            //$this->registry->template->show('header.view.php');
            $this->registry->template->show('videos/player.view.php');
            //$this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/videos');
        }
    }

    public function view($id){
        $row = $this->registry->videos_model->get_by_slug($id);
      // var_dump($row);
        if ($row) {
            $this->registry->template->data = $row;
	    
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('videos/videos_view.view.php');
            $this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/videos');
        }
    }

    public function history($start = 0, $q = ''){
        if($this->registry->session->get('user')){
            $user = $this->registry->session->get('user');
            $users_id = $user['users_id'];

            $start = intval($start);
            $q = urldecode($q); 
            $this->registry->template->url = "/videos/history";
            $this->registry->template->first_url = "/videos/history";
            
            $this->registry->template->q = $q;
            $this->registry->template->start = $start;
            $this->registry->template->per_page = 12;
            $this->registry->template->page_query_string = TRUE;
            $this->registry->template->total_rows = $this->registry->videoProgress_model->total_rows($users_id);
    
            if($this->registry->session->get('user')){
                $user = $this->registry->session->get('user');
                $users_id = $user['users_id'];
            } else {
                $users_id = 0;
            }
            $this->registry->template->videos_data = $this->registry->videoProgress_model->get_limit_data($users_id, 12, $start, $q, $users_id);
            
            //$row = $this->registry->videosProgress_model->get_by_slug($id);
            $this->registry->template->show('header.view.php');
            $this->registry->template->show('videos/videos_history.view.php');
            $this->registry->template->show('footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/login');
        }

    }


    public function upload(){
       
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('videos/videos_upload.view.php');
        $this->registry->template->show('footer.view.php'); 

    }

    public function create(){
       
        $this->registry->template->show('header.view.php');
        $this->registry->template->show('videos/videos_form.view.php');
        $this->registry->template->show('footer.view.php'); 

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

 
            $files_id = 0;

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
                        $data = array('videos_files_id' => $files_id);
                        $this->registry->videos_model->update($id, $data);
                    }

                } else {                    
                    //upload failed
                    echo $uploader->getMessage(); //get upload error message
                }

            
            }
           
            
            $images_id = 0;

            if(isset($_FILES['fileToUpload'])){
                
                
                $dirpath = CDN_FOLDER . "/videos/thumbnails/";

                $uploader   =   new Uploader();
            
                $uploader->setExtensions(array('jpg','jpeg','png','gif', 'png'));  //allowed extensions list//
            
                $uploader->setMaxSize(10);                          //set max file size to be allowed in MB//
            
                $uploader->setDir($dirpath);
            
                if($uploader->uploadFile('fileToUpload')){

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

            $data = array(
                'title' => $_REQUEST['title'],
                'description' => $_REQUEST['description'],
                'categoryId' => $_REQUEST['categoryId'],
                'thumbnail' => $thumbnail,
                'filePath' => $filePath,
                'videos_images_id' => $images_id,
                'videos_files_id' => $files_id,
                'users_id' => $user['users_id']
            );

            $this->registry->videos_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/content');
        } else {

            login();
        }
        
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $user = $this->registry->session->get('user');

            $row = $this->registry->videos_model->get_by_id($id);
            if ($row) {
                $this->registry->template->data =  $row;
                $this->registry->template->show('header.view.php');
                $this->registry->template->show('videos/videos_update_form.view.php');
                $this->registry->template->show('footer.view.php'); 
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

            $data = array(
            'title' => $_REQUEST['title'],
            'description' => $_REQUEST['description'],
            'categoryId' => $_REQUEST['categoryId'],
            'thumbnail' => $thumbnail,
            'filePath' => $filePath,
            'videos_images_id' => $images_id,
            'videos_files_id' => $files_id
            );

            $this->registry->videos_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/videos/update/' . $id);
        } else {

            login();
        }
        
    }
    
    public function delete($id) {
        $row = $this->registry->videos_model->get_by_id($id);

        if ($row) {
            $this->registry->videos_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/videos/my');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/videos/my');
        }
    }


}