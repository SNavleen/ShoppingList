<?php
session_start();

class ShoppingList{

	private $_csvFile;

	private function SQLConnect(){
		$Connenct = mysql_connect(
			':/cloudsql/gcp-hackthenorth-3212:shoppinglist',
			//'173.194.106.13:3306',
			'hackthenorth',
			'hackthenorth'
		);	
	}

	private function readCSV(){
		$file_handle = fopen($this->_csvFile, 'r');
		while (!feof($file_handle) ) {
			$line_of_text[] = fgetcsv($file_handle, 1024, ",");
		}
		fclose($file_handle) or die("Can't close the file");
		return $line_of_text;
	}

	private function InsertItems(){
		$csv = $this->readCSV();
		$this->SQLConnect();
		foreach($csv as $row){
			if($row[2]){
				$strSQL = "INSERT INTO dbShoppingList.tblItems 
							SET strItemName = '". $row[2]."'";
				try{
					mysql_query($strSQL);
				}catch(Exception $e){
					print_r($e);
				}			
			}			
		}
	}

	private function InsertShoppingList(){
		$csv = $this->readCSV();
		$this->SQLConnect();
		foreach($csv as $row){
			if($row[2]){
				$strSQL = "INSERT INTO dbShoppingList.tblShoppingList
							SET strStoreName = '". $row[1] ."',
								intItemID = (SELECT intItemID FROM dbShoppingList.tblItems WHERE strItemName = '". $row[2] ."'),
								strLocation = '". $row[3] ."',
								fltPrice = '". $row[4]."'";
				try{
					mysql_query($strSQL);
				}catch(Exception $e){
					print_r($e);
				}		
			}				
		}
	}

	function SelectItems(){
		$this->SQLConnect();
		$strSQL = "SELECT strItemName
					FROM dbShoppingList.tblItems ";		

		$result = mysql_query($strSQL);
		$arrResult = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $arrResult[] = $row["strItemName"];
		}
		return json_encode($arrResult);
	}

	function SelectShoppingList($arrList){
		$this->SQLConnect();
		$strSQL = "SELECT strStoreName, strItemName, fltPrice, strLocation
					FROM dbShoppingList.tblShoppingList
					LEFT JOIN dbShoppingList.tblItems
					USING (intItemID) 
					WHERE strItemName IN (". $arrList .")";		

		$result = mysql_query($strSQL);
		$arrResult = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $arrResult[] = $row;
		}
		return $arrResult;
	}

	function InsertStartingInfo(){
		$this->InsertItems();
		$this->InsertShoppingList();
	}

	function setCSV($csvFile){
		$this->_csvFile = "../CSV/".$csvFile;
	}
}

?>