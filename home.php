<?php 
	error_reporting(E_ALL & ~E_NOTICE); 
	include "connection.php";

?>

<nav class="navbar navbar-default">
    <div class="container">
		<div class="navbar-header">
		<a class="navbar-brand" href="/">Welcome {{sessionStorage.userName}}</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li><a ng-href="#addStudent"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;
				color:white; background-color:blue; padding: 6px">Add Student</button></a></li>
			<li><a ng-href="#addMarks"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;
				color:white; background-color:blue; padding: 6px">Add Marks</button></a></li>
			<li><a ng-href="#monitor"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;color:white; background-color:blue; padding: 6px">Monitor</button> </a></li>
			<li><a ng-href="#"><button type="button" name="submit" class="btn btn-primary btn-block " style="font-size: 16px;
				color:white; background-color:blue; padding: 6px" ng-click=logout()>Log Out</button></a></li>
		</ul>

    </div>
    	<div>
			<h3>{{record}}</h3>
		</div>
		
</nav>
