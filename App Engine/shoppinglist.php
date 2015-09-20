<?php
session_start();

class ShoppingList{

	private $_csvFile;
	private $_arrStoreTotalInfo = array();
	private $_arrFinalDisplay = array();
	// private array(
	// 	"strStoreName" => array("strStoreName"=>,"strLocation"=>"put location here","totalPrice"=>"put price variable here"),
	// 	);

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
							SET strItemName = '". $row[1]."'";
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
			if($row[1]){
				$strSQL = "INSERT INTO dbShoppingList.tblShoppingList
							SET strStoreName = '". $row[0] ."',
								intItemID = (SELECT intItemID FROM dbShoppingList.tblItems WHERE strItemName = '". $row[1] ."'),
								strLocation = '". $row[2] ."',
								douPrice = '". $row[3]."',
								strSymbol = '". $row[4]."'";
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

	private function SelectStoreName(){
		$this->SQLConnect();
		$strSQL = "SELECT strStoreName
					FROM dbShoppingList.tblShoppingList
					GROUP BY strStoreName";
		$result = mysql_query($strSQL);
		$arrResult = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $arrResult[] = $row;
		}
		return $arrResult;
	}

	function setStoreTotals($arrList = null){
		$this->SQLConnect();
		//var_dump($arrList);
		//$test = print_r($arrList);
		//error_log($arrList);
		$arrList = str_replace('"',"'",$arrList);
		$arrList = str_replace('[',"(",$arrList);
		$arrList = str_replace(']',")",$arrList);
		$strSQL = "SELECT strStoreName strItemName, SUM(douPrice) AS doublePrice, strLocation, strSymbol
					FROM dbShoppingList.tblShoppingList
					LEFT JOIN dbShoppingList.tblItems
					USING (intItemID) 
					WHERE strItemName IN ". $arrList .
					" GROUP BY strStoreName";		

		error_log($strSQL);			
		$result = mysql_query($strSQL);
		$arrResult = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $arrResult[] = $row;
		}
		error_log($arrResult);	
		$this->_arrStoreTotalInfo = $arrResult;
		return json_encode($this->_arrStoreTotalInfo);
	}

	function InsertStartingInfo(){
		$this->InsertItems();
		$this->InsertShoppingList();
	}

	function setCSV($csvFile){
		$this->_csvFile = $csvFile;
	}

	function setFinalDisplay($strStoreName, $arrFinalList){
		$this->SQLConnect();
		$strSQL = "SELECT strItemName, douPrice, strSymbol
					FROM dbShoppingList.tblShoppingList
					LEFT JOIN dbShoppingList.tblItems
					USING (intItemID) 
					WHERE strItemName IN (". $arrFinalList .")
					AND strStoreName = '".$strStoreName."'";		

		$result = mysql_query($strSQL);
		$arrResult = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $arrResult[] = $row;
		}
		$this->_arrFinalDisplay = $arrResult;	
		return json_encode($this->_arrFinalDisplay);	
	}
}

?>