<?php

class channels_model
{

    public $table = 'channels';
    public $table_id = 'channels_id';
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
                         `subscriptions`
                ON
                         `$this->table`. `channels_id` =  `subscriptions`. `subscriptions_channels_id` 
                AND
                        `subscriptions`. `subscriptions_users_id` = '$users_id'
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
                WHERE
                        `$this->table`.`channels_featured` = 1
                LIMIT 12
                        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        //var_dump($result);
        if(is_array($result)){

                foreach($result as $row){
                        $users_id = $row->channels_users_id;
                        $channels_id = $row->channels_id;
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
                        $row->channels_users_info = $results;


                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `subscriptions`
                                WHERE
                                        `subscriptions`.`subscriptions_channels_id` = '$channels_id'
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch_all('object');
                        $row->channels_subscribers = count($results);

                }


                return $result;
        } else {
                return array();
        }
        
       
    }


    function get_popular()
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
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
                
                
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
                         `images`
                ON
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
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
    
    function get_limit_data($per_page, $start, $q, $users_id)
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
                         `subscriptions`
                ON
                         `$this->table`. `channels_id` =  `subscriptions`. `subscriptions_channels_id` 
                AND
                        `subscriptions`. `subscriptions_users_id` = '$users_id'
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
                LIMIT $per_page
                        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        //var_dump($result);
        if(is_array($result)){

                foreach($result as $row){
                        $users_id = $row->channels_users_id;
                        $channels_id = $row->channels_id;
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
                        $row->channels_users_info = $results;


                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `subscriptions`
                                WHERE
                                        `subscriptions`.`subscriptions_channels_id` = '$channels_id'
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch_all('object');
                        $row->channels_subscribers = count($results);

                }


                return $result;
        } else {
                return array();
        }
    }
    

    function get_limit_data_my($users_id)
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
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
                WHERE
                     `$this->table`. `channels_users_id` = '$users_id'  
                        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        //var_dump($result);
        if(is_array($result)){

                foreach($result as $row){
                        $users_id = $row->channels_users_id;
                        $channels_id = $row->channels_id;
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
                        $row->channels_users_info = $results;


                        $this->db->prepare
                        (
                                "
                                SELECT
                                        *
                                FROM
                                        `subscriptions`
                                WHERE
                                        `subscriptions`.`subscriptions_channels_id` = '$channels_id'
                                ;
                                "
                        );
                
                        //execute query
                        $this->db->query();		
                        $results = $this->db->fetch_all('object');
                        $row->channels_subscribers = count($results);

                }


                return $result;
        } else {
                return array();
        }
    }
    function total_rows()
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
                LEFT JOIN 
                         `images`
                ON
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
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
    function get_by_users_id($id)
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
                        `channels_users_id` = '$id'
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');		
        return $result;
    }

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
                         `$this->table`. `channels_images_id` =  `images`. `images_id`
                WHERE
                        `channels_slug` = '$id'
                LIMIT
                        1
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch('object');
        
        
       $row  = $result;

                $users_id = $row->channels_users_id;
                $channels_id = $row->channels_id;
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
                $result->channels_users_info = $results;


                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `subscriptions`
                        WHERE
                                `subscriptions`.`subscriptions_channels_id` = '$channels_id'
                        ;
                        "
                );
        
                //execute query
                $this->db->query();		
                $results = $this->db->fetch_all('object');
                $result->channels_subscribers = count($results);

      

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
                        `channels_file` = '$file'
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
        $image = $this->get_by_id($id);
        $image_file = $image->channels_file;

        $image_file = str_replace(CDN_URL, CDN_FOLDER, $image_file);
        unlink($image_file);

        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
