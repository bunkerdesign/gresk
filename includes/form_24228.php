<?php	
	if (empty($_POST['name_39339_24228']) && strlen($_POST['name_39339_24228']) == 0 || empty($_POST['email_39339_24228']) && strlen($_POST['email_39339_24228']) == 0 || empty($_POST['message_39339_24228']) && strlen($_POST['message_39339_24228']) == 0)
	{
		return false;
	}
	
	$name_39339_24228 = $_POST['name_39339_24228'];
	$email_39339_24228 = $_POST['email_39339_24228'];
	$message_39339_24228 = $_POST['message_39339_24228'];
	
	$to = 'mail@gresk.ru'; // Email submissions are sent to this email

	// Capture
	$secretKey = '6LfivPQZAAAAALHfJeeSObzXAfp0yrt_yekMmTtW';
    $captcha = $_POST['g-recaptcha-response'];

    if (!$captcha)
    {
    	echo 'capture-error';
    	exit;
    }

	// Capture
	$ip = $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

    if (intval($responseKeys["success"]) !== 1)
    {
    	echo 'capture-connection-error';
    	exit;
    }
    else
    {   
    	// Create email	
		$email_subject = "Сообщение с сайта";
		$email_body = "Добрый день! Пришло сообщение с сайта. \n\n".
		"Name_39339_24228: $name_39339_24228 \nEmail_39339_24228: $email_39339_24228 \nMessage_39339_24228: $message_39339_24228 \n";
		$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
		$headers .= "From: mail@gresk.ru\n";
		$headers .= "Reply-To: $email_39339_24228";	
	
		mail($to,$email_subject,$email_body,$headers); // Post message
    }			
?>
