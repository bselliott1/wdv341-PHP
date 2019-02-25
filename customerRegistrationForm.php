<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>
#orderArea	{
	width:600px;
	border:thin solid black;
	margin: auto auto;
	padding-left: 20px;
}
#orderArea h3	{
	text-align:center;	
}
.error	{
	color:red;
	font-style:italic;	
}
.honeypot{
	display:hidden;
}
</style>

<?php
	$Name = "";
	$PhoneNumber = "";
	$Email = "";
	$Registration = "";
	$badge = "";
	$meal = "";
	$SpecialRequest = "";
	$Age = ""; 
	
	$name_error = "";
	$PhoneNumber_error = "";
	$email_error = "";
	$SpecialRequest_error = "";

	if(isset($_POST['submit'])){
		
		echo "<h1>Form has been submitted!</h1>";
		
		$Name = $_POST["Name"];
		$PhoneNumber = $_POST["PhoneNumber"];
		$Email = $_POST["Email"];
		$Registration = $_POST["Registration"];
		$badge = $_POST["badge"];
		$meal = $_POST["meal"];
		$SpecialRequest = $_POST["SpecialRequest"];
		
		if(empty($Name)){
			$name_error = "Please enter name";
		}
		
		if(empty($PhoneNumber)){
			$PhoneNumber_error = "Please enter a phone number";
		}
		
		if(empty($Email)){
			$email_error = "Please enter email";
		}
		
		if(empty($SpecialRequest)){
			$SpecialRequest_error = "Please type 'No Request' if you do not have a special request.";
		}
	}
?>

</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Unit-5 and Unit-6 Self Posting - Form Validation Assignment


</h2>
<p>&nbsp;</p>


<div id="orderArea">
<form name="form3" method="post" action="">
  <h3>Customer Registration Form</h3>

      <p>
        <label for="Name">Name:</label>
        <input type="text" name="Name" id="Name" value="<?php echo $Name ?>">
		<span class="error" id="errorName"><?php echo $name_error; ?></span>
      </p>
      <p>
        <label for="PhoneNumber">Phone Number:</label>
        <input type="text" name="PhoneNumber" id="PhoneNumber" value="<?php echo $PhoneNumber ?>">
		<span class="error" id="PhoneNumber_error"><?php echo $PhoneNumber_error; ?></span>
      </p>
      <p>
        <label for="Email">Email Address: </label>
        <input type="text" name="Email" id="Email" value="<?php echo $Email ?>">
		<span class="error" id="errorEmail"><?php echo $email_error; ?></span>
      </p>
      <p>
        <label for="Registration">Registration: </label>
        <select name="Registration" id="Registration">
          <option value="">Choose Type</option>
          <option value="attendee" <?php if (isset($Registration) && $Registration =="attendee") echo "selected"?>>Attendee</option>
          <option value="presenter"<?php if (isset($Registration) && $Registration =="presenter") echo "selected"?>>Presenter</option>
          <option value="volunteer" <?php if (isset($Registration) && $Registration =="volunteer") echo "selected"?>>Volunteer</option>
          <option value="guest" <?php if (isset($Registration) && $Registration =="guest") echo "selected"?>>Guest</option>
        </select>
      </p>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="badge" <?php if (isset($badge) && $badge=="clip") echo "checked"?> id="clip" value="clip">
        <label for="clip">Clip</label> <br>
        <input type="radio" name="badge" <?php if (isset($badge) && $badge=="lanyard") echo "checked"?> id="lanyard" value="lanyard">
        <label for="lanyard">Lanyard</label> <br>
        <input type="radio" name="badge" <?php if (isset($badge) && $badge=="magnet") echo "checked"?> id="magnet" value="magnet">
        <label for="magnet">Magnet</label>
      </p>
      <p>Provided Meals (Select all that apply):</p>
      <p>
        <input type="checkbox" name="meal" <?php if (isset($meal) && $meal=="friday") echo "checked" ?> id="friday" value="friday">
        <label for="friday">Friday Dinner</label><br>
        <input type="checkbox" name="meal" <?php if (isset($meal) && $meal=="saturday") echo "checked" ?> id="saturday" value="saturday">
        <label for="saturday">Saturday Lunch</label><br>
        <input type="checkbox" name="meal" <?php if (isset($meal) && $meal=="sunday") echo "checked" ?>id="sunday" value="sunday">
        <label for="sunday">Sunday Award Brunch</label>
      </p>
      <p>
        <label for="SpecialRequest">Special SpecialRequests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea cols="40" rows="5" name="SpecialRequest"><?php echo $SpecialRequest; ?></textarea>
		<span class="error" id="errorSpecialRequest"><?php echo $SpecialRequest_error; ?></span>
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