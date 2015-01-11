<?php

function connect_db(){
	$host = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'db';

	$mysqli = new mysqli($host, $username, $password, $database);

	//check db connection 
	if ($mysqli->connect_error) {
	   die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	   return false;
	}

	return $mysqli;

}

function insert_post($name, $email_adress, $website, $comment, $date){
	
	//check db connection 
	if ($mysqli = connect_db()){

			

		//check if table exists



		//sqlInjection safe with prepare and execute statement
		if ($statement = $mysqli->prepare("INSERT INTO guest_book (name,email_adress,website,comment,date) VALUES (?,?,?,?,?) ")) {

			//bind as references
		    $statement->bind_param("sssss", $name, $email_adress, $website, $comment, $date);
		    
			//unescape HTML, properSQL
			$name = $mysqli->real_escape_string(htmlspecialchars($name));
			$email_adress = $mysqli->real_escape_string(htmlspecialchars($email_adress));
			$website = $mysqli->real_escape_string(htmlspecialchars($website));
			$comment = $mysqli->real_escape_string(htmlspecialchars($comment));

			//insert query to database
			$statement->execute();

		    $statement->close();
		}

		//close db connection
		$mysqli->close();
	}
}

function grab_posts($sort_order = 1){

	switch($sort_order){
		case 1:
			$sort_order = 'date desc';
			break;
		case 2:
			$sort_order = 'date asc';
			break;
		case 3:
			$sort_order = 'name asc';
			break;
		case 4:
			$sort_order = 'name desc';
			break;
		default:
			$sort_order = 'date desc';
	}

	if ($mysqli = connect_db()){

		$result_array = array();

		//sqlInjection safe with prepare and execute statements
		if ($statement = $mysqli->prepare("SELECT id, name, email_adress, website, comment, date FROM guest_book order by " . $sort_order . " ")) {
		    
			//execute select query
			$statement->execute();

			//store_reult to make sure mysqli does not allocate unnessary amount of memory
			$statement->store_result();

			//bind result to variables
		    $statement->bind_result($id, $name, $email_adress, $website, $comment, $date);

			while ($statement->fetch()) {
		        $result_array[] = array('id' => $id,
		        						'name' => $name,
		        						'email_adress' => $email_adress,
		        						'website' => $website,
		        						'comment' => $comment,
		        						'date' => $date);
		    }

		    $statement->close();
		}
		
		//close db connection
		$mysqli->close();
	}
	return $result_array;
}

?>

