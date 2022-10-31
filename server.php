<?php

require 'PHPMailerAutoload.php'; 
$mail = new PHPMailer(true);

try{

    $mail->SMTPDebug=10;
    $mail->isSMTP();
    $mail->Mailer="smtp";
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username="gabi17melara@gmail.com";
    $mail->Password="****";   //fungerar när jag har min riktiga lösenord 
    $mail->SMTPSecure="ssl";
    $mail->Port=465;
    
    $mail->setFrom("gabi17melara@gmail.com");
    $mail->addAddress("gabi17melara@gmail.com");

    
    $mail->Subject =$_POST['subject'];
    $mail->Body= "Name: ".$_POST['name']."\n\n"."Email: ".$_POST['email']."\n\nMessage: ".$_POST['message']."\n\nSpecial offers checkbox: ".$_POST['answer']."\n\nChispita Customer"; //time() funkade ish
  
    $mail->send();
    echo "Email successfully sent! You will recieve an answer within 48 hours! Thank you for contacting us!";  
  


}
catch(Exception $e){
    echo $e; 
}





?>