<?php

class shows_model
{

    public $table = 'shows';
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

   function get_episode($id){

        //prepare query
       $this->db->prepare
       (
               "
               SELECT
                       *
               FROM
                       `shows`
               WHERE
                        `slug` = '$id'
               
               ;
               "
       );

       //execute query
       $this->db->query();		
       $result = $this->db->fetch('object');
       $show_id = $result->id;
       $seasons = $result->seasons;
       
       
     

        $seasons_arr = array();

        for($i = 1; $i <= $seasons; $i++){

              

                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `videos`
                        WHERE `entityId` = '$show_id'
                        
                        AND `season` = '$i'
                        
                        ORDER BY
                                `videos`.`episode`
                                ASC
                        
                        ;
                        "
                );

              

                //execute query
                $this->db->query();		
                $videos = $this->db->fetch_all('object');

                //var_dump($videos);
                $seasons_arr[] = $videos;
                
        }
        

       // $result->seasons_arr = $seasons_arr;

       

      // var_dump($result);
      

       if(is_array($seasons_arr)){
               return $seasons_arr;
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
    
    function get_limit_data($per_page, $start, $q)
    {
       
        $where = "";

        if($q != ""){
                $where = " WHERE `$this->table`.`name` LIKE '%$q%' ";

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
                        `categories`
                ON
                        `categories`.`categories_id` = `$this->table`.`categoryid`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `$this->table`.`slug`
                AND 
                        `favorites`.`favorites_type` = 'shows'
                $where
                 ORDER BY `shows`.`id`
                LIMIT $start, $per_page
                        
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
    
    function total_rows($q)
    {
        $where = "";

        if($q != ""){
                $where = " WHERE `name` LIKE '%$q%' ";

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



    // get all
    function get_featured()
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
                        `categories`
                ON
                        `categories`.`categories_id` = `$this->table`.`categoryid`
                LEFT JOIN
                        `favorites`
                ON
                        `favorites`.`favorites_media_id` = `shows`.`slug`
                AND 
                        `favorites`.`favorites_type` = 'shows'
                
                WHERE

                        `$this->table`.`featured` = 1
                LIMIT 2
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
                        `categories`
                ON
                        `categories`.`categories_id` = `$this->table`.`categoryid` 
                
                WHERE
                        `slug` = '$id'
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
                        `shows_file` = '$file'
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
        $image_file = $image->shows_file;

        $image_file = str_replace(CDN_URL, CDN_FOLDER, $image_file);
        unlink($image_file);

        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
