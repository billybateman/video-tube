<?php
/**
 * The News Model does the back-end heavy lifting for the News Controller
 */
class usersmodel
{
	public $table = 'users';
    public $table_id = 'users_id';
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
				JOIN
						`users_types`
				ON
						`users`.`users_types_id` = `users_types`.`users_types_id`
				LEFT JOIN
							`images`
					ON
							`users`.`users_images_id` = `images`.`images_id`
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
    

	/**
	 * Fetches user based on supplied id
	 * 
	 * @param string $id
	 * 
	 * @return array $user
	 */
	
	public function get_user_by_email($email)
	{		
			
		//sanitize data
		$this->db->escape($email);		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				*
			FROM
				`users` 
			JOIN
						`users_types`
				ON
						`users`.`users_types_id` = `users_types`.`users_types_id`
			JOIN
						`images`
				ON
						`users`.`users_images_id` = `images`.`images_id`
			WHERE
				`users_email` = '$email'
			LIMIT
				1
			;
			"
		);
		
		//execute query
		$this->db->query();		
		$user = $this->db->fetch('array');
                
		if($user){
		
			return $user;
		} else {
			return 0;
			
		}
	}
        
        /**
	 * Fetches user based on supplied id
	 * 
	 * @param string $id
	 * 
	 * @return array $user
	 */
	
	public function get_user($id)
	{		
				
		//sanitize data
		$this->db->escape($id);		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				*
			FROM
				`users` 
			JOIN
						`users_types`
				ON
						`users`.`users_types_id` = `users_types`.`users_types_id`
			LEFT JOIN
						`images`
				ON
						`users`.`users_images_id` = `images`.`images_id`
			WHERE
				`users_id` = '$id'
			LIMIT
				1
			;
			"
		);
		
		//execute query
		$this->db->query();		
		$user = $this->db->fetch('array');		
		return $user;
	}
        
        /**
	 * Fetches users
	 * 
	 * @param none
	 * 
	 * @return array $users
	 */
	
	public function get_users()
	{		
		
			
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				*
			FROM
				`users` 
			JOIN
					`users_types`
			ON
					`users`.`users_types_id` = `users_types`.`users_types_id`
			JOIN
                    `images`
            ON
                    `users`.`users_images_id` = `images`.`images_id`
			;
			"
		);
		
		//execute query
		$this->db->query();
                
                
		
		$users = $this->db->fetch_all('array');
		
		return $users;
	}


	    /**
	 * Fetches users
	 * 
	 * @param none
	 * 
	 * @return array $users
	 */
	
	 public function get_instructors()
	 {		
		 
			 
		 //prepare query
		 $this->db->prepare
		 (
			 "
			 SELECT
				 *
			 FROM
				 `users` 
			 JOIN
					 `users_types`
			 ON
					 `users`.`users_types_id` = `users_types`.`users_types_id`
			 JOIN
					 `images`
			 ON
					 `users`.`users_images_id` = `images`.`images_id`
			 ;
			 "
		 );
		 
		 //execute query
		 $this->db->query();
				 
				 
		 
		 $users = $this->db->fetch_all('array');
		 
		 return $users;
	 }
        
        /**
	 * Authenticate user based on supplied email, $password
	 * 
	 * @param string $email, $password
	 * 
	 * @return array $user
	 */
	
	public function authenticate_user($email, $password)
	{		
		
		$password = md5($password);
        
		//sanitize data
		$this->db->escape($email);
        $this->db->escape($password);
		
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				*
			FROM
				`users` 
			JOIN
					`users_types`
			ON
					`users`.`users_types_id` = `users_types`.`users_types_id`
			LEFT JOIN
					`images`
			ON
					`users`.`users_images_id` = `images`.`images_id`
		
			WHERE
				 `users`.`users_email` = '$email' AND  `users`.`users_password` = '$password'
			LIMIT
				1
			;
			"
		);

		
		
		//execute query
		$this->db->query();
               
		$user = $this->db->fetch('array');		
		return $user;
	}
        
    public function forgot_user($email)
	{	
        $password =  randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols");

        $password = $password[0];
                
		$md5_password = md5($password);

		       	
		//sanitize data
		$this->db->escape($email);
		//prepare query
		$this->db->prepare
		(
			"
			SELECT
				*
			FROM
				`users` 
                     JOIN
                                `users_types`
                        ON
                               `users`.`users_types_id` = `users_types`.`users_types_id`
			WHERE
				`users_email` = '$email'
			LIMIT
				1
			;
			"
		);
		
		//execute query
		$this->db->query();
               
		$user = $this->db->fetch('array');		
		if($user){
                    
                    // Send mail
                    $msg = "";
                    
                    include __APP_PATH.'/views/email/forgot.php';
                    
                    send_email($email, _NO_REPLY_EMAIL, _NO_REPLY_NAME, "Forgot Password", $msg);
                    
                    $this->db->prepare((
                            "UPDATE `users` SET `users_password` = '$md5_password' WHERE `users_email` = '$email';"
                    ));

                    $this->db->query();
                    return $user;
                } else {
                    return null;
                }
                
	}
        
        /**
	 * Authenticate user based on supplied email, $password
	 * 
	 * @param string $email, $password
	 * 
	 * @return array $user
	 */
	
	public function create_user($email, $password, $name, $type)
	{		
            
		$md5_password = md5($password);

		$exist = $this->get_user_by_email($email);
		
		if($exist == 0){
               	
			//sanitize data
			$this->db->escape($email);
			$this->db->escape($password);
			//prepare query
			$this->db->prepare
			(
				"
				INSERT INTO `users` 
							(`users_first_name`, `users_password`, `users_email`, `users_types_id`) 
							VALUES 
							('$name', '$md5_password', '$email', '$type');
				;
				"
			);

			
					
			$msg = "";
				
			include __APP_PATH.'/views/email/register.php';

			send_email($email, _NO_REPLY_EMAIL, _NO_REPLY_NAME, "New Account", $msg);
			
			//execute query
			$this->db->query();				
			return 1;
		} else {
			return 0;
		}
	}

	    /**
	 * Authenticate user based on supplied email, $password
	 * 
	 * @param string $email, $password
	 * 
	 * @return array $user
	 */
	
	 public function create($data)
	 {		
		
		$email = $data['users_email'];
		$password = $data['users_password'];
		$name = $data['users_first_name']." ".$data['users_last_name']; 
		$type = $data['users_types_id'];
		$password = $data['users_password'];
		$data['users_password'] = md5($data['users_password']);
 
		$exist = $this->get_user_by_email($email);
		 
		 if($exist == 0){

			$this->db->insert($this->table, $data);
					
			$this->db->insert('users', $data);
					 
			 $msg = "";
				 
			 include __APP_PATH.'/views/email/register.php';
 
			 send_email($email, _NO_REPLY_EMAIL, _NO_REPLY_NAME, "New Account", $msg);
			 
			 //execute query
			 $this->db->query();				
			 return 1;
		 } else {
			 return 0;
		 }
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