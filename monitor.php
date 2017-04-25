<?php 
	error_reporting(E_ALL & ~E_NOTICE); 
	include "connection.php";
?>

<nav class="navbar navbar-default">
    <div class="container">
		<div class="navbar-header">
		<a class="navbar-brand" href="/">Welcome Mahesh</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li><a ng-href="#addStudent"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;
				color:white; background-color:blue; padding: 6px">Add Student</button></a></li>
			<li><a ng-href="#addMarks"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;
				color:white; background-color:blue; padding: 6px">Add Marks</button></a></li>
			<li><a ng-href="#monitor"><button type="button" name="submit" class="btn btn-primary btn-block" style="font-size: 16px;color:white; background-color:blue; padding: 6px">Monitor</button> </a></li>
			<li><a ng-href="#"><button type="button" name="submit" class="btn btn-primary btn-block " style="font-size: 16px;
				color:white; background-color:blue; padding: 6px">Log Out</button></a></li>
		</ul>
		<div ui-view></div>
    </div>
</nav>

<div class="row">

	<div class="container col-md-6 col-md-offset-3" id="container">
	    <form class="form-horizontal" role="form" method="POST" ng-submit='monitor()' enctype="multipart/form-data">
	        <h2>Monitor Class</h2>	        
	        <div class="form-group" >  
	            <label for="class"  >Select Class</label>
	            <div >
	                <select name="class"  class="form-control" ng-model="monitor.class" ng-change="loadStudents()">  
	                    <option value="">Select Class</option>  
	                    <option ng-repeat= "classData in class"  value="{{classData.cId}}" >
	                        {{classData.cName}}
	                    </option>  
	                </select> 
	            </div>                      
	        </div>
	        <div class="form-group" >  
	            <label for="monitorStudent"  >Select Student</label>
	            <div >
	                <select name="monitorStudent"  class="form-control" ng-model="monitor.student" ng-change="monitorStudent()" >  
	                    <option value="">Select Student</option>  
	                    <option ng-repeat= "studentData in stuList"  value="{{studentData.sId}}" >
	                       {{studentData.sName}}
	                    </option>  
	                </select> 
	            </div>                      
	        </div>      
	    </form> <!-- /form -->

	    <div class="container" ng-show="stuData">
  		<h2>Student Records</h2>
              
		<table class="table table-hover">
		<thead>
		  <tr class="success" >
		    <th>Name</th>
		    <td colspan="3">{{dispData[0].sName}}</td>
		  </tr>
		</thead>
		<tbody>
		  <tr >
		    <th>Email</th>
		    <td>{{dispData[0].sEmail}}</td>
		    <th>Contact</th>
		    <td>{{dispData[0].sContact}}</td>
		  </tr>
		  <tr>
		    <th>Class</th>
		    <td>{{dispData[0].cName}}</td>
		    <th>Average</th>
		    <td>{{average}}</td>
		  </tr>
		  
		  <tr ng-repeat="marks in dispData track by $index">
		    <th>{{marks.sbName}}</th>
		    <td colspan="3">{{marks.gGrades}}</td>		    
		  </tr>
		  
		  
		</tbody>
		</table>
	</div>

	</div> <!-- ./container -->
</div>
