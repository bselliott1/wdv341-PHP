<?php 
    include 'connectPDO.php';
    
    $stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, event_date, event_time, image_name FROM wdv341_event");
    $stmt->execute();   
?>

<?php 
session_cache_limiter('none');	//This prevents a Chrome error when using the back button to return to this page.
session_start();

$message = "";
$inUsername = "";

	if (isset($_SESSION['validUser']) && $_SESSION['validUser'] == "yes")				//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
		$message = "Logged into Admin Functions";	//Create greeting for VIEW area		
	}
	else
	{
		if (isset($_POST['submitLogin']) )			//Was this page called from a submitted form?
		{
			$inUsername = $_POST['loginUsername'];	//pull the username from the form
			$inPassword = $_POST['loginPassword'];	//pull the password from the form
			
			include 'connectPDO.php';				//Connect to the database
			$sql = "SELECT event_user_name,event_user_password FROM event_user WHERE event_user_name = :username AND event_user_password = :userpassword";				
			
			$query = $conn->prepare($sql) or die("<p>SQL String: $sql</p>");	//prepare the query
			
			$query->bindParam(":username",$inUsername);	//bind parameters to prepared statement
			$query->bindParam(":userpassword", $inPassword);
			
			$query->execute() or die("<p>Execution </p>" );
			
			$row = $query->fetch(PDO::FETCH_ASSOC);
			
			if ($row != "" )		//If this is a valid user there should be ONE row only
			{
				$_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
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

<h2>&nbsp; <?php echo $message?></h2>

<?php
	if (isset($_SESSION['validUser']) && $_SESSION['validUser'] == "yes")	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>
		<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project - Final</title>

    <link rel="stylesheet" href="https://crolek.github.io/WDV-221/libs/Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="https://crolek.github.io/WDV-221/libs/Skeleton-2.0.4/css/skeleton.css">
    <style type="text/css">
        body {
            background: #f7f7f7;
        }

        #final {
            
            margin: auto;
            padding: 10px;
            background: #ffffff;
            border: solid #f2f2f2;
        }

        .single-image {
            height: 100%;
            width: 100%;
        }

        #image-wrapper {
            height: 300px;
            width: 300x;
        }

        .error-box {
            border: red 1px solid;
        }

        .hidden {
            display: none;
        }

        .file-upload{
            text-align: center;
        }

    </style>
</head>
<body>

	<h3 align="center">Shopping Site Admin</h3>

    <div id="final">
        <div style="float: right;"><button onclick="window.location.href = 'eventsForm.php';">Add Product</button>
        &nbsp;
         <button onclick="window.location.href = 'logout.php';">Logout</button> 
        </div>

        <table border='0'>
    <tr>
        <td class="hidden"></td>
        <td>Image</td>
        <td></td>
        <td></td>
        <td>Item #</td>
        <td>Description</td>
        <td></td>         
    
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr>";
        echo "<td class='hidden'>" . 
             $dirname = 'upload/';
             $images = scandir($dirname);
             $ignore = Array(".", "..");
             foreach($images as $curimg){
             if(!in_array($curimg, $ignore)) {
             echo "<td><img class='single-image' src='upload/".$row['image_name']."'></td>";
             };
             } 
 
            echo "<td>" . $row['event_name'] . "</td>";
            echo "<td>" . $row['event_description'] . "</td>";  
            echo "<td>" . $row['event_presenter'] . "</td>";
            echo "<td><a href='update.php?event_id=".$row['event_id']."'><button>Update</button></a></td>";
            echo "<td><a href='deleteEvent.php?event_id=".$row['event_id']."'><button>Delete</button></a></td>";
        echo "</tr>";

    }

    echo "<br>";
    echo "<h1>";
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
    echo "</h1>";
?>
</table>
    
        </div>
        <div id="error-wrapper" class="error-box hidden">
            <p>Make sure the New Image URL is valid.</p>
        </div>


    </div>
</body>
</html>
        					
<?php
	}
	else			//The user needs to log in.  Display the Login Form
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