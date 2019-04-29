<?php
	
	$productObj = new stdClass();
	
	$productObj->productName = "PHP TextBook";
	$productObj->productPrice = "$129.95";
	$productObj->productPageCount = "327";
	$productObj->productISBN = "13-1234435690";

	$returnObj = json_encode($productObj);

	echo $returnObj;
?>