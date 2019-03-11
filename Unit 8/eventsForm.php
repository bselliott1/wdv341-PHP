<html>
<h1>WDV341 Intro PHP</h1>
<h2>Unit-8 SQL Insert</h2>
</html>
<?php
  include("connectPDO.php");
  include("eventValidations.php");
  $eventValidations = new eventValidations();
  $event_name = "";
  $presenter = "";
  $eventDate = "";
  $eventTime = "";
  $SpecialRequest = "";
  $Age = ""; 
  
  $event_name_error = "";
  $presenter_error = "";
  $eventDate_error = "";
  $SpecialRequest_error = "";
  $eventTime_error = "";

  if(isset($_POST['submit'])){
    
    $event_name = $_POST["event_name"];
    $presenter = $_POST["presenter"];
    $eventDate = $_POST["eventDate"];
    $eventTime = $_POST["eventTime"];
    $SpecialRequest = $_POST["SpecialRequest"];
    
    if(!($eventValidations->validate_eventName($event_name))){
      $event_name_error = "Please enter a name for the event";
    }
    
    if(!($eventValidations->validate_presenter($presenter))){
      $presenter_error = "Please enter who is to be presting at this event";
    }
    
    if(!($eventValidations->validateEventDate($eventDate))){
      $eventDate_error = "Please enter a valid event date";
    }
    
    if(!($eventValidations->validateSpecial($SpecialRequest))){
      $SpecialRequest_error = "Please give a description of the event to be held";
    }
    if (!($eventValidations->validateEventTime($eventTime))){
      $eventTime_error = "Please enter a valid time for event to be held and if it is in the morning or afternoon";
    }

    if ($eventValidations->validate_eventName($event_name) && $eventValidations->validate_presenter($presenter) && $eventValidations->validateeventDate($eventDate) && $eventValidations->validateSpecial($SpecialRequest) && $eventValidations->validateEventTime($eventTime)){
             $sql = "INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date, event_time) VALUES ('$event_name', '$SpecialRequest', '$presenter', '$eventDate', '$eventTime')";
      if ($conn->query($sql) == True) {
      echo "<h1>Form has been submitted!</h1>";
    }
  }
  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>
#orderArea  {
  width:600px;
  border:thin solid black;
  margin: auto auto;
  padding-left: 20px;
}
#orderArea h3 {
  text-align:center;  
}
.error  {
  color:red;
  font-style:italic;  
}
.honeypot{
  display:hidden;
}
</style>

</head>

<body>

<p>&nbsp;</p>


<div id="orderArea">
<form name="form3" method="post" action="">
  <h3>Event Registration Form</h3>

      <p>
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" id="event_name" value="<?php echo $event_name ?>">
    <span class="error" id="errorName"><?php echo $event_name_error; ?></span>
      </p>
      <p>
        <label for="presenter">Event Presenter:</label>
        <input type="text" name="presenter" id="presenter" value="<?php echo $presenter ?>">
    <span class="error" id="presenter_error"><?php echo $presenter_error; ?></span>
      </p>
      <p>
        <label for="eventDate">Event Date:</label>
        <input type="Date" name="eventDate" id="eventDate" value="<?php echo $eventDate; ?>"><label class="errorMessage"> 
          <span class="error" id="eventDate_error"><?php echo "$eventDate_error"; ?></label>
      </p>
      <p>
        <label for="eventTime">Event Time:</label>
        <input type="Time" name="eventTime" id="eventTime" value="<?php echo $eventTime; ?>"><label class="errorMessage"> 
          <span class="error" id="eventTime_error"><?php echo "$eventTime_error"; ?></label>
      </p>
      <p>
        <label for="SpecialRequest">Description of event to take place: (Limit 200 characters)<br>
        <span class="error" id="errorSpecialRequest"><?php echo $SpecialRequest_error; ?></span><br>
        </label>
        <textarea cols="40" rows="5" name="SpecialRequest"><?php echo $SpecialRequest; ?></textarea>
      </p>
   
    <p class="honeypot" style="visibility: hidden;">
        <label for="Age">Age</label>
        <input type="text" name="Age" id="Age" value="<?php echo $Age ?>">
      </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="reset" name="Reset" id="button4" value="Reset">
  </p>
</form>
</div>

</body>
</html>