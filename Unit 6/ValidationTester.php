<?php

include("Validation.php");

$formValidation = new Validations();


?>
<html>
<body>

<p>Cannot be empty</p>
<p>0 <?php echo $formValidation->cannotBeEmpty(0); ?></p>
<p>"" <?php echo $formValidation->cannotBeEmpty(""); ?></p>
<p>0.0 <?php echo $formValidation->cannotBeEmpty(0.0); ?></p>
<p>"   " <?php echo $formValidation->cannotBeEmpty("   "); ?></p>

<p>dmacc <?php if ($formValidation->cannotBeEmpty("dmacc")){
	echo "true";
}
else
{
	echo "false";
}
?></p>

<p>null <?php if($formValidation->cannotBeEmpty(null)){
	echo "true";
}
else
{
	echo "false";
}
?></p>

<p>Email Validation:</p>
<p>brian.elliott@dmacc.edu <?php if($formValidation->validateEmail("brian.elliott@dmacc.edu")){
	echo "valid";
	}else{
		echo "Invalid";
	}
?></p>

<p>Phone Validation:</p>
      <p>515-449-4899 <?php if($formValidation->validatePhone("515-449-4899")) {
          echo "Valid";
        } else {
          echo "Invalid";
        }?></p>

<p>Name:</p>
  <p>Brian&^445 <?php $inName = ($formValidation->validateName("Brian&^445"));
     echo "output = ". $inName ?></p>

<p>Specail Box:</p>
	<p>This is #######! meant $@@ to be trimmed to only numeric values 546 and character&^^s. <?php $inSpecial = ($formValidation->validateSpecial("This is #######! meant $@@ to be trimmed to only numeric values 546 and character&^^s."));
		echo "output = " . $inSpecial ?></p>

</body>
</html>