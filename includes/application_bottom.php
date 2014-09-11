<?php

//stop session
session_write_close();

//Kill and close db connection
$db->close();