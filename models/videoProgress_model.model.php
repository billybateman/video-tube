<?php

class videoProgress_model
{

    public $table = 'videoProgress';
    public $table_id = 'id';
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
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch('array');		
        if(is_array($result)){
                return count($result);
        } else {
                return array();
        }
    }
    
    function get_limit_data($users_id, $per_page, $start, $q)
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
                        `videos`
                ON
                        `videos`.`videos_id` = `$this->table`.`videoId`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `videos`.`videos_id`
                AND 
                        `favorites`.`favorites_type` = 'videos'
                AND 
                        `favorites`.`favorites_users_id` = '$users_id'
                LEFT JOIN 
                        `images`
                ON
                        `videos`. `videos_images_id` =  `images`. `images_id`
                WHERE 
                        `$this->table`.`users_id` = '$users_id'
                ORDER BY
                        `$this->table`.`dateModified` DESC
                LIMIT 
                       $start, $per_page
                        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        //var_dump($result);
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
    
    function total_rows($users_id)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                WHERE 
                        `$this->table`.`users_id` = '$users_id'
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
                
                WHERE
                        `$this->table_id` = '$id'
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

    // get data by id
    function get_by_user_and_video($id, $users_id)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table` 
                
                WHERE
                        `$this->table`.`videoId` = '$id'
                AND
                        `$this->table`.`users_id` = '$users_id'
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
                
                WHERE
                        `videoProgress_file` = '$file'
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
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
