<?php

class user{
	
	private $userId;
	private $name;
	private $email_address;
	private $password;
	private $userProfileImage;
	private $lastLogin;
	private $lastModified;
	private $dateCreated;
	private $userRole;

	function user($userId){
		global $mysqli;
		
		$user_stmt = $mysqli->prepare("SELECT users_id, users_name, users_email_address, users_password, users_profile_image, last_login, last_modified, date_created FROM " . TABLE_USERS . " u WHERE u.users_id = ?");

		$userId = $mysqli->real_escape_string($userId);

		$user_stmt->bind_param('s', $userId);

		if (!$user_stmt->execute()){
				//Error
			trigger_error('The query execution failed; MySQL said ('.$user_stmt->errno.') '.$user_stmt->error, E_USER_ERROR);
		}

		$user_stmt->store_result();
		$user_stmt->bind_result($userId, $name, $email_address, $password, $userProfileImage, $lastLogin, $lastModified, $dateCreated);

		if ($user_stmt->fetch()) {
			$this->userId = $userId;
			$this->name = $name;
			$this->email_address = $email_address;
			$this->password = $password;
			$this->userProfileImage = $userProfileImage;
			$this->lastLogin = $lastLogin;
			$this->lastModified = $lastModified;
			$this->dateCreated = $dateCreated;
			
			$role_stmt = $mysqli->prepare("SELECT role FROM " . TABLE_USERS_ROLES . " r WHERE r.users_id = ?");
			$role_stmt->bind_param('s', $userId);	
			
			if (!$role_stmt->execute()){
				//Error
				trigger_error('The query execution failed; MySQL said ('.$role_stmt->errno.') '.$role_stmt->error, E_USER_ERROR);
			}

			$role_stmt->store_result();
			$role_stmt->bind_result($userRole);

			$userRoles = array();
			while ($role_stmt->fetch()) {
				$userRoles[] = $userRole;
			}

			$this->userRole = $userRoles;

			return $this;
			
		}else{
			return false;
				//email does not exist in db;
		}

		$user_query->close();
		
	}

	private function updateField($field_name, $field_value){
		global $mysqli;

		$value = $mysqli->real_escape_string($field_value);
		
		$update_field_stmt = $mysqli->prepare("UPDATE " . TABLE_USERS . " set " . $field_name . " = ? WHERE users_id = " . $this->userId);

		$update_field_stmt->bind_param('s', $field_value);

		if (!$update_field_stmt->execute()){
			//Error
			trigger_error('The query execution failed; MySQL said ('.$update_field_stmt->errno.') '.$update_field_stmt->error, E_USER_ERROR);
		}

		$rows_updated = $update_field_stmt->affected_rows;

		$update_field_stmt->close();

		if ($rows_updated > 0){
			return true;
		}
		
		return false;
	}

	function updatePassword($new_password){
		//using the PASSWORD_DEFAULT algorith allows future safe algorithms
		// current (2014-09-09 v.5.5.14)DEFAULT is BCRYPT using cost 10 and random generated 
		// salt database field should accoring to php documentation be VARCHAR(255)

		if ($password_hash = password_hash($new_password, PASSWORD_DEFAULT)){
			
			$this->updateField('users_password', $password_hash);
			
		}else{
			throw new Exception('Internal password hash error', 101);
		}
	}

	function updateEmailAddress($new_email_adress){
		$this->updateField('users_email_address', $new_email_adress);
	}

	function updateName($new_name){
		$this->updateField('users_name', $new_name);
	}	

	function updateProfileImage($new_image){
		$this->updateField('users_profile_image', $new_image);
	}

	function updateLastLogin( $new_date = null ){
		if ($new_date == null){
			$new_date = date("Y-m-d H:i:s");
		}
		$this->updateField('last_login', $new_date);
	}

	function updateLastModified($new_date = null){
		if ($new_date == null){
			$new_date = date("Y-m-d H:i:s");
		}
		$this->updateField('last_modified', $new_date);
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

	function getProfileImage(){
		return $this->userProfileImage;
	}

	function getLastLogin(){
		return $this->lastLogin;
	}

	function getLastModified(){
		return $this->lastModified;
	}

	function getDateCreated(){
		return $this->dateCreated;
	}

	function getUserRole(){
		return $this->userRole;
	}


	static function authenticateUser($email_address, $password){
		global $mysqli;

		if (user::emailIsRegistered($email_address)){

			$password_hashed = $mysqli->prepare("SELECT users_password, users_id FROM " . TABLE_USERS . " WHERE users_email_address = ?");
			
			$email_address = $mysqli->real_escape_string($email_address);
			
			$password_hashed->bind_param('s', $email_address);

			if (!$password_hashed->execute()){
				//Error
				trigger_error('The query execution failed; MySQL said ('.$password_hashed->errno.') '.$password_hashed->error, E_USER_ERROR);
			}

			$password_hashed->store_result();
			$password_hashed->bind_result($password_hash, $users_id);
			$password_hashed->fetch();
			$password_hashed->close();

			if (password_verify($password, $password_hash)){
				
				//user is fully authenticated
				session_regenerate_id();
				$_SESSION['users_id'] = $users_id;

				return true;
				
			}else{
				throw new Exception('Wrong Password', 202);
				// password is incorrect;
				// exception is caught in application
			}

		}else{
			//email address not registered, cannot authenticate user
			throw new Exception('Email Address not registered', 201);
		}
		return false;

	}	

	static function createUser($name, $email_address, $password){
		global $mysqli;

		if (!user::emailIsRegistered($email_address)){
			//using the PASSWORD_DEFAULT algorith allows future safe algorithms
			// current (2014-09-09 v.5.5.14)DEFAULT is BCRYPT using cost 10 and random generated 
			// salt database field should accoring to php documentation be VARCHAR(255)

			if ($password_hash = password_hash($password, PASSWORD_DEFAULT)){

				$name = $mysqli->real_escape_string($name);
				$email_address = $mysqli->real_escape_string($email_address);

				$last_login = date("Y-m-d H:i:s", 0);
				$profile_image = DIR_WS_MEDIA . "profile_images/default.jpg";
				$today = date("Y-m-d H:i:s");

				$user_create_stmt = $mysqli->prepare("INSERT INTO " . TABLE_USERS . " (users_name, users_email_address, users_password, users_profile_image, last_login, last_modified, date_created) VALUES (?, ?, ?, ?, ?, ?, ?)");

				$user_create_stmt->bind_param('sssssss', $name, $email_address, $password_hash, $profile_image, $last_login, $today, $today);
				
				if (!$user_create_stmt->execute()){
					//Error
					trigger_error('The query execution failed; MySQL said ('.$user_create_stmt->errno.') '.$user_create_stmt->error, E_USER_ERROR);
				}
				$user_instered = $user_create_stmt->affected_rows;

				$user_create_stmt->close();

				if ($user_instered > 0){
					$inserted_user = user::getUser($email_address);
					if (user::countUsers('ADMIN') < 1){
						//someone must have ADMIN rights
						
						$user_role_stmt = $mysqli->prepare("INSERT INTO " . TABLE_USERS_ROLES . " (users_id, role) VALUES (?, 'ADMIN')");

						$user_role_stmt->bind_param('s', $inserted_user->getUserId());

						if (!$user_role_stmt->execute()){
							//Error
							trigger_error('The query execution failed; MySQL said ('.$user_role_stmt->errno.') '.$user_role_stmt->error, E_USER_ERROR);
						}

						$user_role_stmt->close();
					}
					return $inserted_user;
				} else {
					return false;
				}

			}else{
				//error - password was unable to be hashed
				throw new Exception('Internal password hash error', 101);
			}

		}else{
			//error - email address already exists
			throw new Exception('Email Address already registered', 204);
		}

	}

	static function countUsers($role = null){
		global $mysqli;

		if (!is_null($role)){
			$user_check = $mysqli->prepare("SELECT count(*) as total FROM " . TABLE_USERS_ROLES . " ur WHERE role = ?");
			//filter by role
			$role = $mysqli->real_escape_string($role);
			$user_check->bind_param('s', $role);
		}else{
			$user_check = $mysqli->prepare("SELECT count(*) as total FROM " . TABLE_USERS . "");
		}

		if (!$user_check->execute()){
			//Error
			trigger_error('The query execution failed; MySQL said ('.$user_check->errno.') '.$user_check->error, E_USER_ERROR);
		}

		$user_check->store_result();
		$user_check->bind_result($user_count);
		$user_check->fetch();
		$user_check->close();

		return $user_count;
	}

	static function getAllUsers($role = null){
		global $mysqli;

		if (!is_null($role)){
			$user_check = $mysqli->prepare("SELECT users_id FROM " . TABLE_USERS_ROLES . " ur WHERE role = ?");
			//filter by role
			$role = $mysqli->real_escape_string($role);
			$user_check->bind_param('s', $role);
		}else{
			$user_check = $mysqli->prepare("SELECT users_id FROM " . TABLE_USERS . "");
		}

		if (!$user_check->execute()){
			//Error
			trigger_error('The query execution failed; MySQL said ('.$user_check->errno.') '.$user_check->error, E_USER_ERROR);
		}

		$user_check->store_result();
		$user_check->bind_result($user_id);
		
		$users_list = array();
		while ($user_check->fetch()){
			$users_list[] = new user($user_id);
		}

		$user_check->close();

		return $users_list;
	}


	static function getUser($email_address){
		global $mysqli;
		
		$user_stmt = $mysqli->prepare("SELECT users_id FROM " . TABLE_USERS . " WHERE users_email_address = ?");

		$email_address = $mysqli->real_escape_string($email_address);

		$user_stmt->bind_param('s', $email_address);

		if (!$user_stmt->execute()){
				//Error
			trigger_error('The query execution failed; MySQL said ('.$user_stmt->errno.') '.$user_stmt->error, E_USER_ERROR);
		}

		$user_stmt->store_result();
		$user_stmt->bind_result($userId);

		if ($user_stmt->fetch()) {

			$user = new user($userId);
		}

		$user_stmt->close();

		if (isset($user)){
			return $user;
		}

		return false;

	}

	static function emailIsRegistered($email_address){
		global $mysqli;

		$email_count;

		$email_check = $mysqli->prepare("SELECT count(*) as total FROM " . TABLE_USERS . " WHERE users_email_address = ?");

		$email_address = $mysqli->real_escape_string($email_address);

		$email_check->bind_param('s', $email_address);

		if (!$email_check->execute()){
			//Error
			trigger_error('The query execution failed; MySQL said ('.$email_check->errno.') '.$email_check->error, E_USER_ERROR);
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

	function deleteUser(){
		global $mysqli;

		$users_id = $mysqli->real_escape_string($this->getUserId());
		$rollback = false;

		$mysqli->begin_transaction();
		$mysqli->autocommit(false);

		$users_role_delete = $mysqli->prepare("DELETE FROM " . TABLE_USERS_ROLES . " WHERE users_id = ?");
		$users_role_delete->bind_param('s', $users_id);

		$user_delete = $mysqli->prepare("DELETE FROM " . TABLE_USERS . " WHERE users_id = ?");
		$user_delete->bind_param('s', $users_id);

		//TODO
		/*
		*	DELETE FROM VEHICLE DRIVER
		*/

		if (!$users_role_delete->execute() || !$user_delete->execute()){
			//Error
			trigger_error('The query execution failed; MySQL said ('.$users_role_delete->errno.') '.$users_role_delete->error, E_USER_ERROR);
			$rollback = true;
		}
		$users_role_delete->close();
		$user_delete->close();

		if ($rollback){
			$mysqli->rollback();
			return false;
		}else{
			$mysqli->commit();
			return true;
		}

	}


}