<?php
  class emailer {
    // Properties
    private $senderAddress;
    private $sendToAddress;
    private $subjectLine;
    private $messageBody;
    
    public function __construct() {
    }
    
    public function getSenderAddress() {
      return $this->senderAddress;
    }
    public function setSenderAddress($inSenderAddress) {
      $this->senderAddress = $inSenderAddress;
    }
    public function getSendToAddress() {
      return $this->sendToAddress;
    }
    public function setSendToAddress($inSendToAddress) {
      $this->sendToAddress = $inSendToAddress;
    }
    public function getMessageBody() {
      return $this->messageBody;
    }
    public function setMessageBody($inMessage) {
      $this->messageBody = $inMessage;
    }
    public function getSubjectLine() {
      return $this->subjectLine;
    }
    public function setSubjectLine($inSubjectLine) {
      $this->subjectLine = $inSubjectLine;
    }
    public function sendEmail() {
      $to = $this->getSendToAddress();
      $subject = $this->getSubjectLine();
      $message = $this->getMessageBody();
      $headers = "From: " . $this->getSenderAddress() . "\r\n";
    
    }
  }
?>