<?php

class user{
	
	private $userId;
	private $name;
	private $email_address;
	private $password;

	function user($userId){
		global $mysqli;
		
		$user_stmt = $mysqli->prepare("SELECT users_id, users_name, users_email_address, users_password FROM " . TABLE_USERS . " WHERE users_id = ?");
			
			$userId = $mysqli->real_escape_string($userId);
			
			$user_stmt->bind_param('s', $userId);

			if (!$user_stmt->execute()){
				//Error
				trigger_error('The query execution failed; MySQL said ('.$stmt->errno.') '.$stmt->error, E_USER_ERROR);
			}

			$user_stmt->store_result();
			$user_stmt->bind_result($userId, $name, $email_address, $password);
			
			if ($user_stmt->fetch()) {
				$this->userId = $userId;
				$this->name = $name;
				$this->email_address = $email_address;
				$this->password = $password;

				return $this;
			
			}else{
				return false;
				//email does not exist in db;
			}

			$user_query->close();
		
	}



	function updatePassword(){

	}

	function updateEmailAddress(){

	}

	function updateName(){

	}	

	function getUserId(){
		return $this->userId;
	}

	function getName(){
		return $this->name;
	}

	function getEmailAddress(){
		return $this->email_address;
	}

	function getPassword(){
		return $this->password;
	}



}