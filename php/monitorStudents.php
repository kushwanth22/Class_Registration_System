
<?php	


include(dirname(__FILE__)."/../connection.php");
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$selClass = $request ->selClass;

	$stuList=array();

	if($selClass !=""){
		$sqlStu = "SELECT DISTINCT s.sName, s.sId FROM student s, grades g, class c, subjects sb
			WHERE g.sId = s.sId
			AND g.cId = c.cId
			AND g.sbId = sb.sbId
			AND c.cId =  '".$selClass."'";
		$resultStu = $conn->query($sqlStu);
		if ($resultStu->num_rows > 0) {
    	// output data of each row
	    	while($rowStu = $resultStu->fetch_assoc()) {
	    		$stuList[] = $rowStu;	        	 
	    	}
		} else {
    		echo "0 results";
		}

		echo json_encode($stuList);
	}



?>