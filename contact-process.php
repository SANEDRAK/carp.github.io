<?php

  $msg = '';
  $msgClass = '';

  if(filter_has_var(INPUT_POST, 'submit')) {
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if(!empty($name) && !empty($email) && !empty($message)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = 'Use a valid E-mail!';
    } else {
      $toEmail = 'zinerguy@gmail.com';
      $subject = 'You got a message From: '.$name;
      $body = '<h2>Conact Request</h2>
      <h4>Name: </h4><p>'.$name.'</p>
      <h4>Email</h4><p>'.$email.'</p>
      <h4>Message</h4><p>'.$message.'</p>';

      $headers = "MIME-Version 1.0". \r\n;
      $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

      $headers .= "From: " .$name."<".$email.">".\r\n;

      if(mail($toEmail, $subject, $body, $headers)) {
        $msg = "Email Sent!";
        $msgClass="Green";
      } else {
        $msg ="Your email was not sent";
        $msgClass="#ec0001";
      }

    }
  } else {
    $msg = 'Please fill in all fields';
  }
}
  ?>
