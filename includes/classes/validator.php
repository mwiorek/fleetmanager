

Class validator{
	
	function validate_email($email){
		filter_var($email, FILTER_VALIDATE_EMAIL)
	}

	function validate_matching_inputs($input, $input_confirmation){
		if ($input === $input_confirmation){
			return true;
		}else{
			return false;
		}
	}





}