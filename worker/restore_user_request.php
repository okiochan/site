<?php
require_once __DIR__ . '/../php/include.php';
require_once('/../phpmailer/PHPMailerAutoload.php');

$recieved_login = $_POST['login'];

function sendText($email, $text) {

    $email = trim($email);
    $text = trim($text);
    $email = iconv(mb_detect_encoding($email, mb_detect_order(), true), "UTF-8", $email);
    $text = iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
    
    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';  						  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    
    $mail->Username = 'serezha-sergey-20192@mail.ru';
    $mail->Password = '$asjdhAG821!';
    
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to 
    $mail->setFrom('serezha-sergey-20192@mail.ru');
    $mail->addAddress($email);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'restore pass';
    $mail->Body    = "Message: ".$text;
    $mail->AltBody = '';
    
     try {
        if(!$mail->send()) {
          return false;
        } return true;
    } catch (Exception $ex) {
       return false;
    }
}

function restoreUser($username) {  

    $user = null;
    if( DB::dbCheckUserExist($username) ) {
        $user = $username;
    } else if( DB::dbCheckEmailExist($username) ) {
        $user = DB::dbGetUsernameByEmail($username);
    } else if( $user == null ) {
        echo('userNotFound');
        return;
    } else { 
        echo ('error');
        return;
    }
    
    $salt = DB::dbGenerateSalt();
    $email = DB::dbGetEmailByUsername($user);
    
    DBrestore::dbAddRequest($user,$salt);
    
    $link = "http://localhost/GIT/enter_new_pass.php"."?username=".$user."&salt=".$salt;
    $text = "to restore pass follow this link ".$link;
    
    $ret = sendText($email,$text);
    if($ret == false) {
        echo('error in sending text');
        return;
    }
    
    echo ('success');
}

restoreUser($recieved_login);
 