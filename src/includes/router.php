<?php
	include_once(ROOT_DIR.'/src/sendmail.php');
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
			if($request_arr[1] == "contact" && 
				isset($_GET['e']) && 
				isset($_GET['n']) &&
				isset($_GET['w'])
				)
			{
				// check if fields are not blank
				$admin_email = $_GET['e'];
				$admin_name = $_GET['n'];
				$admin_website = $_GET['w'];
				ob_start();
        include(ROOT_DIR.'/template/contact.php');
        echo ob_get_clean();
			}
			else{
				http_response_code(404);
			}
			break;
		case 'POST':
			if($request_arr[1] == "contact"){
				// if secret key is filled then consider as robot
				// send back 410 status code
				if(!empty($_POST['secret_key']))
				{
					http_response_code(410);
					exit;
				}

				if(empty($_POST['admin_email']) || 
					 empty($_POST['admin_name'])  ||
					 empty($_POST['useremail'])   ||
					 empty($_POST['txtname'])     ||
					 empty($_POST['message'])			||
					 empty($_POST['admin_site'])
					 )
				{
					http_response_code(400);
					exit;	
				}
				sendMail(
					$_POST['admin_email'],
					$_POST['admin_name'],
					$_POST['useremail'],
					$_POST['txtname'],
					$_POST['mobile'],
					$_POST['admin_site'],
					$_POST['message']
					);
				http_response_code(200);
				exit;
			}
		default:
			http_response_code(410);
			exit;
		break;
	}

?>