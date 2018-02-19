<?php
	header('Content-type: text/plain; charset=utf-8');
	mb_internal_encoding("UTF-8");
	require_once('phpmailer/PHPMailerAutoload.php');
	$mail = new PHPMailer(true);
	$mail->CharSet = 'utf-8';
	
	function VerifyCaptcha() {
		$secret_key = "6LfT2EMUAAAAAHkiwohUVkCK3Q4360kSCm1BpDEW";
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => $secret_key,
			'response' => $_POST["g-recaptcha-response"]
		);
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$verify = @file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		
		return $captcha_success->success == 1;
	}
	
    if(!VerifyCaptcha()) {
        die("Captcha error");
    }
	
	if ($_POST) {
		$name = htmlentities($_POST['Name']);
		$email = htmlentities($_POST['Email']);
		$phone = htmlentities($_POST['Phone']);
		$message = htmlentities($_POST['Message']);
		// $name = urldecode($name);
		// $email = urldecode($email);
		// $phone = urldecode($phone);
		// $message = urldecode($message);
		$name = trim($name);
		$email = trim($email);
		$phone = trim($phone);
		$text = trim($message);
		$name = iconv(mb_detect_encoding($name, mb_detect_order(), true), "UTF-8", $name);
		$email = iconv(mb_detect_encoding($email, mb_detect_order(), true), "UTF-8", $email);
		$phone = iconv(mb_detect_encoding($phone, mb_detect_order(), true), "UTF-8", $phone);
		$text = iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.mail.ru';  						  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		
		if ($_POST['from'] == 'contact1')
		{
			$mail->Username = 'serezha-sergey-20192@mail.ru'; // Âàø ëîãèí îò ïî÷òû ñ êîòîðîé áóäóò îòïðàâëÿòüñÿ ïèñüìà
			$mail->Password = '$asjdhAG821!'; // Âàø ïàðîëü îò ïî÷òû ñ êîòîðîé áóäóò îòïðàâëÿòüñÿ ïèñüìà
		}
		if ($_POST['from'] == 'contact2')
		{
			$mail->Username = 'serezha-sergey-20192@mail.ru'; // Âàø ëîãèí îò ïî÷òû ñ êîòîðîé áóäóò îòïðàâëÿòüñÿ ïèñüìà
			$mail->Password = '$asjdhAG821!'; // Âàø ïàðîëü îò ïî÷òû ñ êîòîðîé áóäóò îòïðàâëÿòüñÿ ïèñüìà
		}
		
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465; // TCP port to connect to / ýòîò ïîðò ìîæåò îòëè÷àòüñÿ ó äðóãèõ ïðîâàéäåðîâ
		$mail->setFrom('serezha-sergey-20192@mail.ru'); // îò êîãî áóäåò óõîäèòü ïèñüìî?
		$mail->addAddress('serezha-sergey-20192@mail.ru');     // Êîìó áóäåò óõîäèòü ïèñüìî

		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'From site';
		$mail->Body    = '' .$name .'<br>'. ' Phone: ' .$phone.'<br>'. 'Email: ' .$email.'<br>'."Message: ".$text;
		$mail->AltBody = '';
        
        try {
            if(!$mail->send()) {
				$data = ['ans' => 'error'];
            } else {
				$data = ['ans' => 'Ok'];
            }
			header('Content-Type: application/json');
			echo json_encode($data);
        } catch (Exception $ex) {
			$data = ['ans' => 'exception', 'message' => $ex->getMessage()];
            header('Content-Type: application/json');
			echo json_encode($data);
        }
	}
?>