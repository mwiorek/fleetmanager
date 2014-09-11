<?php

function bid_redirect($destination_script){

	header('Location: ' . $destination_script); //send client to destination

	session_write_close();	//close the surrent session
	exit(); //prevent further PHP output
}