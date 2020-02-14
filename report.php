<?php

include('./classes/GenerateReport.php');
include('./classes/Profile.php');
include('./classes/DB.php');
include('./classes/Login.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
        $isAdmin = DB::query('SELECT isAdmin FROM users WHERE empID = :empID', array(':empID'=> $userid))[0]['isAdmin'];
} else {
        header('Location: login.php');
}

 if(isset($_POST['submitView'])){

                       $view = $_POST['view'];  
                       $view2 = "viewOwn";
                       $view3 = "viewOwn";
                        
                        if(!DB::query('SELECT view3 FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
                            DB::query('INSERT INTO view VALUES (:empID, :view, :view2, :view3)', array(':empID'=> Login::isLoggedIn(), ':view'=>$view2, ':view2'=> $view3, ':view3'=> $view)); 
                            
                            $view = DB::query('SELECT view3 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view3'];
                            
                        }
                        
                        else {
                            DB::query('UPDATE view SET view3 = :view WHERE empID = :empID', array(':view'=> $view, ':empID'=> Login::isLoggedIn()));
                            
                            $view = DB::query('SELECT view3 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view3'];
                        } 
                    }

if(isset($_POST['send'])){
    
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    $address = $_POST['emailTo'];
    $cc = $_POST['emailCC'];
    $bcc = $_POST['emailBCC'];
    
    Mail::sendMail($subject, $body, $address, $cc, $bcc);
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-book" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Activity Log</span></a></li>
                     <?php if($isAdmin == 1){ echo '<li class="nav-item" role="presentation"><a class="nav-link" href="admin.php"><i class="fas fa-users-cog" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Admin</span></a></li>'; }?>
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
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php Profile::getActiveUser();?></span><img class="border rounded-circle img-profile" src="<?php Profile::getProfilePic();?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="change-password.php"><i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Change Password</a>
                                        <?php if($isAdmin == 1){ echo '<a class="dropdown-item" role="presentation" href="admin.php"><i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Admin</a>'; }?>
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
                <div class="col-lg-3"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#emailModal" style="background-color: #eb192e;">Email</button>
                
                                            <div class="modal fade" role="dialog" tabindex="-1" id="emailModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center text-dark text-primary" style="color: #000000;">Email Your Report</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col padMar margenesCajas">
                                                <p class="text-secondary p-0 m-0 p-2">Please enter the details below to send the report as an email to a person of your choosing</p>
                                            </div>
                                        </div>
                                        <form method="post" action="report.php">
                                        
                                        <div class="input_fields_wrap">
                                            <button class="add_field_button btn btn-dark btn-sm">Add More Emails</button>
                                            <div class="form-group"><br><input class="form-control form-control-user" type="email" id="emailTo" aria-describedby="emailHelp" placeholder="Email Address To Send To" name="mytext[]" required></div></div>
                                        <div class="input_fields_wrap2">
                                        <button class="add_field_button2 btn btn-dark btn-sm">Add More Emails To CC</button>
                                        <div class="form-group"><br><input class="form-control form-control-user" type="email" id="emailCC" placeholder="Email Address To CC" name="mytext2[]"></div></div>
                                        <div class="input_fields_wrap3">
                                            <button class="add_field_button3 btn btn-dark btn-sm">Add More Emails To BCC</button>
                                            <div class="form-group"><br><input class="form-control form-control-user" type="email" id="emailBCC" placeholder="Email Address To BCC" name="mytext3[]"></div></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="subject" placeholder="Subject" name="subject"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="message" placeholder="Message" name="message"></div>
                                        <button class="btn btn-light btn-block text-light btn-user" type="submit" name="send" id="send" style="background-color: #3c3d41;font-size: 16px;color: #ffffff;">Send</button></form>
                </div>
            </div>
        </div>
    </div>
                
                </div>
            </div><?php if($isAdmin == "1"){echo '<div class="row">
            <div class="container">
                <form action="report.php" method="post">
                      <input type="radio" name="view" id="view" value="viewOwn" /> View My Own Report<br>
                      <input type="radio" name="view" id="view" value="viewComp" /> View Company Wide Report<br><br>
                      <button class="btn btn-dark btn-sm" type="submit" id="submitView" name="submitView">Select</button>
                    </form>
                </div>
            </div>';}?>
        </div>
        <div class="container my-4 mx-4" id="print">	
      <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		  <thead>
			 <tr>
			   	<th class="th-sm">S.No.
			 </th>
			 <th class="th-sm">Country
			 </th>
			 <th class="th-sm">OU
			 </th>
			 <th class="th-sm">Entity
			 </th>
			 <th class="th-sm">Particulars
			 </th>
			 <th class="th-sm">FY
			 </th>
			 <th class="th-sm">Periodicity
			 </th>
			 <th class="th-sm">Due for
			 </th>
			 <th class="th-sm">Due in month
			 </th>
			 <th class="th-sm">Compiled on 
			 </th>
		  </tr>
	   </thead>
    <tbody>
    <!-- 1. -->
        
    <?php
        
        $view = GenerateAdminReport::checkView3();
        
        if($isAdmin == "1"){
            if($view == "viewOwn"){
            GenerateReport::getTaxReportData();
            }

            if($view == "viewComp") {
            GenerateAdminReport::getAdminTaxReportData();
            }
        }
        
        else {
            GenerateReport::getTaxReportData();
        }
    ?>
</tbody>
  
  <!-- Footer -->
  <tfoot>
    <tr>
		<th class="th-sm">S.No.
		</th>
		<th class="th-sm">Country
		</th>
		<th class="th-sm">OU
		</th>
		<th class="th-sm">Entity
		</th>
		<th class="th-sm">Particulars
		</th>
		<th class="th-sm">FY
		</th>
		<th class="th-sm">Periodicity
		</th>
		<th class="th-sm">Due for
		</th>
		<th class="th-sm">Due in month
		</th>
		<th class="th-sm">Compiled on 
		</th>
	</tr>
  </tfoot>
</table>
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
    
    <script type="text/javascript">
    $(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input class="form-control form-control-user" type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
    </script>
    
    <script type="text/javascript">
    $(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap2"); //Fields wrapper
	var add_button      = $(".add_field_button2"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input class="form-control form-control-user" type="text" name="mytext2[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
    </script>
    
    <script type="text/javascript">
    $(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap3"); //Fields wrapper
	var add_button      = $(".add_field_button3"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input class="form-control form-control-user" type="text" name="mytext3[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
    </script>
</body>

</html>