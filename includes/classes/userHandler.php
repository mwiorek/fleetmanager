<?php

class userHandler{

	function authenticate($email_address, $password){


	}	

	function createUser($name, $email_address, $password){
		global $mysqli;

		if (!$this->emailIsRegistered($email_address)){
			//using the PASSWORD_DEFAULT algorith allows future safe algorithms
			// current (2014-09-09 v.5.5.14)DEFAULT is BCRYPT using cost 10 and random generated 
			// salt database field should accoring to php documentation be VARCHAR(255)

			if ($password_hash = password_hash($password, PASSWORD_DEFAULT)){

				$name = $mysqli->real_escape_string($name);
				$email_address = $mysqli->real_escape_string($email_address);

				$user_create_stmt = $mysqli->prepare("INSERT INTO " . TABLE_USERS . " (users_name, users_email_address, users_password) VALUES (?, ?, ?)");

				$user_create_stmt->bind_param('sss', $name, $email_address, $password_hash);
				
				if (!$user_create_stmt->execute()){
					//Error
					trigger_error('The query execution failed; MySQL said ('.$stmt->errno.') '.$stmt->error, E_USER_ERROR);
				}
				if (!$user_create_stmt->affected_rows > 0){
					//nothing was inserted...
				}else{
					//map to object
					return $this->getUser($email_address);
				}

				$user_create_stmt->close();

			}else{
				//error - password was unable to be hashed
			}

		}else{
			//error - email address already exists
		}

	}

	function getUser($email_address){
		global $mysqli;
		
		$user_stmt = $mysqli->prepare("SELECT users_id FROM " . TABLE_USERS . " WHERE users_email_address = ?");
			
			$email_address = $mysqli->real_escape_string($email_address);
			
			$user_stmt->bind_param('s', $email_address);

			if (!$user_stmt->execute()){
				//Error
				trigger_error('The query execution failed; MySQL said ('.$stmt->errno.') '.$stmt->error, E_USER_ERROR);
			}

			$user_stmt->store_result();
			$user_stmt->bind_result($userId);
			
			if ($user_stmt->fetch()) {
				
				$user = new user($userId);
				
				return $user;

			}else{
				return false;
				//email does not exist in db;
			}

			$user_query->close();
		
	}

	function emailIsRegistered($email_address){
		global $mysqli;
		$email_count;

		$email_check = $mysqli->prepare("SELECT count(*) as total FROM " . TABLE_USERS . " WHERE users_email_address = ?");
			
			$email_address = $mysqli->real_escape_string($email_address);
			
			$email_check->bind_param('s', $email_address);

			if (!$email_check->execute()){
				//Error
				trigger_error('The query execution failed; MySQL said ('.$stmt->errno.') '.$stmt->error, E_USER_ERROR);
			}

			$email_check->store_result();
			$email_check->bind_result($email_count);
			$email_check->fetch();
			$email_check->close();

		if ($email_count > 0){
			return true;
			//email is registered
		}else{
			return false;
			//email does not exist in db;
		}
	}

}