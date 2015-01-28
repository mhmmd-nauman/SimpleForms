<?php
/******* get company name **********/
	function getCompanyName() {
		$sql = "SELECT page_name FROM se_bizconnect_page WHERE page_id = ".$_SESSION['page_id'].""; 
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		return $row['page_name'];
	}
	
	/** Extract Week start and end date */
	function getWeeks($date) {
	
		$start = strtotime($date);
		$end =  strtotime(date("Y-m-t", strtotime($date)));
		$arr = array();
		while ($start <= $end) {
			$d = getdate($start);
			$dayOfWeek = $d['wday'];
			$endDate = date('Y-m-d', strtotime(date("Y-m-d",$start) . " + " . (6 - $dayOfWeek) . " days"));
			if(date("m", strtotime($endDate)) != date("m", strtotime($date))) {
				$endDate = date("Y-m-t", strtotime($date));
			}
			$arr[] = array(date("Y-m-d",$start), $endDate);
			$start = strtotime($endDate) + (60*60*24);
			
		
		}
		return $arr;
	}
	// Fectch Current Week #
	function getCurrentWeek($date, $currentDate) {
		
		$start = strtotime($date);
		$end =  strtotime(date("Y-m-t", strtotime($date)));
		$c =1;
		while ($start <= $end) {
			$d = getdate($start);
			$dayOfWeek = $d['wday'];
			$endDate = date('Y-m-d', strtotime(date("Y-m-d",$start) . " + " . (6 - $dayOfWeek) . " days"));
			$start = strtotime($endDate) + (60*60*24);
			if($endDate >= $currentDate)
			{
				return $c;
			}
			$c++;	
		}
	}
	
	function isMasterPage($id) {
		$sql = "SELECT is_master_page from se_bizconnect_page WHERE page_id = '$id'"; // replace 1 = 1 with registration_page_id = x 
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		return $row[0];
	}
	function getChildPages($id) {
		$sql = "SELECT * from se_bizconnect_page WHERE master_page_id = '$id'"; // replace 1 = 1 with registration_page_id = x
		$result = mysql_query($sql);
		
		return $result;
	}
?>