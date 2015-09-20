<?php
//http://gcp-hackthenorth-3212.appspot.com/

session_start();

include_once("shoppinglist.php");

$ShoppingList = new ShoppingList();	

if($_GET["import"] == true){
	$ShoppingList->setCSV('food.csv');	
	$ShoppingList->InsertStartingInfo();
}

if($_GET["item"] == true){
	echo ($ShoppingList->SelectItems());
}else if($_GET["list"] == true){
	echo $ShoppingList->getStoreTotals();
}else if($_GET["final"]){
	echo $ShoppingList->getFinalDisplay();
}else if($_POST["list"]){
	$ShoppingList->setStoreTotals(json_decode($_POST["list"]));
}else if($_POST["store"] && $_POST["finallist"]){
	$ShoppingList->setFinalDisplay(json_decode($_POST["store"]), json_decode($_POST["finallist"]));

}


?>