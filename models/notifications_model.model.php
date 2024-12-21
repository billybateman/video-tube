<?php

class notifications_model
{

    public $table = 'notifications';
    public $id = 'notifications_id';
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
   function get_new($users_id)
   {
      
       $query = "
       SELECT
               *
       FROM
               `$this->table`";

       if($users_id){
               $query .= "
               JOIN
                       `users`
               ON
                       `users`.`users_id` = `$this->table`.`notifications_users_id`

               WHERE
                       `$this->table`.`notifications_users_id` = '$users_id'
                AND
                       `$this->table`.`notifications_status` = '0'
                       ";
       }

       $query .= ";";
       //prepare query
       $this->db->prepare($query);

       //execute query
       $this->db->query();		
       $result = $this->db->fetch_all('array');		
       if(is_array($result)){
               // Add update notifications_status = 1
               
               return $result;
       } else {
               return array();
       }
   }

    // get all
    function get_all($users_id)
    {
       
        $query = "
        SELECT
                *
        FROM
                `$this->table`";

        if($users_id){
                $query .= "
                JOIN
                        `users`
                ON
                        `users`.`users_id` = `$this->table`.`notifications_users_id`

                WHERE
			`$this->table`.`notifications_users_id` = '$users_id'
                        ";
        }

        $query .= ";";
        //prepare query
        $this->db->prepare($query);

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');		
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }
    
    function get_limit_data($users_id, $per_page, $start, $q)
    {
       
        $query = "
                SELECT
                        *
                FROM
                        `$this->table`";

        if($users_id){
                $query .= "
                JOIN
                        `users`
                ON
                         `users`.`users_id` = `$this->table`.`notifications_users_id`
                WHERE
			`$this->table`.`notifications_users_id` = '$users_id'
                         ";
        }

        $query .= "
                LIMIT 
                        $per_page 
                OFFSET
                        $start;";
        //prepare query
        $this->db->prepare($query);

        //execute query
        $this->db->query();		
        $result = $this->db->fetch_all('array');
        //var_dump($result);
        if(is_array($result)){
                return $result;
        } else {
                return array();
        }
    }
    
    function total_rows($users_id)
    {
       
        $query = "
        SELECT
                *
        FROM
                `$this->table`";

        if($users_id){
                $query .= "
                JOIN
                        `users`
                ON
                        `users`.`users_id` = `$this->table`.`notifications_users_id`

                WHERE
			`$this->table`.`notifications_users_id` = '$users_id'
                        ";
        }

        $query .= ";";
        //prepare query
        $this->db->prepare($query);
        
        
        $result = $this->db->fetch_all('array');
        
        if(is_array($result)){
                return count($result);
        } else {
                return 0;
        }
    }
    
    

    // insert data
    function insert($data)
    {
        var_dump($this->db->insert($this->table, $data));
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
