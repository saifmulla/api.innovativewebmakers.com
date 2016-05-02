<?php
	
	include_once(ROOT_DIR.'/libs/PHPMailer/PHPMailerAutoload.php');

	function sendMail(
		$admin_email,
		$admin_name,
		$client_email,
		$client_name,
		$phone,
		$admin_site,
		$message
		)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		// $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// $mail->Username = 'user@example.com';                 // SMTP username
		// $mail->Password = 'secret';                           // SMTP password
		// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom("noreply@".$admin_site, "Enquiry");
		$mail->addAddress($admin_email, ucwords($admin_name));     // Add a recipient
		// $mail->addBCC($admin_email,"Admin");
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = "Enquiry from ".$admin_site;
		$body = "<p>Name: <b>".$client_name."</b><br>";
		$body .= "Email: <a href=\"mailto:".$client_email."\">".$client_email."</a><br>";
		$body .= "Mobile: ".$phone."<br>";
		$body .= "Message: <br>".$message."</p>";
		$mail->Body    = $body;

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			echo "<h2>Thank you for your interest we will in touch as soon as possible</h2>";
		}
	}
?>