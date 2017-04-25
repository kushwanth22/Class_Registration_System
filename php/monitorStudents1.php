<?php
include(dirname(__FILE__)."/../connection.php");
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$monStudent = $request ->monStudent;
	$stuDetails;
	$classIs = $monStudent->class;
	$studentIs = $monStudent->student;
	


	if($monStudent != ''){
		
		$sqlStuData ="SELECT DISTINCT s.sName,s.sContact,s.sEmail, c.cName, sb.sbName, g.gGrades 	
			FROM student s, grades g, class c, subjects sb
			WHERE g.sId = s.sId
			AND g.cId = c.cId
			AND g.sbId = sb.sbId
			AND c.cId =  '".$classIs."'
			AND s.sId =  '".$studentIs."'";
			$resultStuData = $conn->query($sqlStuData);
			if ($resultStuData->num_rows > 0) {
	    	// output data of each row
		    	while($rowStuData = $resultStuData->fetch_assoc()) {
		    		$stuDetails[] = $rowStuData;
		        	
		    	}
			} else {
	    		echo "0 results";
			}


//echo "<script>console.log( 'Debug Objects: ".print_r($stuDetails)."' );</script>";
			echo json_encode($stuDetails);

	}


?>