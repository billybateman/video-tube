<?php

class favorites_model
{

        public $table = 'favorites';
        public $table_id = 'favorites_id';
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
         function get_by_type_and_slug($type, $slug)
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
                                `$this->table`.`favorites_type` = '$type'
                        AND 
                                `$this->table`.`favorites_media_id` = '$slug'
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
          function get_by_type_and_id($type, $slug)
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
                                 `$this->table`.`favorites_type` = '$type'
                         AND 
                                 `$this->table`.`favorites_media_id` = '$slug'
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

        function get_favorites($users_id){

                //prepare query
                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `favorites`
                        WHERE
                                `favorites_users_id` = '$users_id'
                        
                        ;
                        "
                );
        
                //execute query
                $this->db->query();		
                $result = $this->db->fetch_all('object');
               
        
                foreach($result as $favorite){

                        if($favorite->favorites_type == "video"){
        
                                $this->db->prepare
                                (
                                        "
                                        SELECT
                                                *
                                        FROM
                                                `videos`
                                        WHERE 
                                                `slug` = '$favorite->favorites_media_id'
                                        ;
                                        "
                                );
        
                                //execute query
                                $this->db->query();		
                                $video = $this->db->fetch('object');
        
                                //var_dump($videos);
                                $favorite->name = $video->title;
                                $favorite->thumbnail = $video->thumbnail;
                        }
        
                        if($favorite->favorites_type == "shows"){
        
                                $this->db->prepare
                                (
                                        "
                                        SELECT
                                                *
                                        FROM
                                                `shows`
                                        WHERE 
                                                `slug` = '$favorite->favorites_media_id'
                                        ;
                                        "
                                );
        
                                //execute query
                                $this->db->query();		
                                $show = $this->db->fetch('object');
        
                                //var_dump($videos);
                                $favorite->name = $show->name;
                                $favorite->thumbnail = $show->thumbnail;
                        }
        
                        if($favorite->favorites_type == "movies"){
        
                                $this->db->prepare
                                (
                                        "
                                        SELECT
                                                *
                                        FROM
                                                `movies`
                                        WHERE 
                                                `slug` = '$favorite->favorites_media_id'
                                        ;
                                        "
                                );
        
                                //execute query
                                $this->db->query();		
                                $movie = $this->db->fetch('object');
        
                                //var_dump($videos);
                                $favorite->name = $movie->name;
                                $favorite->thumbnail = $movie->thumbnail;
                        }
                }
        
                if(is_array($result)){
                       return $result;
                } else {
                       return array();
                }
        
        }

}
