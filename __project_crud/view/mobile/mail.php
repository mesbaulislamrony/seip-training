<?php
include_once ('../../vendor/phpmailer/phpmailer/class.phpmailer.php');
include_once ('../../vendor/phpmailer/phpmailer/class.smtp.php');
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$obj = new Mobile();
$alldata = $obj->index();
$trs = "";
$serial = 0;
foreach ($alldata as $value) {
	$serial++;
	$trs.="<tr>";
	$trs.="<td>".$serial."</td>";
	$trs.="<td>".$value['id']."</td>";
	$trs.="<td>".$value['title']."</td>";
	$trs.="</tr>";
}
$html = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
<title>::List Of Mobiles::</title>
</head>
<body>
	<h1>List of Mobiles</h1>
	<table border="1" width="320px" align="center" cellspacing="0">
		<thead>
			<tr>
				<th>SR</th>
				<th>ID</th>
				<th>Mobile Name</th>
			</tr>
		</thead>
		<tbody>
			$trs
		</tbody>
	</table>
</body>
</html>
EOD;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'ahsanulhaque805@gmail.com'; // User name here
$mail->Password = '31012005'; // Password here
$mail->setFrom('rony.max24@gmail.com','Mesbaul');
$mail->addReplyTo('rony.max24@gmail.com','Mesbaul'); 
$mail->addAddress('rony.max24@gmail.com','Mesbaul Islam'); // send to
$mail->Subject = 'PHPmailer Gmail SMTP Test';
$mail->Body = $html;
$mail->AltBody = 'Mobile list';

 $output = ''; 
    if(!$mail->Send()){
       $output .= "Mailer Error: ". $mail->ErrorInfo;
    }
    else{
       ob_clean();
       header('Location:index.php');
       exit();
    }
    echo $output;
?>