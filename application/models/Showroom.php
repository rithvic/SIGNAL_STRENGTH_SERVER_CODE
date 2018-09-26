<?php
class Application_Model_Showroom extends Zend_Db_Table_Abstract {

	/****** Network Project **********/
	public function insertNetworkinfo($data){
		
		$db =Zend_Db_Table_Abstract::getDefaultAdapter();

		try {
			$result = $db->insert('Network_details', $data);
   			$lastinsertvalue = $db->lastInsertId('Network_details');
   			$sql = "select * from Network_details where S_id='$lastinsertvalue'";
			$stmt = $db->query($sql); 
         	$finalresult =  $stmt->fetchAll();
			return $finalresult;
		}catch ( Exception $e ) {
			echo $e->getMessage ();
			return false;
		}	
	}
	
	public function toiletUpdateFeedback($deviceID,$screen,$summary,$suggestion,$imagename,$date){
		$db =Zend_Db_Table_Abstract::getDefaultAdapter();
		$sql = "INSERT INTO Feedback (Device_ID, Screen, Summary, Suggestion, Screenshot, Updated_Time) VALUES ('$deviceID', '$screen', '$summary','$suggestion', '$imagename', '$date')";
		$stmt = $db->query($sql);
		
		$sql1 = "SELECT Device_ID, Screen, Summary, Suggestion, Screenshot, Updated_Time FROM Feedback WHERE Device_ID = '$deviceID'";
		$stmt1 = $db->query($sql1);
		$finalresult =  $stmt1->fetchAll();
	   	return $finalresult;
	}
	
	public function getFeedback($deviceID){
	
		$db =Zend_Db_Table_Abstract::getDefaultAdapter();		
		$sql1 = "SELECT Device_ID, Screen, Summary, Suggestion, Screenshot, Updated_Time FROM Feedback WHERE Device_ID = '$deviceID'";
		$stmt1 = $db->query($sql1);
		$finalresult =  $stmt1->fetchAll();
	   	return $finalresult;
	
	}	
	
}	
	
		
?>