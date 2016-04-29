<?php
	
	// split the request uri with ?
	$split_request = explode("?", $_SERVER['REQUEST_URI']);
	// now split the request only part by / to obtain verb
	$request_arr = explode("/",$split_request[0]);
	$http_type = $_SERVER['REQUEST_METHOD'];//get the http method

	// check for the type of request type issued if not valid simply respond with 
	// 
	switch ($http_type) {
		case 'GET':
			// check if request is for contact page
			if($request_arr[1] == "contact" && isset($_GET['e']))
			{
				$admin_email = $_GET['e'];
				ob_start();
        include(ROOT_DIR.'/template/contact.php');
        echo ob_get_clean();
			}
			break;
		case 'POST':
			if($request_arr[1] == "contact"){
				print_r($_POST);
			}
		default:

			break;
	}

?>