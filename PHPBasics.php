<!DOCTYPE html>
<html>
<body>

<h1>PHP Basics</h1>

<?php
$name = "Brian Elliott";
$number1 = "3";
$number2 = "5";
$total = "8";
$array = array("PHP","HTML","Javascript");
$arrlength = count($array);

echo"<h2>$name</h2>";

echo $number1 . "+" . $number2 . "=" . $total;

echo "<br><br>";

for ($x = 0; $x < $arrlength; $x++){
	echo $array[$x];
	echo "<br>";
}
?>

</body>
</html>