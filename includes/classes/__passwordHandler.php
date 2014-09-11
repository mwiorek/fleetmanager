<?php

Class passwordHandler{
	
	function password_encrypt($password) {
		
		//using the PASSWORD_DEFAULT algorith allows future safe algorithms
		// current (2014-09-09 v.5.5.14)DEFAULT is BCRYPT using cost 10 and random generated 
		// salt database field should accoring to php documentation be VARCHAR(255)

		return password_hash($password, PASSWORD_DEFAULT);

	}

	function password_check($input_password, $db_hashed_password){
		$hash = $this->password_encrypt($input_password);

		if ($hash === $db_hashed_password){
			return true;
		}else{
			return false;
		}
	}

}