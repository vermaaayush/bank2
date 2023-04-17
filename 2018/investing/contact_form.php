<?php

$errors = [];
$errorMessage = '';
 function prompt(){
        echo("<script type='text/javascript'> alert('Thanks, your application successfully sent');   window.location.href='https://finanfne.com/'; </script>");
        
          

       
    }

if (!empty($_POST)) {
    $name = $_POST['fname'];
    $phone = $_POST['phone'];
    $subject = $_POST['subjects'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    

   

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

   
    if (empty($errors)) {
        $toEmail = 'info@finanfne.com';
        $emailSubject = 'New email from your application form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["First Name: {$name}<br>","Email: {$email}<br>","Phone:{$phone}<br>", "Subject:{$subject}<br>", "Message:{$message}<br>"] ;
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
           prompt();
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>