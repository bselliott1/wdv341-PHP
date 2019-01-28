<!doctype html>
<html>
	<body>

	<?php

		function MonthDayYear($date)
		{
			$date = strtotime($date);
			$date = date("m/d/y", $date);
			echo $date;
		}	

		function DayMonthYear($date)
		{
			$date = strtotime($date);
			$date = date("d/m/y", $date);
			echo $date;
		}

		function stringInput($strIn)
		{
			$charCount = strlen($strIn);
			$strInTrim = trim($strIn);
			$strInLower = strtolower($strIn);

			echo("charaters in string:  $charCount<br>");
			echo("Trimmed string:  $strInTrim<br>");
			echo("String all lower case:  $strInLower<br>");

			if(strpos($strInLower, 'dmacc') == true)
			{
				echo("String contains DMACC");
			}
			else
			{
				echo("String does NOT contain DMACC");
			}
		}

		function formatNumber($num)
		{
			echo(number_format($num));
		}

		function formatNumberCurrency($num)
		{
			$currency = number_format($num, 2, ".", ",");
			echo ("$".$currency);
		}
	?>

	<h1>PHP Functions</h1>

	<h1>Month Day Year</h1>
	<p><?php MonthDayYear("January 27 2019");?></p>

	<h1>Day Month Year</h1>
	<p><?php DayMonthYear("January 27 2019");?></p>

	<h1>String</h1>
	<p><?php stringInput("    The word DMACC is in this string   ");?></p>
	<p><?php stringInput("   The     key word is not      in this string");?></p>

	<h1>Formatted Number</h1>
	<p><?php formatNumber(1234567890);?></p>

	<h1>Number in Currency</h1>
	<p><?php formatNumberCurrency(123456);?></p>

	</body>
</html>