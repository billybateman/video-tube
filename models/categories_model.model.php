<?php

class categories_model
{

    public $table = 'categories';
    public $table_id = 'categories_id';
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
   function get_home()
   {
      
       //prepare query
       $this->db->prepare
       (
               "
               SELECT
                       *
               FROM
                       `categories`
               ORDER BY
                       `categories_name`
               ASC
               ;
               "
       );

       //execute query
       $this->db->query();		
       $result = $this->db->fetch_all('object');
       
       foreach($result as $r){
                $categories_id = $r->categories_id;
                 //prepare query
                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `shows`
                         LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `shows`.`slug`
                AND 
                        `favorites`.`favorites_type` = 'shows'
                        WHERE
                               `categoryId` = $categories_id

                        ORDER BY
                                `name`
                        ASC
                        LIMIT 
                                15
                        ;
                        "
                );

               

                //execute query
                $this->db->query();		
                $shows = $this->db->fetch_all('object');
                $r->shows = $shows;

                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `movies`
                        
                        LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `movies`.`slug`
                AND 
                        `favorites`.`favorites_type` = 'movie'
                        WHERE
                               `categoryId` = '$categories_id'
                        ORDER BY
                                `name`
                        ASC
                        LIMIT 
                                15
                        ;
                        "
                );


               

                //execute query
                $this->db->query();		
                $movies = $this->db->fetch_all('object');
                $r->movies = $movies;


                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `videos`
                        LEFT JOIN
                                `shows`
                        ON
                                `videos`.`entityId` = `shows`.`id`
                       
                               LEFT JOIN
                        `favorites`
                        ON
                                `favorites`.`favorites_media_id` = `videos`.`slug`
                        AND 
                                `favorites`.`favorites_type` = 'video'
                        WHERE
                               `shows`.`categoryId` = '$categories_id'
                        ORDER BY
                                `videos`.`title`
                        ASC
                        LIMIT 
                                15
                        ;
                        "
                );

                //execute query
                $this->db->query();		
                $videos = $this->db->fetch_all('object');
                $r->videos = $videos;

       }

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
                ORDER BY
                        `categories_name`
                ASC
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');		
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }
    
    function get_limit_data($per_page, $start, $q)
    {
       
        //prepare query
        $this->db->prepare
        (
                "
                SELECT
                        *
                FROM
                        `$this->table`
                LIMIT $per_page
                        
                ;
                "
        );

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('object');
        //var_dump($result);
        if(is_array($result)){
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
                        `categories_file` = '$file'
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
        $image_file = $image->categories_file;

        $image_file = str_replace(CDN_URL, CDN_FOLDER, $image_file);
        unlink($image_file);

        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
