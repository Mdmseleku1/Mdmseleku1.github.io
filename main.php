<?php

include('./classes/GenerateMainReport.php');
include('./classes/GenerateFormFields.php');
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Profile.php');
include('./classes/Task.php');
include('./classes/Notifications.php');
include('./classes/GenerateReport.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
        }

 else {
        header('Location: login.php');
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
    <script src="Print.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!-- Data tables CSS -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
     <!-- Date picker CSS -->
     <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color: rgba(0,0,0,0.8);"><i class="fas fa-tachometer-alt" style="color: #000000;"></i><span>Dashboard</span></a></li>

                    <li id ="admin"   class="nav-item" role="presentation"><a class="nav-link" href="report.php"><i class="fa fa-id-badge" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Tax</span></a></li>
                    <li  class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-book" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Activity Log</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-door-open" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Logout</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="background-color: rgba(0,0,0,0.2);"></button></div>
            </div>

        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background-image: url(&quot;none&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
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
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Notifications center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3"><i class="fa fa-check" style="font-size: 20px;color: #40c601;"></i></div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>You have recently submitted the compliance items for VAT/GST Payment</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="text-danger mr-3"><i class="fa fa-exclamation" style="font-size: 22px;"></i></div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>You have 2 overdue tasks. Attend to them right away</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3"><i class="fa fa-warning" style="font-size: 20px;color: #ffc107;"></i></div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>You have a task that is due in 30 days. Don't forget to submit before then</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </li>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php Profile::getActiveUser();?></span><img class="border rounded-circle img-profile" src="<?php Profile::getProfilePic();?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div
                                            class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="login.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
            </li>
            </li>
            </ul>
        </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="text-dark mb-1">Report</h3>
                </div>
                <div class="col-lg-1">
                    <div><button onclick="printRep()" class="btn btn-dark" type="button">Print</button></div>
                </div>
                <div class="col-lg-3"><button class="btn btn-primary" type="button" style="background-color: #eb192e;">Email</button></div>
            </div>
        </div>
        <div class="container my-4 mx-4" id="print">
      <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		  <thead>
			 <tr>
			   	<th class="th-sm">S.No.
			 </th>
			 <th class="th-sm">Department
			 </th>
			 <th class="th-sm">Particulars
			 </th>
			 <th class="th-sm">Time line
			 </th>
			 <th class="th-sm">Status of compliance
			 </th>
			 <th class="th-sm">Reference
			 </th>

		  </tr>
	   </thead>
    <tbody>
    <!-- 1. -->

    <?php
        GenerateMainReport::getTaxReportData();
    ?>
</tbody>



  <!-- Footer -->

</table>

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
            <?php GenerateReport::getTaskProgress();?>
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

                                <?php GenerateReport::getLateTasks();?>

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
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Data tables JS -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- Date picker  JS -->
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <script src="classes/PrintRep.js" type="text/javascript"></script>

  <script type="text/javascript">
		$(document).ready(function() {
		  $('#dtBasicExample').DataTable({
        "pagingType": "full_numbers"
      });
      $('#compileDate').datepicker({
          uiLibrary: 'bootstrap4'
      });
    });
  </script>
</body>

</html>