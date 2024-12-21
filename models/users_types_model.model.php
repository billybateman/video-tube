<?php

class users_types_model
{

    public $table = 'users_types';
    public $table_id = 'users_types_id';
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
        $result = $this->db->fetch_all('array');
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }


     // get all
     function get_signup_type()
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
                         `$this->table`.`users_types_signup_type`
                 LIMIT 1
                 ;
                 "
         );
 
         //execute query
         $this->db->query();		
         $result = $this->db->fetch('object');
         if(is_object($result)){
                 return $result;
         } else {
                 return array();
         }
     }
    
    function get_limit_data($per_page, $start, $q)
    {
        $where = "";

        if($q != ""){
                $where = " WHERE `users_types_name` LIKE '%$q%' ";

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
                LIMIT $per_page
                        
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
        $result = $this->db->fetch('object');		
        return $result;
    }
    
    

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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
