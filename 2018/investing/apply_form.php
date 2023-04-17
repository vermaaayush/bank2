<?php

$errors = [];
$errorMessage = '';
 function prompt(){
        echo("<script type='text/javascript'> alert('Thanks, your application successfully sent');   window.location.href='https://finanfne.com/'; </script>");
        
          

       
    }

if (!empty($_POST)) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $amount = $_POST['amount'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $ploan = $_POST['ploan'];
    $company = $_POST['company'];
    $dig = $_POST['dig'];
    $wphone = $_POST['wphone'];
    $mservice = $_POST['mservice'];

    $IDME = $_POST['IDME'];
    $incomet = $_POST['incomet'];
    $yincome = $_POST['yincome'];
    $owner = $_POST['owner'];

   

    if (empty($f_name)) {
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

        $bodyParagraphs = ["First Name: {$f_name}<br>","Last Name: {$l_name}<br>","Requested Amount:{$amount}<br>", "Email:{$email}<br>", "Home Phone:{$phone}<br>", "Date of Birth:{$dob}<br>", "Address:{$address}<br>", "Zip Code:{$zipcode}<br>", "City:{$city}<br>", "State:{$state}<br>", "Purpose of Loan:{$ploan}<br>", "Company Name:{$company}<br>", "Designation:{$dig}<br>", "Work Phone:{$wphone}<br>", "Are You in Active Military Serive?  (yes/no):{$mservice}<br>", "Incorporation Duration \ Months Employed:{$IDME}<br>", "Income Type:{$incomet}<br>", "Net yearly income:{$yincome}<br>", "Are You a Homeowner (yes/no):{$owner}<br>"] ;
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