<?php
require_once '../lib/config.php';
require_once '../lib/mail/PHPMailerAutoload.php';

$c = new \Ss\User\UserCheck();
$email = $_POST['email'];

if(!$c->IsEmailLegal($email)){
	$a['msg'] = "邮箱无效";
}else{
    $email = strtolower($email);
    $vcode=\Ss\Etc\Comm::get_random_char(4);
    $mail = new PHPMailer;
    $mail->CharSet='UTF-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $smtp_server;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $account;                 // SMTP username
    $mail->Password = $user_pass;                           // SMTP password
    $mail->SMTPSecure =$smtp_secure;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $mail_port;                             // TCP port to connect to
    $mail->setFrom($account,$user_name);
    $mail->addAddress($email);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $site_name;
    $mail->Body    = '您的验证码为 <b>'.$vcode.'</b>,欢迎使用!';
    $mail->AltBody = '';
    if($mail->send()){
        $db->insert('vcode',[
        'vcode'=>$vcode
        ]);
        $a['ok']='1';
        $a['msg']='验证码已发送';
    }else{
        $a['msg']=$mail->ErrorInfo;
    }
}

echo json_encode($a);