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
	    <form class="form-horizontal" role="form" method="POST" ng-submit='addMarks()' enctype="multipart/form-data">
	        <h2>Add Marks</h2>
	        <div class="form-group" >  
	            <label for="selStudent" class="col-sm-3 " >Select Student</label>
	            <div class="col-sm-9">
	                <select name="selStudent"  class="form-control" ng-model="stu.student" >  
	                    <option value="">Select Student</option>  
	                    <option ng-repeat= "studentData in students"  value="{{studentData.sId}}" >
	                        {{studentData.sName}}
	                    </option>  
	                </select> 
	            </div>                      
	        </div>
	        <div class="form-group" >  
	            <label for="class" class="col-sm-3 " >Select Class</label>
	            <div class="col-sm-9">
	                <select name="class"  class="form-control" ng-model="stu.class" ng-change="loadSubjects()">  
	                    <option value="">Select Class</option>  
	                    <option ng-repeat= "classData in class"  value="{{classData.cId}}" >
	                        {{classData.cName}}
	                    </option>  
	                </select> 
	            </div>                      
	        </div>
	        <div class="form-group" ng-repeat= "sub in subjects" >  
	            <label for="class" class="col-sm-3 " > {{sub.sbName}}</label>
	            <div class="col-sm-9">
	                <input type="number" id="sub.sbId"  ng-model="sub.value" placeholder="{{sub.sbName}}"  class="form-control" value="{{sub.sbId}}">
	            </div>                      
	        </div>
	           
	        <div class="form-group">
	            <div class="col-sm-9 col-sm-offset-3">
	                <button type="submit" id="addMarkst"  class="btn btn-primary btn-block">AddMarks </button>
	            </div>
	        </div>
	        <div>{{mark}}</div>

	    </form> <!-- /form -->
	</div> <!-- ./container -->
</div>
