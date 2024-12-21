<?php
/**
 * The MySQL Improved driver extends the Database_Library to provide 
 * interaction with a MySQL database
 */
class mysqldriver extends databaselibrary
{
	/**
	 * Connection holds MySQLi resource
	 */
	private $connection;

	/**
	 * Query to perform
	 */
	private $query;

	/**
	 * Result holds data retrieved from server
	 */
	private $result;
        
        private $where;

	/**
	 * Create new connection to database
	 */ 
	public function connect()
	{
		//connection parameters
		$host = DB_HOST;
		$user = DB_USER;
		$password = DB_PASSWORD;
		$database = DB_NAME;

		//your implementation may require these...
		$port = NULL;
		$socket = NULL;	
	
		//create new mysqli connection
		$this->connection = new mysqli
		(
			$host , $user , $password , $database , $port , $socket
		);
	
		return TRUE;
	}

	/**
	 * Break connection to database
	 */
	public function disconnect()
	{
		//clean up connection!
		$this->connection->close();	
	
		return TRUE;
	}

	/**
	 * Prepare query to execute
	 * 
	 * @param $query
	 */
	public function prepare($queryIn)
	{
		//store query in query variable
		$this->query = $queryIn;	
	
		return TRUE;
	}

	/**
	 * Execute a prepared query
	 */
	public function query()
	{
		if (isset($this->query))
		{
                    //execute prepared query and store in result variable
                    //echo $this->query;
                        $this->result = $this->connection->query($this->query);
                        
                        return $this->result;
                        
		}
	
		return FALSE;		
	}


	public function last_inserted_id(){
		return $this->connection->insert_id;
	}

	/**
	 * Fetch a row from the query result
	 * 
	 * @param $type
	 */
   
        public function fetch_all($resulttype = MYSQLI_NUM)
        {
            if ($this->result){
                $res = array(); 
                while ($obj = $this->result->fetch_object()) {
                    $res[] = $obj;
                }
                return $res;
            } 
            return FALSE;
            
        }
        
        /**
	 * Fetch a row from the query result
	 * 
	 * @param $type
	*/ 
	public function fetch($type = 'object')
	{
		if (isset($this->result))
		{
			switch ($type)
			{
				case 'array':
			
					//fetch a row as array
					$row = $this->result->fetch_array();
			
				break;
			
				case 'object':
			
                                    //fall through...
			
				default:
				
					//fetch a row as object
					$row = $this->result->fetch_object();	
					
				break;
			}
		
			return $row;
		}
	
		return FALSE;
	}
	
	
	/**
	 * Sanitize data to be used in a query
	 * 
	 * @param $data
	 */
	public function escape($data)
	{
		return $this->connection->real_escape_string($data);
	}
        
        public function where($field, $val){
                $this->where = "WHERE $field = $val";
                return TRUE;
		
        }

		public function and_where($field, $val){
			$this->where .= " AND $field = $val";
			return TRUE;
	
	}
        
        public function insert($table, $data, $debug = false){
            
            $columns=array_keys($data);
            $values=array_values($data);

            $str ="INSERT INTO $table (".implode(',',$columns).") VALUES ('" . implode("', '", $values) . "' )";
            //echo $str;
			//exit;
			//if($debug){ 
				//echo $str;
				//exit;
			//}
			
            $this->result = $this->connection->query($str);
            return $this->result;
            
        }
        
        public function update($table, $data){
            //var_dump($data);
            //$columns=array_keys($data);
            //$values=array_values($data);
            
            $valueSets = array();
            foreach($data as $key => $value) {
               $valueSets[] = $key . " = '" . $value . "'";
            }

            $sql = "UPDATE $table SET ". join(",",$valueSets) ." ".$this->where;
			

            $this->result = $this->connection->query($sql);
			//
			//exit;
            return $this->result;
            
        }
        
        public function delete($table){
            
            
            $str ="DELETE FROM $table " . $this->where;
            $this->result = $this->connection->query($str);
            return $this->result;
            
        }
}