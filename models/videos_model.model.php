<?php

class videos_model
{

    public $table = 'videos';
    public $table_id = 'videos_id';
    public $order = 'DESC';
    
    /**
    * Holds instance of database connection
    */
   static $instance;
   private $db;


   public static function getInstance()
   {
           if(self::$instance ==  null){
                   self::$instance = new self();
           }
           return self::$instance;
   }

   private function __clone(){} 



   public function __construct()
   {
           $this->db = new mysqldriver;
           
            //connect to database
            $this->db->connect();
   }


   function get_next($id)
    {
        
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `videos`
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
               WHERE 
                        `videos`. `videos_id` = '$id'        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch('object');
        //var_dump($result);

        $entityId = $result->entityId;

         //prepare query
         $this->db->prepare
         (
                 "
                 SELECT
                         *
                 FROM
                         `videos`
                 LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
                WHERE 
                         `entityId` = $entityId
                ORDER BY season, episode
                 ;
                 "
         );

 
         //execute query
         $this->db->query();		
         $episodes = $this->db->fetch_all('object');
         $next_id = 1;
         $past_current = false;
         foreach($episodes as $episode){
                if($past_current){
                        $next_id = $episode->videos_id;
                }
                if($episode->videos_id == $id){
                        $past_current = true;
                }
         }
        
        // echo $next_id;
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `videos`
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
               WHERE 
                        `videos`. `videos_id` = $next_id       
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch('array');

        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
        
    }

    // get all
    function get_all()
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                
                LEFT JOIN
                        `movies`
                ON
                        `movies`.`id` = `$this->table`.`entityId`
                LEFT JOIN
                        `shows`
                ON
                        `shows`.`id` = `$this->table`.`entityId`
                LEFT JOIN 
                         `users`
                ON
                         `$this->table`. `users_id` =  `users`. `users_id`
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');		
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }
    
    function get_limit_data($per_page, $start, $q, $users_id = '', $category = '')
    {
        $where = "";

        if($q != ""){
                $where = " WHERE `title` LIKE '%$q%' ";
        }

        if($category != ''){

                //prepare query
                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `categories`
                        
                        WHERE
                                `categories`.`categories_slug` = '$category'
                        LIMIT 1
                        ;
                        "
                );

                //execute query
                $this->db->query();		
                $cat_result = $this->db->fetch('object');
                
                if(is_object($cat_result)){
                        $category = $cat_result->categories_id;
                        if($q != ''){
                                $where .= " AND `categoryId` = '$category' ";
                        } else {
                                $where = " WHERE `categoryId` = '$category' ";
                        }
                }
        }

        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                
                LEFT JOIN
                        `images`
                ON
                        `images`.`images_id` = `$this->table`.`videos_images_id`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `$this->table`.`videos_id`
                AND 
                        `favorites`.`favorites_type` = 'videos'
                AND 
                        `favorites`.`favorites_users_id` = '$users_id'
                $where
                 ORDER BY `videos`.`videos_id`
                LIMIT 
                       $start, $per_page
                        
                ;
                "
        );


        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');

        if(is_array($result)){
                foreach($result as $row){

                        $users_id = $row->users_id;
                
                        //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                }
        
        }

        //var_dump($result);
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }
    
    function total_rows($q, $category = '')
    {
        $where = "";

        $where = "";

        if($q != ""){
                $where = " WHERE `title` LIKE '%$q%' ";
        }

        if($category != ''){

                //prepare query
                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `categories`
                        
                        WHERE
                                `categories`.`categories_slug` = '$category'
                        LIMIT 1
                        ;
                        "
                );

                //execute query
                $this->db->query();		
                $cat_result = $this->db->fetch('object');
                
                if(is_object($cat_result)){
                        $category = $cat_result->categories_id;
                        if($q != ''){
                                $where .= " AND `categoryId` = '$category' ";
                        } else {
                                $where = " WHERE `categoryId` = '$category' ";
                        }
                }
        }
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                $where
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');
        
        if(is_array($result)){
                return count($result);
        } else {
                return 0;
        }
    }


    function get_limit_data_my($users_id)
    {
        $where = "WHERE users_id = '$users_id'";

        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                
                LEFT JOIN
                        `images`
                ON
                        `images`.`images_id` = `$this->table`.`videos_images_id`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `$this->table`.`videos_id`
                AND 
                        `favorites`.`favorites_type` = 'videos'
                AND 
                        `favorites`.`favorites_users_id` = '$users_id'
                $where
                ORDER BY `videos`.`videos_id`
                ;
                "
        );


        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');

        if(is_array($result)){
                foreach($result as $row){

                        $users_id = $row->users_id;
                
                        //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                }
        
        }

        //var_dump($result);
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }

    function get_limit_data_my_new($users_id)
    {
        $where = "WHERE `users_id` = '$users_id' AND `uploadDate` >= DATE(NOW() - INTERVAL 7 DAY)";

        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                
                LEFT JOIN
                        `images`
                ON
                        `images`.`images_id` = `$this->table`.`videos_images_id`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `$this->table`.`videos_id`
                AND 
                        `favorites`.`favorites_type` = 'videos'
                AND 
                        `favorites`.`favorites_users_id` = '$users_id'
                $where
                ORDER BY `videos`.`videos_id`
                ;
                "
        );


        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');

        if(is_array($result)){
                foreach($result as $row){

                        $users_id = $row->users_id;
                
                        //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                }
        
        }

        //var_dump($result);
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }

    // get data by id
    function get_by_id($id)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table` 
               LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
                         LEFT JOIN 
                         `users`
                ON
                         `$this->table`. `users_id` =  `users`. `users_id`
                WHERE
                        `$this->table_id` = '$id'
                LIMIT
                        1
                ;
                "
        );

        
        //execute query
        $this->db->query();		
        $result = $this->db->fetch('array');		
        return $result;
    }

    // get data by id
    function get_by_slug($id)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table` 
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
                LEFT JOIN
                        `channels`
                ON
                        `channels`.`channels_id` = `$this->table`.`entityId`
                LEFT JOIN 
                        `categories`
                ON
                        `videos`. `categoryId` =  `categories`. `categories_id`
                WHERE
                        `$this->table`.`slug` = '$id'
                LIMIT
                        1
                ;
                "
        );
        
        //execute query
        $this->db->query();		
        $row = $this->db->fetch('object');
        
        if(is_object($row)){

                        $users_id = $row->users_id;
                       
                         //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                
        }

        return $row;
    }


    function get_by_file($file)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table` 
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
                WHERE
                        `videos_file` = '$file'
                LIMIT
                        1
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch('object');		
        return $result;
    }
    
    
    function get_featured($users_id = '')
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `videos_images_id` =  `images`. `images_id`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `videos`.`videos_id`
                AND 
                        `favorites`.`favorites_type` = 'videos'
                AND 
                        `favorites`.`favorites_users_id` = '$users_id'
                LEFT JOIN 
                         `users`
                ON
                         `$this->table`. `users_id` =  `users`. `users_id`
                WHERE
                        `$this->table`.`featured` = 1
                
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');		
        if(is_array($result)){
               
                foreach($result as $row){

                        $users_id = $row->users_id;
                
                        //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );

                       
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                }

                return $result;
        
        } else {
                return array();
        }
    }

    function get_limit_data_channel($per_page, $start, $q, $users_id = '', $channel_id = ''){
        $where = "WHERE `playlists`.`playlists_channels_id` = '$channel_id' ";

        if($q != ""){
                $where = " AND `videos`.`title` LIKE '%$q%' ";
        }

        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `playlists`
                LEFT JOIN 
                         `videos`
                ON
                         `videos`. `videos_id` =  `playlists`. `playlists_videos_id`
                LEFT JOIN 
                         `images`
                ON
                         `videos`. `videos_images_id` =  `images`. `images_id`
                $where
                ORDER BY 
                        `videos`.`videos_id`
                LIMIT 
                       $start, $per_page
                ;
                "
        );

       

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        
        if(is_array($result)){
               
                foreach($result as $row){

                        $users_id = $row->playlists_users_id;
                
                        //prepare query
                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `users`
                                LEFT JOIN 
                                        `images`
                                ON
                                        `users`. `users_images_id` =  `images`. `images_id`
                                WHERE
                                        `users`.`users_id` = '$users_id'
                                LIMIT 1
                                ;
                                "
                        );

                       
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch('object');
                        $row->videos_users_info = $results;
                }

                return $result;
        } else {
                return 0;
        }
    }

    function total_rows_channel($q, $channel_id = '')
    {
        $where = "WHERE `playlists`.`playlists_channels_id` = '$channel_id' ";

        if($q != ""){
                $where = " AND `videos`.`title` LIKE '%$q%' ";
        }

       
              
        
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `playlists`
                LEFT JOIN 
                         `videos`
                ON
                         `videos`. `videos_id` =  `playlists`. `playlists_videos_id`
                LEFT JOIN 
                         `images`
                ON
                         `videos`. `videos_images_id` =  `images`. `images_id`
                
                $where
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');
        
        if(is_array($result)){
                return count($result);
        } else {
                return 0;
        }
    }

    function get_channel($id)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `playlists`
                LEFT JOIN 
                         `videos`
                ON
                         `videos`. `videos_id` =  `playlists`. `playlists_videos_id`
                LEFT JOIN 
                         `images`
                ON
                         `videos`. `videos_images_id` =  `images`. `images_id`
                WHERE
                        `playlists`.`playlists_channels_id` = 1
                
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');		
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }

    // insert data
    function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

     // insert data
     function last_inserted_id()
     {
         $this->db->last_inserted_id();
     }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $image = $this->get_by_id($id);
        $image_file = $image->videos_file;

        $image_file = str_replace(CDN_URL, CDN_FOLDER, $image_file);
        unlink($image_file);

        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
