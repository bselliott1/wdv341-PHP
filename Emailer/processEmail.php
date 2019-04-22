<?php
  include("Emailer.php");

  $testEmail = new emailer();

  $testEmail->setSenderAddress("bselliott1197@gmail.com");
  $testEmail->setSendToAddress("bselliott@dmacc.edu");
  $testEmail->setSubjectLine("WDV341 Email Processor");
  $testEmail->setMessageBody("This hopefully sends!");
  echo $testEmail->sendEmail();

  $clientEmail = new emailer();

  $clientEmail->setSenderAddress("bselliott1197@gmail.com");
  $clientEmail->setSendToAddress("bselliott@dmacc.edu");
  $clientEmail->setSubjectLine("WDV341 Email Processor");
  $clientEmail->setMessageBody("This hopefully sends!");
  echo $clientEmail->sendEmail();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Test Eamil</title>
  </head>
  <body>
    <p>Sender:<?php echo $testEmail->getSenderAddress(); ?></p>
    <p>To:<?php echo $testEmail->getSendToAddress(); ?></p>
    <p>Subject:<?php echo $testEmail->getSubjectLine(); ?></p>
    <p>Message:<?php echo $testEmail->getMessageBody(); ?></p>
  </body>
</html>