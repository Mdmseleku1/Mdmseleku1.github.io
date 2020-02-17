<?php

include('./classes/GenerateFormFields.php');
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Profile.php');
include('./classes/Task.php');
include('./classes/Notifications.php');
include('./classes/GenerateReport.php');
include('./classes/Admin.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
        $isAdmin = DB::query('SELECT isAdmin FROM users WHERE empID = :empID', array(':empID'=> $userid))[0]['isAdmin'];
} else {
        header('Location: login.php');
}

if(isset($_POST['submit'])){
    
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
			'secret' => "6LexmdkUAAAAAFdVXetRc1WiS5D5RIODM8cVkrXS",
			'response' => $_POST['token'],
			'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {
    
    
    $sNo = 0;
    $country = $_POST['country'];
    $itemName = $_POST['item'];
    $entity = $_POST['ent'];
    $fy = $_POST['fy'];
    $ou = $_POST['ou'];
    $period = $_POST['period'];
    $dueFor = $_POST['dueFor'];
    $dueIn = $_POST['dueIn'];
    $compliedOn = date("Y-m-d H:i:sa");
    $userid = Login::isLoggedIn();
    $compliedOnMon = date("m");
    $dueDay = $_POST['dueDay'];
    $status = 1;
    
    DB::query('INSERT INTO tax VALUES(:sNo, :description, :country, :ou, :entity, :period, :fy, :dueFor, :dueIn, :empID, :compliedOn, :compliedOnMon, :day)', array(':sNo'=>$sNo, ':description'=> $itemName, ':country'=>$country, ':ou'=>$ou, ':entity'=>$entity, ':period'=> $period, ':fy'=>$fy, ':dueFor'=>$dueFor, ':dueIn'=>$dueIn, ':empID'=> $userid, ':compliedOn'=> $compliedOn, ':compliedOnMon'=>$compliedOnMon,':day'=>$dueDay));
    
    DB::query('UPDATE task_details SET status = :status WHERE task = :task', array(':status'=>$status, ':task'=>$itemName));
    
    echo 'Success';
    
    $status = 0;
    $user = DB::query('SELECT firstName FROM users WHERE empID = :empID', array(':empID'=>$userid))[0]['firstName'];
    
    DB::query('INSERT INTO notifications VALUES(:id, :subject, :text, :status, :empID)', array(':id'=> $sNo, ':subject'=> $itemName, ':text'=> $user, ':status'=> $status, ':empID'=>$userid));
    
    header('Location: report.php');
    
        }
}

 if(isset($_POST['submitView'])){
                        
                        $view2 = "viewOwn";
                       $view3 = "viewOwn";

                       $view = $_POST['view'];
                        
                        if(!DB::query('SELECT view FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
                            DB::query('INSERT INTO view VALUES (:empID, :view, :view2, :view3)', array(':empID'=> Login::isLoggedIn(), ':view'=>$view, ':view2'=> $view2, ':view3'=> $view3)); 
                            
                            $view = DB::query('SELECT view FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view'];
                            
                        }
                        
                        else {
                            DB::query('UPDATE view SET view = :view WHERE empID = :empID', array(':view'=> $view, ':empID'=> Login::isLoggedIn()));
                            
                            $view = DB::query('SELECT view FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view'];
                        } 
}

 if(isset($_POST['submitView2'])){
     
      $view2 = "viewOwn";
                       $view3 = "viewOwn";

                       $view = $_POST['view2'];
                        
                        if(!DB::query('SELECT view2 FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
                            DB::query('INSERT INTO view VALUES (:empID, :view, :view2, :view3)', array(':empID'=> Login::isLoggedIn(), ':view'=>$view2, ':view2'=> $view, ':view3'=> $view3)); 
                            
                            $view = DB::query('SELECT view2 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view2'];
                            
                        }
                        
                        else {
                            DB::query('UPDATE view SET view2 = :view WHERE empID = :empID', array(':view'=> $view, ':empID'=> Login::isLoggedIn()));
                            
                            $view = DB::query('SELECT view2 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view2'];
                        } 
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Zensar compliance tracker</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LexmdkUAAAAAMRZ8X2k7cFIt7MiUA1zqEPYiVmg"></script>
        
    <!-- SELECT CSS TO IMPLEMENT SEARCH WITH OPTIONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 shadow-lg" style="background-color: rgb(213,224,255);background-image: url(&quot;assets/img/green-fern-leaf-2748757.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background-image: url(&quot;assets/img/images.png&quot;);background-size: cover;background-repeat: no-repeat;background-position: center;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" style="color: rgba(0,0,0,0.8);"><i class="fas fa-tachometer-alt" style="color: #000000;"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activityLog.php"><i class="fas fa-book" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Activity Log</span></a></li>
                    <?php if($isAdmin == 1){ echo '<li class="nav-item" role="presentation"><a class="nav-link" href="admin.php"><i class="fas fa-users-cog" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Admin</span></a></li>'; }?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-door-open" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Logout</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="background-color: rgba(0,0,0,0.2);"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background-image: url(&quot;green-flower-bouquet-on-white-background-961402 (1).jpg&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <!-- Search bar  -->
                            <select class="selectpicker show-tick" id="taskGroup" data-live-search="true" 
                            title="Filter By Task..." data-width="35%" data-style="btn-light" 
                            onchange="filterTasks();">
                                <option value="empty">
                                </option>
                                <option data-tokens="payment" value="VAT/GST Payment">
                                    VAT/GST Payment
                                </option>
                                <option data-tokens="return" value="VAT/GST Return">
                                    VAT/GST Return
                                </option>
                                <option data-tokens="itr" value="SARS Audit - ITR 14 YOA">
                                    SARS Audit - ITR 14 YOA
                                </option>
                                <option data-tokens="Provisional" value="SARS Audit - Provisional Tax YOA">
                                    SARS Audit - Provisional Tax YOA
                                </option>
                                <option data-tokens="refund" value="SARS - Corporate Tax Refund">
                                    SARS - Corporate Tax Refund
                                </option>
                            </select>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-bell fa-fw" style="color:<?php Notify::checkNotes()?>"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Notifications center</h6>
                                        
                                        <?php 
                                        Notify::checkStatus();
                                        Notify::getNotifications();
                                        Notify::checkStatus();
                                        ?>
                                        
                                        
                                        <div><a class="text-center dropdown-item small text-gray-500" href="notifications.php">Show All Alerts</a>
                                        </div>
                                    
                                    
                                    
                                    </div>
                                </li>
                            </li>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php Profile::getActiveUser(); ?></span><img class="border rounded-circle img-profile" src="<?php Profile::getProfilePic();?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" role="presentation" href="change-password.php"><i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Change Password</a>
                                         <?php if($isAdmin == 1){ echo '<a class="dropdown-item" role="presentation" href="admin.php"><i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Admin</a>'; }?>
                                        <div
                                            class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
            </li>
            </li>
            </ul>
        </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="text-dark mb-1">Dashboard</h3>
                </div>
                <div class="col-lg-1">
                    <div><button class="btn btn-dark" data-toggle="modal" data-target="#modalLogin" type="button">New</button>
                        <div class="modal fade" role="dialog" tabindex="-1" id="modalLogin">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center text-dark text-primary" style="color: #000000;">Tax Compliance Form</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col padMar margenesCajas">
                                                <p class="text-secondary p-0 m-0 p-2">Please select the task you would like to do below to reveal the necessary checklist for the corresponding subtasks</p>
                                            </div>
                                        </div>
                                        <form class="p-4" method="post" action="index.php">
                                            <div class="form-group"><label>Country</label><select id="country" name="country" class="form-control"><optgroup label="Select the country"><?php GenerateTaxFormFields::getCountryFields(); ?></optgroup></select></div>
                                            <div class="form-group"><label>Tax Compliance Item</label><select id="item" name="item" class="form-control"><optgroup label="Select the task"><?php GenerateTaxFormFields::getTaskFields(); ?></optgroup></select></div>
                                            <div
                                                class="form-group"><label>Entity</label><select id="ent" name="ent" class="form-control"><optgroup label="Select Entity"><?php GenerateTaxFormFields::getEntityFields(); ?></optgroup></select></div>
                                            <div
                                                class="form-group"><label>OU</label><select id="ou" name="ou" class="form-control"><optgroup label="Select OU"><?php GenerateTaxFormFields::getOUFields(); ?></optgroup></select></div>
                                            
                                    <div class="form-group" onchange="dueDate()"><label>Fiscal Year</label><select id="fy" name="fy" class="form-control"><optgroup label="Select Fiscal Year"><?php GenerateTaxFormFields::getFYFields(); ?></optgroup></select></div>
                                    <div
                                        class="form-group"><label>Periodicity</label><select id="period" name="period" class="form-control"><optgroup label="Select Periodicity"><?php GenerateTaxFormFields::getPeriodFields(); ?></optgroup></select></div>
                                <div
                                    class="form-group"><label>Due For</label><select id="dueFor" name="dueFor" class="form-control"><optgroup label="Due For"><?php GenerateTaxFormFields::getDueForFields(); ?></optgroup></select></div>
                            <div
                                class="form-group"><label>Due In Month</label><select id="dueIn" name="dueIn" class="form-control"><optgroup label="Due In Month"><?php GenerateTaxFormFields::getDueInFields(); ?></optgroup></select>
                            </div>
                          <div class="form-group row ml-1" style="display: none;" id="dueDayDiv">
                                <label for="dueDay" class="col-sm-3col-form-label">Due In Day</label>
                                <select id="dueDay" name="dueDay" class="">
                                    <optgroup label="Due In Day" id="optionGroup">
                                        
                                    </optgroup>
                                </select>
                            </div>
                        <!--<div
                            class="form-group"><label>Complied On</label>
                            <div class="wrapper">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div id="datepicker" class="datepicker"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>-->
                    <input type="hidden" id="token" name="token">
                    <div class="form-group"><button name="submit" id="submit" class="btn btn-dark btn-block" type="submit">Submit Comlpiance Item</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="col-lg-3"><a class="btn btn-primary" role="button" href="report.php">Generate Report</a></div>
    </div>
    </div>
    <section>
        <div></div>
        <div class="row">
            <div class="col-lg-8">
                <div style="margin:46px;">
                    <h1 style="font-size: 26px;">Calendar</h1>
                    <a onclick="toggle_visibility()">Show/Hide Tasks</a>
                    <div class="container-fluid" id="taskDetails">
                        <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-0">
        <div class="carousel-item col-sm-12 active">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Welcome to your calendar</h4>
            <p class="card-text">All the tasks that are due along with their subtasks will be shown here. The tasks will cycle through automatically, or you may use the arrows on the left and right sides of the card to view the next/previous task</p>
          </div>
        </div>
      </div>
        <?php ParticularsAdmin::getMainTasks();?>
    </div>
                      
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
                        
                </div>
            </div>
            <div class="col-lg-8">
                <div style="margin:46px;">
                    <h1 style="font-size: 26px;">General Compliance Tasks To Do</h1>
                    <div class="row row-striped">
			<div class="col-2 text-center">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Mon</h2>
			</div>
			<div class="col-10" id="monthlyTasks">
				<h3 class="text-uppercase"><strong> Monthly Tasks</strong></h3>
				<?php Task::getMonTasks(); ?>
                <h5 id="noMonthlyTasks" class="alert alert-info" style="display: none;">No monthly due date for selected task.</h5>
			</div>
		</div>
				<?php 
                    Task::getYearlyTasks();
                ?>
               
                </div>
            </div>
            <div class="col-lg-4">
                
                <?php if($isAdmin == "1"){echo '<div class="row">
            <div class="container">
                <form action="index.php" method="post">
                      <input type="radio" name="view2" id="view2" value="viewOwn" /> View My Own Task Progress<br>
                      <input type="radio" name="view2" id="view2" value="viewComp" /> View Company Wide Task Progress<br><br>
                      <button class="btn btn-dark btn-sm" type="submit" id="submitView2" name="submitView2">Select</button>
                    </form>
                <br>
                </div>
            </div>';}?>
                
                <?php 
                
                $view2 = GenerateAdminReport::checkView2();
                
                if($view2 == "viewOwn"){
                GenerateReport::getTaskProgress();
                echo '<p>Viewing your own task progress</p>';
                }
                
                if($view2 == "viewComp"){
                    GenerateAdminReport::getAdminTaskProgress();
                    echo '<p>Viewing company wide task progress</p>';
                }
                
                
                ?>
        </div>
        <div class="col">
            <h1 style="font-size: 26px;padding-left: 50px;">Overdue tasks</h1>
            <ul class="list-group">
                 <?php if($isAdmin == "1"){echo ' <div class="row">
            <div class="container">
                <form action="index.php" method="post">
                      <input type="radio" name="view" id="view" value="viewOwn" /> View My Own Late Tasks<br>
                      <input type="radio" name="view" id="view" value="viewComp" /> View Company Wide Late Tasks<br><br>
                      <button class="btn btn-dark btn-sm" type="submit" id="submitView" name="submitView">Select</button>
                    </form>
                <br>
                </div>
            </div>';}?>
                <li class="list-group-item">
                    <div class="media">
                        <div></div>
                        <div class="media-body">
                            <div class="media" style="overflow:visible;">
                                <div><img class="mr-3" style="width: 50px;height: 50px;" src="assets/img/images.png"></div>
                                <div class="media-body" style="overflow:visible;">
                                    
                                    
                                    <?php
                                    
                                    $view = GenerateAdminReport::checkView();
                                    
                                    if($view == "viewOwn"){
                                    GenerateReport::getLateTasks();
                                    }
                                    if($view == "viewComp"){
                                    GenerateAdminReport::getAdminLateTasks();
                                    }
                                    
                                    ?>
                                     
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </section>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Zensar Technologies Ltd. 2020</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
    <!-- Added BOOTSTRAP SELECT TO IMPLEMENT SEARCH -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">
        function submitForm(){
            $.ajax({
                type:'POST',
                url:'ajaxForm.php',
                data:$('#complianceForm').serialize(),
                success:function(status){
                    if (status == "SUCCESS : Form submitted"){
                        document.getElementById('statusUpdate').style.display = 'block';
                        $('#alertMsg').html(status);
                    }else{
                        document.getElementById('statusError').style.display = 'block';
                        $('#alertErrorMsg').html("ERROR : form could not be submitted.");
                    }
                },
                error:function(status){
                    document.getElementById('statusError').style.display = 'block';
                    $('#alertErrorMsg').html(status);    
                }
            });
        }

       function filterTasks(){
            let tasks = document.getElementById("taskGroup").selectedIndex;
            let indTask = document.getElementsByTagName("option")[tasks].value;
            
            let monthlyTasksDiv = document.querySelector("#monthlyTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noMonthlyTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
            let monthlyTasksDiv = document.querySelector("#janTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noJanTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
            let monthlyTasksDiv = document.querySelector("#febTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noFebTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#marTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noMarTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#aprTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noAprTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
            
            let mayTaskGroup = document.getElementById("mayTasks");
            let mayTasks = mayTaskGroup.getElementsByTagName("p");
            let noMayTasks = document.getElementById("noMayTasks");
            let mayRule =  mayTaskGroup.querySelector("hr");
            
            let juneTaskGroup = document.getElementById("juneTasks");
            let juneTasks = juneTaskGroup.getElementsByTagName("p");
            let noJuneTasks = document.getElementById("noJuneTasks");
            let juneRule = juneTaskGroup.querySelector("hr");

            let  julyTaskGroup = document.getElementById("julyTasks");
            let julyTasks = julyTaskGroup.getElementsByTagName("p");
            let noJulyTasks = document.getElementById("noJulyTasks");
            let julyRule = julyTaskGroup.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#augTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noAugTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#septTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noSeptTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#octTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noOctTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#novTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noNovTasks");
            let rule = monthlyTasksDiv.querySelector("hr");
           
           let monthlyTasksDiv = document.querySelector("#decTasks");
            let listedTasks = monthlyTasksDiv.querySelectorAll("p");
            let noMonthlyTasks = document.getElementById("noDecTasks");
            let rule = monthlyTasksDiv.querySelector("hr");

            let allTasks = [listedTasks, janTasks, febTasks, marTasks, aprTasks, mayTasks, juneTasks, julyTasks, augTasks, septTasks, octTaks, novTasks, decTasks];
            let noTasks = [noMonthlyTasks, noJanTasks, noFebTasks, noMarTasks, noAprTasks, noMayTasks, noJuneTasks, noJulyTasks, noAugTasks, noSeptTasks, noOctTasks, noNovTasks, noDecTasks];
            let noHorizontalRules = [rule, janRule, febRule, marRule, aprRule, mayRule, juneRule, julyRule, augRule, septRule, octRule, novRule, decRule];
            let count = 0;
            
            for (let i = 0; i < allTasks.length; i++){
                for (let j = 0; j < allTasks[i].length; j++){
                    if (!allTasks[i][j].innerText.includes(indTask) && indTask != "empty"){
                        allTasks[i][j].style.display = "none";
                        noHorizontalRules[i].style.display = "none";
                        count++;
                    }else{
                        allTasks[i][j].style.display = "block";
                    }
                }
                if (count == allTasks[i].length){
                    noHorizontalRules[i].style.display = "none";
                    noTasks[i].style.display = "block";    
                }else
                    noTasks[i].style.display = "none";
                count = 0;    
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});

</script>

<script type="text/javascript">
function toggle_visibility() {
  var x = document.getElementById("taskDetails");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<script type="text/javascript">
    
     //TIMER JS
    $( document ).ready(function() {
        setInterval(function time(){
        var d = new Date();
        var months = d.getMonth();
        var years = d.getYear();
        var days = d.getDay();
        var hours = 24 - d.getHours();
        var mins = 60 - d.getMinutes();
        if((months + '').length == 1){
            months = '0' + months;
        }
        if((hours + '').length == 1){
            hours = '0' + hours;
        }
        var sec = 60 - d.getSeconds();
        if((mins + '').length == 1){
            mins = '0' + mins;
        }
        jQuery('#countdown #months').html(months);
        jQuery('#countdown #days').html(days);
        jQuery('#countdown #hours').html(hours);
        jQuery('#countdown #years').html(years);
        }, 1000); 
    });
    
       function dueDate(){
            let currentDate = new Date().getYear();//.substring(1);
            let months = document.getElementById("dueIn").selectedIndex;
            let selectedMonth = document.getElementById("dueIn").options[months].value;
            
            let years = document.getElementById("fy").selectedIndex;
            let fiscalYear = document.getElementById("fy").options[years].value;
            
            let period = document.getElementById("period").selectedIndex;
            let periodicity = document.getElementById("period").options[period].value;
            let month;    

            let rangeYears = fiscalYear.split("-");
            
            let startYear = (1 * rangeYears[0].substr(2) )+ 100;
            let endYear = 100 + (rangeYears[1] * 1); 
            let timePast = false;
            if (startYear < currentDate && (endYear === currentDate || endYear < currentDate)){
                timePast = true;
            }
            switch(selectedMonth.toUpperCase()){
                case "JANUARY" : month = 1;break; 
                case "FEBRUARY"  : month = 2;break;
                case "MARCH"  : month = 3;break;
                case "APRIL"  : month = 4;break;
                case "MAY"  : month = 5;break;
                case "JUNE"  : month = 6;break;
                case "JULY"  : month = 7;break;
                case "AUGUST"  : month = 8;break;
                case "SEPTEMBER"  : month = 9;break;
                case "OCTOBER"  : month = 10;break;
                case "NOVEMBER"  : month = 11;break;
                case "DECEMBER"  : month = 12;break;
                default : month = -1;
            }      
           let displayField = document.getElementById("dueDayDiv");
           let count;
            if (month > 0){
                count = new Date(startYear, month, 0).getDate();
                let options = document.getElementById("optionGroup");
                options.innerText = "";
                for (let i = 1; i <= count; i++){
                    let optionEl = document.createElement("option");
                    optionEl.value = i;
                    optionEl.innerText = i;
                    options.appendChild(optionEl);
                }
                displayField.style.display = 'block';
            }
        }
</script>
<script>
          grecaptcha.ready(function() {
              grecaptcha.execute('6LexmdkUAAAAAMRZ8X2k7cFIt7MiUA1zqEPYiVmg', {action: 'homepage'}).then(function(token) {
                 // console.log(token);
                 document.getElementById("token").value = token;
              });
          });
    </script>

</body>

</html>