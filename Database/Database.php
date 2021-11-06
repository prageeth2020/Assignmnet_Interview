<?php
	class Database{
		
		private $connection;
                  
		function __construct() {
			 try{
				$dbhost = "localhost:3306";
				$username = "root";
				$password = "prageeth.456";
				$dbname = "assignment";
				$this->connection = new mysqli($dbhost, $username, $password, $dbname);
		
				if( mysqli_connect_errno() ){
					throw new Exception("Could not connect to database.");   
				}
			
			}catch(Exception $e){
				throw new Exception($e->getMessage());   
			}	
		
		
		}
      
		public function getConnect() {  
			return $this->connection;
		}
		
		public function query($sql)
		{
			return $this->connection->query($sql);
		}
		
	}
					
?>