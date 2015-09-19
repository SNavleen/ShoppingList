<?php
session_start();

include_once("shoppinglist.php");

$ShoppingList = new ShoppingList();	

if($_GET["import"] == true && $_POST["file"]){
	$ShoppingList->setCSV($_POST["file"]);	
	$ShoppingList->InsertStartingInfo();
}else if($_GET["item"] == true){
	$ShoppingList->SelectItems();
}else if($_GET["list"] == true && $_POST["list"]){
	$ShoppingList->SelectShoppingList(json_decode($_POST["list"]));
}
?>