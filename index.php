<?php

include('./classes/GenerateFormFields.php');
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Profile.php');
include('./classes/Task.php');
include('./classes/Notifications.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        header('Location: login.php');
}

if(isset($_POST['submit'])){
    
    $sNo = 0;
    $country = "South Africa";
    $itemName = $_POST['item'];
    $entity = $_POST['ent'];
    $fy = $_POST['fy'];
    $ou = $_POST['ou'];
    $period = $_POST['period'];
    $dueFor = $_POST['dueFor'];
    $dueIn = $_POST['dueIn'];
    $compliedOn = date("Y-m-d H:i:sa");
    $userid = Login::isLoggedIn();
    
    DB::query('INSERT INTO tax VALUES(:sNo, :description, :country, :ou, :entity, :period, :fy, :dueFor, :dueIn, :empID, :compliedOn)', array(':sNo'=>$sNo, ':description'=> $itemName, ':country'=>$country, ':ou'=>$ou, ':entity'=>$entity, ':period'=> $period, ':fy'=>$fy, ':dueFor'=>$dueFor, ':dueIn'=>$dueIn, ':empID'=> $userid, ':compliedOn'=> $compliedOn));
    
    echo 'Success';
    
    $status = 0;
    $user = DB::query('SELECT firstName FROM users WHERE empID = :empID', array(':empID'=>$userid))[0]['firstName'];
    
    DB::query('INSERT INTO notifications VALUES(:id, :subject, :text, :status, :empID)', array(':id'=> $sNo, ':subject'=> $itemName, ':text'=> $user, ':status'=> $status, ':empID'=>$userid));
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(213,224,255);background-image: url(&quot;assets/img/green-fern-leaf-2748757.jpg&quot;);background-size: cover;background-repeat: no-repeat;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#" style="background-image: url(&quot;assets/img/images.png&quot;);background-size: cover;background-repeat: no-repeat;background-position: center;">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" style="color: rgba(0,0,0,0.8);"><i class="fas fa-tachometer-alt" style="color: #000000;"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activityLog.php"><i class="fas fa-book" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Activity Log</span></a></li>
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
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
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
                                        
                                        <?php Notify::getNotifications();
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
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
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
                                            <div class="form-group"><label>Tax Compliance Item</label><select id="item" name="item" class="form-control"><optgroup label="Select the main task"><?php GenerateTaxFormFields::getTaskFields(); ?></optgroup></select></div>
                                            <div
                                                class="form-group"><label>Entity</label><select id="ent" name="ent" class="form-control"><optgroup label="Select Entity"><?php GenerateTaxFormFields::getEntityFields(); ?></optgroup></select></div>
                                            <div
                                                class="form-group"><label>OU</label><select id="ou" name="ou" class="form-control"><optgroup label="Select OU"><?php GenerateTaxFormFields::getOUFields(); ?></optgroup></select></div>
                                            
                                    <div class="form-group"><label>Fiscal Year</label><select id="fy" name="fy" class="form-control"><optgroup label="Select Fiscal Year"><?php GenerateTaxFormFields::getFYFields(); ?></optgroup></select></div>
                                    <div
                                        class="form-group"><label>Periodicity</label><select id="period" name="period" class="form-control"><optgroup label="Select Periodicity"><?php GenerateTaxFormFields::getPeriodFields(); ?></optgroup></select></div>
                                <div
                                    class="form-group"><label>Due For</label><select id="dueFor" name="dueFor" class="form-control"><optgroup label="Due For"><?php GenerateTaxFormFields::getDueForFields(); ?></optgroup></select></div>
                            <div
                                class="form-group"><label>Due In Month</label><select id="dueIn" name="dueIn" class="form-control"><optgroup label="Due In Month"><?php GenerateTaxFormFields::getDueInFields(); ?></optgroup></select></div>
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
                    <h1 style="font-size: 26px;">Tasks To Do</h1>
                    <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Mon</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong> Monthly Tasks</strong></h3>
				<?php Task::getMonTasks(); ?>
			</div>
		</div>
                    <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>May</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Tasks Due In May</strong></h3>
				<?php Task::getMayTasks(); ?>
			</div>
		</div><div class="row row-striped">
			<div class="col-2 text-center">
				<h1 class="display-4"><span class="badge date-green"></span></h1>
				<h2>Jun</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Tasks Due In June</strong></h3>
				
				<?php Task::getJunTasks(); ?>
			</div>
		</div>
                    <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Jul</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Tasks Due In July</strong></h3>
				<?php Task::getJulTasks(); ?>
			</div>
		</div>
                </div>
            </div>
            <div class="col-lg-4">
                <section><br><br>
                    <div style="background-color: transparent;">
                        <h1 style="font-size: 26px;padding-left: 14px;">Compliance Overview</h1>
                        <div style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Complied&quot;,&quot;In Progress&quot;,&quot;Not initiated / complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:[&quot;#52ff00&quot;,&quot;rgb(255,188,110)&quot;,&quot;#ff0000&quot;],&quot;borderColor&quot;:[&quot;transparent&quot;,&quot;transparent&quot;,&quot;transparent&quot;],&quot;data&quot;:[&quot;4500&quot;,&quot;1356&quot;,&quot;659&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false}}}"></canvas></div>
                        <div
                            style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Complied&quot;,&quot;In Progress&quot;,&quot;Not initiated / complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#fbb778&quot;,&quot;borderColor&quot;:&quot;transparent&quot;,&quot;borderWidth&quot;:&quot;1&quot;,&quot;data&quot;:[&quot;4500&quot;,&quot;1356&quot;,&quot;659&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}]}}}"></canvas></div>
            </div>
            </section>
        </div>
        <div class="col">
            <h1 style="font-size: 26px;padding-left: 50px;">Overdue tasks</h1>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="media">
                        <div></div>
                        <div class="media-body">
                            <div class="media" style="overflow:visible;">
                                <div><img class="mr-3" style="width: 50px;height: 50px;" src="assets/img/images.png"></div>
                                <div class="media-body" style="overflow:visible;">
                                    <div class="row">
                                        <div class="col-10">
                                            <h4>Overdue Task 1</h4>
                                            <p>Overdue subtask 1<br>
<small class="text-muted">Was Due 08/12/19 at 9:00am </small></p>
                                            <p>Overdue subtask 2<br>
<small class="text-muted">Was Due 20/12/19 at 9:00am </small></p>
                                            <p>Overdue subtask 3<br>
<small class="text-muted">Was Due 20/12/19 at 9:00am </small></p>
                                        </div>
                                        <div class="col-2">
                                            <div class="dropdown pull-right"><button class="btn btn-link btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"> <i class="fa fa-chevron-down"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fa fa-pencil fa-fw"></i>Complete Now</a><a class="dropdown-item" role="presentation" href="#"><i class="fa fa-trash-o fa-fw"></i>Delete </a></div>
                                            </div>
                                        </div>
                                    </div>
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
</body>

</html>