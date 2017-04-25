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
    <form class="form-horizontal" role="form" method="POST" ng-submit='addStudent()' enctype="multipart/form-data" >
        <h2>Add Student</h2>
        <div class="form-group">
            <label for="name" class="col-sm-2 ">Name</label>
            <div class="col-sm-10">
                <input type="text" id="name" ng-model="stu.name" placeholder="Name" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="contact" class="col-sm-2 ">Contact</label>
            <div class="col-sm-10">
                <input type="number" id="contact" ng-model="stu.contact" placeholder="Password" class="form-control">
            </div>
        </div>  
        <div class="form-group">
            <label for="email" class="col-sm-2 ">Email</label>
            <div class="col-sm-10">
                <input type="text" id="email" ng-model="stu.email" placeholder="Email" class="form-control" >
            </div>
        </div>
        
           
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" id="addStudent" name="addStudent" class="btn btn-primary btn-block" >Add Student</button>
            </div>
        </div>
        <div>{{record}}</div>
    </form> <!-- /form -->
</div> <!-- ./container -->
</div>
