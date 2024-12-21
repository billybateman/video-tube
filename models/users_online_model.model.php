<?php

class users_online_model
{

    public $table = 'users_online';
    public $table_id = 'users_online_id';
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
    function get_all($users_id)
    {
       
        // delete me and add to table
        $this->db->where('users_online_users_id', $users_id);
        $this->db->delete($this->table);
        
        $data = array('users_online_users_id' => $users_id);
        $this->db->insert($this->table, $data);
       


        // delete all users_online where users_created <  now - 2 mins
        $newTime = strtotime('-5 hours -2 minutes');
        $two_min = date('Y-m-d H:i:s', $newTime);
         //prepare query
         $this->db->prepare
         (
                 "
                 SELECT
                         *
                 FROM
                         `$this->table`
                 WHERE
                         `users_online_created` < '$two_min'
                 ;
                 "
         );
 
         //execute query
         $this->db->query();		
         $result = $this->db->fetch_all('array');
         if(is_array($result)){
                foreach($result as $r){ 
                        $this->db->where($this->table_id, $r->users_online_id);
                        $this->db->delete($this->table);
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
                JOIN
                                `users`
                        ON
                                `users_online_users_id` = `users_id`
		JOIN
                                `users_types`
                        ON
                                `users`.`users_types_id` = `users_types`.`users_types_id`
		LEFT JOIN
                                `images`
                        ON
                                `users`.`users_images_id` = `images`.`images_id`
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
