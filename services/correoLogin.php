<?php

require_once('class.phpmailer.php');
require_once('class.smtp.php');


//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded



 

$mail = new PHPMailer();


 

$body = "
<img src='http://themagazine.us/images/logo.png' style: 'width: 50%;'><br>

<p>Welcome to <a href='http://www.themagazine.us'>The Magazine</a></p>

<p>¡Congratulations! Now you are part of the community of <a href='http://www.themagazine.us'>The Magazine</a> as a registered user.</p>

<p>Your user information is:</p>

<p>- <b>User:</b> ".$_GET['user']."<br>- <b>Password:</b> ".$_GET['pass']."</p>

<p>Contact us through contact@themagazine.us in case of doubts or suggestions.</p>
 ";


$mail->IsSMTP(); // telling the class to use SMTP

//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)

// 1 = errors and messages

// 2 = messages only

//$mail->SMTPAuth   = true;  // enable SMTP authentication

//$mail->SMTPSecure = 'ssl';
  
  /*       
$mail->SMTPAuth = true;

$mail->SMTPSecure = "ssl";

$mail->Host = "secureus26.sgcpanel.com";

$mail->Port = 465;

$mail->From = "web@themagazine.us";

$mail->Username = "web@themagazine.us";

$mail->Password = "ludico1122";

*/

	$mail->SMTPSecure = false;
	$mail->SMTPAutoTLS = false;

	//$mail2->SMTPSecure = "ssl";                 // sets the prefix to the servier

	$mail->Host       = "mail.themagazine.us";      // sets GMAIL as the SMTP server
 
	$mail->Port       = 26;                  // set the SMTP port for the GMAIL server

	//$mail2->Port       = 143;

	$mail->Username   = "web@themagazine.us";  // GMAIL username

	$mail->Password   = "Ludico1122";            // GMAIL password

$mail->FromName = "Welcome to The Magazine!"; 

$mail->Subject    = "Welcome to The Magazine!";

$mail->MsgHTML($body);

$mail->IsHTML(true);

$address = $_GET['email'];

$mail->AddAddress($address);

$mail->CharSet = 'UTF-8';


if($mail->Send()) {

	echo '<script type="text/javascript">
window.location.assign("../pages/crearProfesor.php?creado=1");
</script>';


} else {

/*	echo '<script type="text/javascript">
window.location.assign("../myarea.php?enviado=0");
</script>';*/
	
}
?>