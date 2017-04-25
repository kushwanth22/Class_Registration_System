<?php  
error_reporting(E_ALL & ~E_NOTICE); 
 //load_country.php  
include(dirname(__FILE__)."/../connection.php");
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		  
		$postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $stuData1 = $request ->stuData;
	    
	    $stuData2 = $request ->data1;    
	    $stuData3  = $request ->marks;
	    $counter = count($stuData3);
	    
	    //$student =  $stuData2->student;
	    //print_r($stuData3[0]->value); 
	    //echo $stuData3.

//echo "<script type='text/javascript'>alert('".$stuData1->name."','".$stuData2->class."','".$stuData2->student."' );</script>";
	    if($stuData1 != ''){
		    $sql = "INSERT INTO student (sName,sContact,sEmail)
			VALUES ('".$stuData1->name."','".$stuData1->contact."','".$stuData1->email."');";

			   	if ($conn->query($sql) === TRUE) {
			   		$recordInserted = "New records created successfully1";
				    echo $recordInserted;
				} else {
				    echo "Error student: " . $sql . "<br>" . $conn->error;
				}
		}
			
		elseif($stuData2 != '' && $stuData3 != ''){
		    for ($i = 0; $i<$counter; $i++) {		    	
    			$sql = "INSERT INTO grades (gGrades,sId,sbId,cId)
				VALUES ('".$stuData3[$i]->value."','".$stuData2->student."','".$stuData3[$i]->sbId."',
						'".$stuData2->class."')";
				$result = $conn->query($sql);				
			} 
			if ($result === TRUE) {
				    echo $counter;
				} else {
				    echo "Error Grades: " . $sql . "<br>" . $conn->error;
				}
		}
	}
 ?>  
