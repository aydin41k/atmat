<?php
class DB {
 public $dbh;

 public function connect($host,$dbName,$userName,$pass)	 {
   if( !isset($this->dbh) ) {
		   try {
		     $this->dbh = new PDO("mysql:host=$host;dbname=$dbName",$userName,$pass);
		     $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		     }
		   catch(PDOException $e) {
		     die($e->getMessage());
		   }
	 } 
 }
 
 public function insertRow($tableName,$colName, $colData) {
   $cols = implode(", ",$colName);
   $data = implode("', '",$colData);
   $sth = $this->dbh->prepare("INSERT INTO $tableName (".$cols.") VALUES ('".$data."')");
		   if( $sth->execute() ) {
       return TRUE;		   
		   } else { echo 'Failure in feeding table <strong>'.$tableName.'</strong>.'; }
   }

 public function dbQuery($tableName,$condition=NULL) {
   $result = array();
   $condition = (isset($condition)) ? 'WHERE '.$condition : '';
   foreach( $this->dbh->query("SELECT * FROM $tableName $condition") as $row ) {
       array_push($result,$row);
     }
   return $result;  
 }

 public function update($tableName,$colName,$value,$condition) {
   $params = '';
   if( count($colName) != count($value) || empty($colName) ) {
     die('Number of columns does not match the number of inserted values or no parameters were supplied.'); 
   }

   $sth = $this->dbh->prepare("UPDATE $tableName SET $colName = '$value' WHERE $condition");
   if( $sth->execute() ) {
     return;
   } else { echo 'Error occured.<br />'; }
 }
 
 public function removeRow($tableName, $condition) {
  $sth = $this->dbh->prepare("DELETE FROM ".$tableName." WHERE ".$condition);
    if( $sth->execute() ) {
      return TRUE;
    } else { echo 'Row not removed. Please check your enquiry.'; }
 }
}
?>