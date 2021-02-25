<?php	
	if (empty($_POST['name_39339_30840_33457']) && strlen($_POST['name_39339_30840_33457']) == 0 || empty($_POST['email_39339_30840_33457']) && strlen($_POST['email_39339_30840_33457']) == 0 || empty($_POST['message_39339_30840_33457']) && strlen($_POST['message_39339_30840_33457']) == 0)
	{
		return false;
	}
	
	$name_39339_30840_33457 = $_POST['name_39339_30840_33457'];
	$email_39339_30840_33457 = $_POST['email_39339_30840_33457'];
	$message_39339_30840_33457 = $_POST['message_39339_30840_33457'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

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
		"Name_39339_30840_33457: $name_39339_30840_33457 \nEmail_39339_30840_33457: $email_39339_30840_33457 \nMessage_39339_30840_33457: $message_39339_30840_33457 \n";
		$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
		$headers .= "From: contact@yoursite.com\n";
		$headers .= "Reply-To: $email_39339_30840_33457";	
	
		mail($to,$email_subject,$email_body,$headers); // Post message
    }			
?>
