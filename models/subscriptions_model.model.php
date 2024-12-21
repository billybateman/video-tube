<?php

class subscriptions_model
{

        public $table = 'subscriptions';
        public $table_id = 'subscriptions_id';
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
                LEFT JOIN 
                        `channels`
                ON
                        `channels`.`channels_id` = `subscriptions`.`subscriptions_channels_id`
                LEFT JOIN 
                        `images`
                        ON
                         `channels`. `channels_images_id` =  `images`. `images_id`
                LEFT JOIN 
                        `users`
                ON
                        `channels`.`channels_users_id` = `users`.`users_id`
                
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
         function get_by_channel($id)
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
                         `$this->table`.`subscriptions_channels_id` = '$id'
                 ;
                 "
         );
 
         //execute query
         $this->db->query();		
         $result = $this->db->fetch_all('array');		
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

        function get_subscriptions($users_id){

                //prepare query
                $this->db->prepare
                (
                        "
                        SELECT
                                *
                        FROM
                                `subscriptions`
                        LEFT JOIN 
                                `channels`
                        ON
                                `channels`.`channels_id` = `subscriptions`.`subscriptions_channels_id`
                        LEFT JOIN 
                                `images`
                        ON
                                 `channels`. `channels_images_id` =  `images`. `images_id`
                        LEFT JOIN 
                                `users`
                        ON
                                `channels`.`channels_users_id` = `users`.`users_id`

                        WHERE
                                `subscriptions`.`subscriptions_users_id` = '$users_id'
                        
                        ;
                        "
                );
        
                //execute query
                $this->db->query();		
                $result = $this->db->fetch_all('object');
        
                
                if(is_array($result)){

                        foreach($result as $row){
                                $users_id = $row->channels_users_id;
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

                        }

                       return $result;
                } else {
                       return array();
                }
        
        }


        function get_subscription($users_id, $id){

                //prepare query
                $this->db->prepare
                (
                        "SELECT  * FROM `subscriptions`
                        WHERE
                                `subscriptions`.`subscriptions_users_id` = '$users_id'
                        AND
                                `subscriptions`.`subscriptions_channels_id` = '$id'
                        LIMIT 1
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


         // get data by id
         function get_by_user_and_id($id, $user)
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
                         `$this->table`.`subscriptions_channels_id` = '$id'
                 AND 
                         `$this->table`.`subscriptions_users_id` = '$user'
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

}
