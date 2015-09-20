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
}else if($_POST["list"]){
	echo $ShoppingList->setStoreTotals($_POST["list"]);
}else if($_POST["store"] && $_POST["finallist"]){
	echo $ShoppingList->setFinalDisplay(json_decode($_POST["store"]), json_decode($_POST["finallist"]));

}


?>