<?php 
    include 'connectPDO.php';
    
    $stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, event_date, event_time, image_name FROM wdv341_event");
    $stmt->execute();   
?>

<?php 
session_cache_limiter('none');  //This prevents a Chrome error when using the back button to return to this page.
session_start();

$message = "";
$inUsername = "";

  if (isset($_SESSION['validUser']) && $_SESSION['validUser'] == "yes")       //is this already a valid user?
  {
    //User is already signed on.  Skip the rest.
    $message = "Logged into Admin Functions"; //Create greeting for VIEW area   
  }
  else
  {
    if (isset($_POST['submitLogin']) )      //Was this page called from a submitted form?
    {
      $inUsername = $_POST['loginUsername'];  //pull the username from the form
      $inPassword = $_POST['loginPassword'];  //pull the password from the form
      
      include 'connectPDO.php';        //Connect to the database
      $sql = "SELECT event_user_name,event_user_password FROM event_user WHERE event_user_name = :username AND event_user_password = :userpassword";        
      
      $query = $conn->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      
      $query->bindParam(":username",$inUsername); //bind parameters to prepared statement
      $query->bindParam(":userpassword", $inPassword);
      
      $query->execute() or die("<p>Execution </p>" );
      
      $row = $query->fetch(PDO::FETCH_ASSOC);
      
      if ($row != "" )    //If this is a valid user there should be ONE row only
      {
        $_SESSION['validUser'] = "yes";       //this is a valid user so set your SESSION variable
        $_SESSION['userName'] = $row['event_user_name'];
        $message = "Welcome Back! $inUsername";
        //Valid User can do the following things:
      }
      else
      {
        //error in processing login.  Logon Not Found...
        $_SESSION['validUser'] = "no";          
        $message = "Incorrect username or password. Please try again.";
      }     
      
      $query = null;
      $conn = null;
      
    }
    //end if submitted
    else
    {
      //user needs to see form
    }//end else submitted
    
  }//end else valid user
  
//turn off PHP and turn on HTML
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Login and Control Page</title>

</head>

<body>

<h2><?php echo $message?></h2>

<?php
  if (isset($_SESSION['validUser']) && $_SESSION['validUser'] == "yes") //This is a valid user.  Show them the Administrator Page
  {
    
//turn off PHP and turn on HTML
?>

<html>
</html>
<?php
  include("connectPDO.php");
  include("eventValidations.php");
  $eventValidations = new eventValidations();
  $event_name = "";
  $SpecialRequest = "";
  $image_name = "";
  $Age = ""; 
  
  $event_name_error = "";
  $presenter_error = "";
  $SpecialRequest_error = "";

  if(isset($_POST['submit'])){
    
    $event_name = $_POST["event_name"];
    $SpecialRequest = $_POST["SpecialRequest"];
    $image_name = $_POST["image_name"];
    
    if(!($eventValidations->validate_eventName($event_name))){
      $event_name_error = "Numbers only";
    }
    
    if(!($eventValidations->validateSpecial($SpecialRequest))){
      $SpecialRequest_error = "Please give a description of the event to be held";
    }

    if ($eventValidations->validate_eventName($event_name) && $eventValidations->validateSpecial($SpecialRequest)){
             $sql = "INSERT INTO wdv341_event (event_name, event_description, image_name) VALUES ('$event_name', '$SpecialRequest', '$image_name')";
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
  <button style="float: right;" onclick="window.location.href = 'login.php';">Products Page</button>
<form name="form3" method="post" action="">
  
  <h3>New Product Form</h3>

      <p>
        <label for="event_name">Item Number:</label>
        <input type="text" name="event_name" id="event_name" value="<?php echo $event_name ?>">
    <span class="error" id="errorName"><?php echo $event_name_error; ?></span>
      </p>
      <p>
        <label for="SpecialRequest">Item Description: (Limit 200 characters)<br>
        <span class="error" id="errorSpecialRequest"><?php echo $SpecialRequest_error; ?></span><br>
        </label>
        <textarea cols="40" rows="5" name="SpecialRequest"><?php echo $SpecialRequest; ?></textarea>
      </p>
       <p>
        <label for="image">Image Name</label>
        <input type="text" name="image_name" id="image_name" value="<?php echo $image_name ?>">
      </p>
   
    <p class="honeypot" style="visibility: hidden;">
        <label for="Age">Age</label>
        <input type="text" name="Age" id="Age" value="<?php echo $Age ?>">
      </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="reset" name="Reset" id="button4" value="Reset">
    <br />
    <br />
  </p>
</form>

    <form class="file-upload" action="upload-manager.php" method="post" enctype="multipart/form-data">
            <label>Upload File:<label>
            <input type="file" name="photo" id="fileSelect">
            <input type="submit" name="submit" value="Upload">
            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
        </form>
</div>

<?php
  }
  else      //The user needs to log in.  Display the Login Form
  {
?>
      <h2>Please login to the Administrator System</h2>
                <form method="post" name="loginForm" action="login.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
          
                </form>
                
<?php //turn off HTML and turn on PHP
  }//end of checking for a valid user
      
//turn off PHP and begin HTML     
?>

</body>
</html>