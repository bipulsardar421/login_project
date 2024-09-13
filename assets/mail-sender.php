<?php
include ('smtp/PHPMailerAutoload.php');
require "../db-connection/otp-validation.php";
function prepare_email($email)
{
	$subject_ = "OTP for password reset";
	$msg__ = generateOTP();
	smtp_mailer($email, $subject_, $msg__);
}
function generateOTP()
{
	return rand(100000, 999999);
}
function smtp_mailer($to, $subject, $msg)
{
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "mahanbipul260@gmail.com";
	$mail->Password = "neazpufsuvjzlctk";
	$mail->SetFrom("mahanbipul260@gmail.com");
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => false
		)
	);
	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
	} else {
		header("Location: ../db-connection/otp-validation.php?email=" . urlencode($to) . "&otp=" . urlencode(password_hash($msg, PASSWORD_DEFAULT)));

	}
}
?>