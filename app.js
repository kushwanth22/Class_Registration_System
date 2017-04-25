// create the module and name it scotchApp
var myApp = angular.module('myApp', ['ngRoute']);

// configure our routes
myApp.config(["$routeProvider", function($routeProvider) {
	$routeProvider			
		// route for the about page
		.when('/', {
			templateUrl : 'login.php',
			controller  : 'loginCntr',
		})
		// route for the home page
		.when('/registration', {
			templateUrl : 'registration.php',
			controller  : 'regiCntr'
		})
		//php Codding
		.when('/addStudent', {			
			templateUrl : 'addStudent.php',
			controller  : 'addStudentCntr'
		})
		.when('/monitor', {			
			templateUrl : 'monitor.php',
			controller  : 'monitorCntr'
		})
		//home Codding
		.when('/home', {
			templateUrl : 'home.php',
			controller  : 'homeCntr',
             resolve: [ 'sessionCheck', function(sessionCheck) { 
                   return sessionCheck.resolve();}]
		})
		
		//home Codding
		.when('/addMarks', {
			
			templateUrl : 'addMarks.php',
			controller  : 'addMarksCntr'
		})
		.when('/logout', {
			
			templateUrl : 'login.php',
			controller  : 'logoutCntr'
			})
        }]);

myApp.controller('loginCntr',function($rootScope,$scope,$http,$location){
	
	$scope.login = function(){
    	
	    var req = {
	        method: 'POST',
	        url: 'php/loginSession.php',
	        data: { userName: $scope.userName,
	                password:$scope.password 
	        	}, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	          	
	    };
	//console.log($scope.password);		
	    // Successful HTTP post request or not 
	    $http(req).then(function(suc){    			
	    			//$rootScope.userName = suc.data;
	    			//console.log($rootScope.userName);
	    			//alert(suc.data);

	    			$rootScope.user = suc.data.trim();
	    			console.log($rootScope.user);
	    			if($rootScope.user == "failed") {	    				
	    				$scope.err = "Wrong Username Password";
	    				$rootScope.username="";
	    				$rootScope.password = "";
	    			} else {
	    				$rootScope.loggedIn = true;
	    				$rootScope.username=$rootScope.user;
	    				//$scope.password = "";
	    				$location.path('/home');    				
	    			}
                    
                },function(err){
                    $location.path('/');
                });
	
   };
});
    
myApp.controller('regiCntr', function($rootScope,$scope,$http,$location) {
	

	$scope.regi= function(){
        var result = {
                method: "POST",
                url: "php/regi.php",
                data: {
                    userName:$scope.userName,
                    password:$scope.password,
                    email:$scope.email
                }, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }
            $http(result).then(function(suc){
                    $location.path('/');
                },function(err){
                    $location.path('/registration');
                });
        };
   
});

// create the controller and inject Angular's $scope
myApp.controller('addStudentCntr', function($scope,$http,$location) {
	$scope.recordInserted = false;
	//add Student    
	$scope.addStudent= function(){
		//console.log($scope.stu.name);
        var result = {
                method: "POST",
                url: "php/addStudent1.php",
                data:{
                	stuData :   $scope.stu
	                },
    		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }
            //console.log($scope.subjects[0]);
        //console.log(result.data.marks[0].value);
		//console.log(result.data.stuData);
            $http(result).then(function(suc){
            	
                    $scope.record = "Record inserted successfully";	

                    $scope.stu ="";

                },function(err){
                    console.log("Student not inserted");
                });
        };
   

});

// add Marks
myApp.controller('addMarksCntr', function($scope,$http,$location) {


	var classData = {
	    method: "GET",
	    url: "php/getClass.php",
	    data: {}, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	}
	$http(classData).then(function(data){
	        //console.log( data.data[0]);
	        //console.log( data.data[1]);

	        $scope.class = data.data[0]; 
	        $scope.students = data.data[1];  
	    });

    //Class Drop Down


	
	//get subjects
    $scope.loadSubjects= function(){
	//console.log($scope.stu.class);
    var result = {
            method: "POST",
            url: "php/getClass.php",
            data: {
            	selClass : $scope.stu.class
            }, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(result).then(function(data){
        	//console.log(data.data[0].sbName);
                $scope.subjects = data.data
            });
    };
	
	$scope.addMarks= function(){
	//console.log($scope.stu.class);
    var result = {
            method: "POST",
            url: "php/addStudent1.php",
            data: {
            	data1 : $scope.stu,
            	marks: $scope.subjects            	
            },
    		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        //console.log($scope.subjects[0]);
        //console.log(result.data.marks[0].value);
        $http(result).then(function(data){
        	//console.log(data);
            // $scope.subjects = data.data        
            $scope.mark = "Marks inserted successfully";	

            });
    };      
    
	
});

myApp.controller('monitorCntr', function($scope,$http,$location) {	
	//Monitor Class   
	$scope.stuData = false;
	var classData = {
	    method: "GET",
	    url: "php/getClass.php",
	    data: {}, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	}
	$http(classData).then(function(data){
	        $scope.class = data.data[0];   
	    });

	 $scope.loadStudents= function(){
	//console.log($scope.stu.class);
    var result = {
            method: "POST",
            url: "php/monitorStudents.php",
            data: {
            	selClass : $scope.monitor.class
            }, headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }
        $http(result).then(function(data){
        	console.log(data.data);
            $scope.stuList = data.data;

            });
    };


	$scope. monitorStudent= function(){
        var result = {
                method: "POST",
                url: "php/monitorStudents1.php",
                data:{
                	monStudent : $scope.monitor
	                },
    		headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }
           console.log(result.data.monStudent);
            $http(result).then(function(data){
            	//console.log(data.data);
                    //$location.path('/home');
                    //$scope.stu ="";
                    $scope.dispData = data.data;
                    $scope.average = 0;
				    for(var i = 0; i < $scope.dispData.length; i++){
				        var grade = $scope.dispData[i];
				        $scope.average += (parseInt(grade.gGrades));
				        
				    }
				    $scope.average = $scope.average/$scope.dispData.length;

				    //console.log($scope.average);
                    $scope.stuData = true;
                },function(err){
                    console.log("Student not inserted");
                });
        };
   

});

// create the controller and inject Angular's $scope
myApp.controller('homeCntr', function($scope,$http,$location) {
	// create a message to display in our view
	$scope.message = 'registration!';
    
});
myApp.controller('logoutCntr', function($scope,$http,$location) {
    $scope.logout= function(){
	$http.get("sessionClear.php")  
    }
	.success(function(data){

		$rootScope.loggedIn = false;
		$rootSscope.userName="";
		location.path('/');
		
	});
    
    
});

	