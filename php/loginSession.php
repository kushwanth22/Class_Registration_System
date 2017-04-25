
<?php 
session_start();
	error_reporting(E_ALL & ~E_NOTICE); 
	include(dirname(__FILE__)."/../connection.php");
	
	   	// check username or password from database
	    $postdata = file_get_contents("php://input");
	    $request = json_decode($postdata);
	    $userName = $request->userName;
	    $password = $request->password;
	    $sql = "SELECT * FROM login WHERE userName='".$userName."' && password ='".$password."'";
  //$result = mysqli_query($conn, $sel);

  		$result = $conn->query($sql);
  		//print_r($password);
  		if ($result->num_rows ==1) {
    	// output data of each row
  			
	    	$_SESSION['user'] = $userName;
	    	//echo $_SESSION['user'];

			
		} else {
           
			$_SESSION['user'] = 'failed';
    		//echo $_SESSION['user'];
             // remove all session variables
            session_unset(); 

            // destroy the session 
            session_destroy(); 
		}
		//header('Content-Type: application/json');
		echo $_SESSION['user'];

?>