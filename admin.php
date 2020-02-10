<?php

include('./classes/GenerateFormFields.php');
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Profile.php');
include('./classes/Admin.php');
include('./classes/Notifications.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
        $isAdmin = DB::query('SELECT isAdmin FROM users WHERE empID = :empID', array(':empID'=> $userid))[0]['isAdmin'];
} else {
        header('Location: login.php');
}

if($isAdmin == 0){
    die('You do not have admin privileges');
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Country form field

if(isset($_POST['submitNewCountry'])){
    $id = 0;
    $countryVal = $_POST['newCountry'];
    $deptID = $_POST['deptID'];
    
    CountryAdmin::addCountryVal($id, $countryVal, $deptID);
}

if(isset($_POST['submitEditCountry'])){
    
    $countryOldVal = $_POST['countryValEdit'];
    $countryNewVal = $_POST['countryValEditNew'];
    
    CountryAdmin::editCountryVal($countryOldVal, $countryNewVal);
    }

if(isset($_POST['submitDelCountry'])){
    $countryValDel = $_POST['countryValDel'];
    
    CountryAdmin::delCountryVal($countryValDel);
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on OU form field

if(isset($_POST['submitOU'])){
    $id = 0;
    $ouVal = $_POST['ouVal'];
    $deptID = $_POST['ouDeptID'];
    
    OUAdmin::addOUVal($id, $ouVal, $deptID);
}

if(isset($_POST['submitDelOU'])){
    $ouValDel = $_POST['ouValDel'];
    
    OUAdmin::delOUVal($ouValDel);
}

if(isset($_POST['submitEditOU'])){
    
    $ouOldVal = $_POST['ouValEdit'];
    $ouNewVal = $_POST['ouValEditNew'];
    
    OUAdmin::editOUVal($ouOldVal, $ouNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Entity form field

if(isset($_POST['submitEntity'])){
    $id = 0;
    $entityVal = $_POST['entityVal'];
    $deptID = $_POST['entDeptID'];
    
    EntityAdmin::addEntityVal($id, $entityVal, $deptID);
}

if(isset($_POST['submitDelEntity'])){
    $entityValDel = $_POST['entityValDel'];
    
    EntityAdmin::delEntityVal($entityValDel);
}

if(isset($_POST['submitEditEntity'])){
    
    $entityOldVal = $_POST['entityValEdit'];
    $entityNewVal = $_POST['entityValEditNew'];
    
    EntityAdmin::editEntityVal($entityOldVal, $entityNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Particulars form field

if(isset($_POST['submitParticulars'])){
    $id = 0;
    $particularsVal = $_POST['particularsVal'];
    $deptID = $_POST['partDeptID'];
    
    ParticularsAdmin::addParticularsVal($id, $particularsVal, $deptID);
}

if(isset($_POST['submitDelParticulars'])){
    $particularsValDel = $_POST['particularsValDel'];
    
    ParticularsAdmin::delParticularsVal($particularsValDel);
}

if(isset($_POST['submitEditParticulars'])){
    
    $particularsOldVal = $_POST['particularsValEdit'];
    $particularsNewVal = $_POST['particularsValEditNew'];
    
    ParticularsAdmin::editParticularsVal($particularsOldVal, $particularsNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on FY form field

if(isset($_POST['submitFY'])){
    $id = 0;
    $fyVal = $_POST['fyVal'];
    $deptID = $_POST['fyDeptID'];
    
    FYAdmin::addFYVal($id, $fyVal, $deptID);
}

if(isset($_POST['submitDelFY'])){
    $fyValDel = $_POST['fyValDel'];
    
    FYAdmin::delFYVal($fyValDel);
}

if(isset($_POST['submitEditFY'])){
    
    $fyOldVal = $_POST['fyValEdit'];
    $fyNewVal = $_POST['fyValEditNew'];
    
    FYAdmin::editFYVal($fyOldVal, $fyNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Periodicity form field

if(isset($_POST['submitPeriod'])){
    $id = 0;
    $periodVal = $_POST['periodVal'];
    $deptID = $_POST['periodDeptID'];
    
    PeriodAdmin::addPeriodVal($id, $periodVal, $deptID);
}

if(isset($_POST['submitDelPeriod'])){
    $periodValDel = $_POST['periodValDel'];
    
    PeriodAdmin::delPeriodVal($periodValDel);
}

if(isset($_POST['submitEditPeriod'])){
    
    $periodOldVal = $_POST['periodValEdit'];
    $periodNewVal = $_POST['periodValEditNew'];
    
    PeriodAdmin::editPeriodVal($periodOldVal, $periodNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Due For form field

if(isset($_POST['submitDueFor'])){
    $id = 0;
    $dueForVal = $_POST['dueForVal'];
    $deptID = $_POST['dueForDeptID'];
    
    DueForAdmin::addDueForVal($id, $dueForVal, $deptID);
}

if(isset($_POST['submitDelDueFor'])){
    $dueForValDel = $_POST['dueForValDel'];
    
    DueForAdmin::delDueForVal($dueForValDel);
}

if(isset($_POST['submitEditDueFor'])){
    
    $dueForOldVal = $_POST['dueForValEdit'];
    $dueForNewVal = $_POST['dueForValEditNew'];
    
    DueForAdmin::editDueForVal($dueForOldVal, $dueForNewVal);
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Logic to perform operations on Due In form field

if(isset($_POST['submitDueIn'])){
    $id = 0;
    $dueInVal = $_POST['dueInVal'];
    $deptID = $_POST['dueInDeptID'];
    
    DueInAdmin::addDueInVal($id, $dueInVal, $deptID);
}

if(isset($_POST['submitDelDueIn'])){
    $dueInValDel = $_POST['dueInValDel'];
    
    DueInAdmin::delDueInVal($dueInValDel);
}

if(isset($_POST['submitEditDueIn'])){
    
    $dueInOldVal = $_POST['dueInValEdit'];
    $dueInNewVal = $_POST['dueInValEditNew'];
    
    DueInAdmin::editDueInVal($dueInOldVal, $dueInNewVal);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Logic to perform access control operations

if(isset($_POST['submitDelAdmin'])){
    $delAdmin = $_POST['delAdmin'];
    
    UserAdminPermissions::removeAdmin($delAdmin);
}

if(isset($_POST['submitNewAdmin'])){
    $userAdmin = $_POST['userAdmin'];
    
    UserAdminPermissions::setAdmin($userAdmin);
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="activityLog.php"><i class="fas fa-book" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Activity Log</span></a></li>
                    <?php if($isAdmin == 1){ echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="admin.php"><i class="fas fa-users-cog" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Admin</span></a></li>'; }?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="fas fa-door-open" style="color: #000000;"></i><span style="color: rgba(0,0,0,0.8);">Logout</span></a></li>
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
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Notifications center</h6>
                                            
                                        <?php Notify::getNotifications();
                                        Notify::checkStatus();
                                        ?>
                                        
                                  <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </li>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php Profile::getActiveUser(); ?></span><img class="border rounded-circle img-profile" src="<?php Profile::getProfilePic();?>"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" role="presentation" href="change-password.php"><i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Change Password</a>
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
                <div class="col-lg-12">
                    <h3 class="text-dark mb-1">Admin Panel</h3>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-dark mb-1">Manage The Form Options</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div role="tablist" id="accordion-1">
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1">Country</a></h5>
                    </div>
                    <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getCountryFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalLogin" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalLogin">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list</p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="newCountry" id="newCountry" placeholder="New Country Name"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="deptID" id="deptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button class="btn btn-dark btn-block" type="submit" name="submitNewCountry" id="submitNewCountry">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditCountry" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalEditCountry">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example South Africa, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="countryValEdit" placeholder="Country value To Edit" id="countryValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="countryValEditNew" placeholder="New Country Value" id="countryValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditCountry" id="submitEditCountry" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelCountry" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modalDelCountry">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 514<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="countryValDel" placeholder="Country value To Delete" id="countryValDel"></div>
                                                            <div class="form-group"><button name="submitDelCountry" id="submitDelCountry" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2">OU</a></h5>
                    </div>
                    <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getOUFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalCount" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalCount">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="ouVal" placeholder="OU value" id="ouVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="ouDeptID" id="ouDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitOU" id="submitOU" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditOU" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                
                                       <div class="modal fade" role="dialog" tabindex="-1" id="modalEditOU">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="ouValEdit" placeholder="OU value To Edit" id="ouValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="ouValEditNew" placeholder="New OU Value" id="ouValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditOU" id="submitEditOU" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                </div>
                                <div class="col"><button class="btn btn-danger" data-toggle="modal" data-target="#modalDelOU" type="button" style="font-size: 14px;">Delete</button>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modalDelOU">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 514<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="ouValDel" placeholder="OU value To Delete" id="ouValDel"></div>
                                                            <div class="form-group"><button name="submitDelOU" id="submitDelOU" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3">Entity</a></h5>
                    </div>
                    <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getEntityFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalEntity" type="button" style="font-size: 14px;">Add New</button>
                                            <div class="modal fade" role="dialog" tabindex="-1" id="modalEntity">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="entityVal" placeholder="Entity value" id="entityVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="entDeptID" id="entDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitEntity" id="submitEntity" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditEntity" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalEditEntity">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="entityValEdit" placeholder="Entity value To Edit" id="entityValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="entityValEditNew" placeholder="New Entity Value" id="entityValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditEntity" id="submitEditEntity" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelEntity" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalDelEntity">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 514<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="entityValDel" placeholder="Entity value To Delete" id="entityValDel"></div>
                                                            <div class="form-group"><button name="submitDelEntity" id="submitDelEntity" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4">Particulars</a></h5>
                    </div>
                    <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getTaskFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalParticulars" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalParticulars">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="particularsVal" placeholder="Particulars value" id="particularsVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="partDeptID" id="partDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitParticulars" id="submitParticulars" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-target="#modalEditParticulars" data-toggle="modal" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalEditParticulars">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="particularsValEdit" placeholder="Particulars value To Edit" id="particularsValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="particularsValEditNew" placeholder="New Particulars Value" id="particularsValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditParticulars" id="submitEditParticulars" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelParticulars" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modalDelParticulars">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 514<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="particularsValDel" placeholder="Particulars value To Delete" id="particularsValDel"></div>
                                                            <div class="form-group"><button name="submitDelParticulars" id="submitDelParticulars" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-5" href="div#accordion-1 .item-5">FY</a></h5>
                    </div>
                    <div class="collapse item-5" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getFYFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalFY" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalFY">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="fyVal" placeholder="FY value" id="fyVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="fyDeptID" id="fyDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitFY" id="submitFY" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditFY" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modalEditFY">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="fyValEdit" placeholder="FY value To Edit" id="fyValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="fyValEditNew" placeholder="New FY Value" id="fyValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditFY" id="submitEditFY" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="modalDelFY" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalDelFY">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 2017 - 18<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="fyValDel" placeholder="FY value To Delete" id="fyValDel"></div>
                                                            <div class="form-group"><button name="submitDelFY" id="submitDelFY" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-6" href="div#accordion-1 .item-6">Periodicity</a></h5>
                    </div>
                    <div class="collapse item-6" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getPeriodFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalPeriod" type="button" style="font-size: 14px;">Add New</button>
                                            <div class="modal fade" role="dialog" tabindex="-1" id="modalPeriod">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="periodVal" placeholder="Periodicity value" id="periodVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="periodDeptID" id="periodDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitPeriod" id="submitPeriod" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditPeriod" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                  <div class="modal fade" role="dialog" tabindex="-1" id="modalEditPeriod">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="periodValEdit" placeholder="Periodicity value To Edit" id="periodValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="periodValEditNew" placeholder="New Periodicity Value" id="periodValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditPeriod" id="submitEditPeriod" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelPeriod" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalDelPeriod">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 2017 - 18<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="periodValDel" placeholder="Periodicity value To Delete" id="periodValDel"></div>
                                                            <div class="form-group"><button name="submitDelPeriod" id="submitDelPeriod" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-7" href="div#accordion-1 .item-7">Due For</a></h5>
                    </div>
                    <div class="collapse item-7" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getDueForFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalDueFor" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalDueFor">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueForVal" placeholder="Due For value" id="dueForVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="dueForDeptID" id="dueForDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitDueFor" id="submitDueFor" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditDueFor" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modalEditDueFor">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueForValEdit" placeholder="Due For value To Edit" id="dueForValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="dueForValEditNew" placeholder="New Due For Value" id="dueForValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditDueFor" id="submitEditDueFor" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-target="#modalDelDueFor" data-toggle="modal" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalDelDueFor">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 2017 - 18<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueForValDel" placeholder="Due For value To Delete" id="dueForValDel"></div>
                                                            <div class="form-group"><button name="submitDelDueFor" id="submitDelDueFor" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-8" href="div#accordion-1 .item-8">Due In Month</a></h5>
                    </div>
                    <div class="collapse item-8" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php GetTaxFormFieldParagraphs::getDueInFields(); ?>
                                </div>
                                <div class="col-lg-2">
                                    <div><button class="btn btn-success" data-toggle="modal" data-target="#modalDueIn" type="button" style="font-size: 14px;">Add New</button>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="modalDueIn">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Add New Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to add a new form field options to the form for people to fill out and submit. For example, You can add a new country to the existing list<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueInVal" placeholder="Due In value" id="dueInVal"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="dueInDeptID" id="dueInDeptID" placeholder="Department ID"></div>
                                                            <div class="form-group"><button name="submitDueIn" id="submitDueIn" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button data-toggle="modal" data-target="#modalEditDueIn" class="btn btn-warning text-center" type="button" style="font-size: 14px;">Edit</button>
                                
                                    <div class="modal fade" role="dialog" tabindex="-1" id="modalEditDueIn">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Edit Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to edit any fields that are incorrect, or have new requirements. Simply enter the value of the field you would like to edit, for example 514, followed by the value you wish to replace it with.<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueInValEdit" placeholder="Due In value To Edit" id="dueInValEdit"></div>
                                                            <div class="form-group"><input class="form-control" type="text" name="dueInValEditNew" placeholder="New Due In Value" id="dueInValEditNew"></div>
                                                            <div class="form-group"><button name="submitEditDueIn" id="submitEditDueIn" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelDueIn" class="btn btn-danger" type="button" style="font-size: 14px;">Delete</button>
                                
                                     <div class="modal fade" role="dialog" tabindex="-1" id="modalDelDueIn">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Delete Form Field Options<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to remove any fields that are no longer useful or necessary. Simply enter the value of the field you would like to delete, for example 2017 - 18<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="dueInValDel" placeholder="Due In value To Delete" id="dueInValDel"></div>
                                                            <div class="form-group"><button name="submitDelDueIn" id="submitDelDueIn" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-9" href="div#accordion-1 .item-9">Access Control</a></h5>
                    </div>
                    <div class="collapse item-9" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php UserAdminPermissions::getUsers(); ?>
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalNewAdmin" class="btn btn-success" type="button" style="font-size: 14px;">Add New Admin</button>
                                
                                     <div class="modal fade" role="dialog" tabindex="-1" id="modalNewAdmin">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Give Admin Privileges To New User<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to grant admin privileges to a use. Simply input their employee ID and submit <br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="userAdmin" placeholder="User to make admin" id="userAdmin"></div>
                                                            <div class="form-group"><button name="submitNewAdmin" id="submitNewAdmin" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="col"><button data-toggle="modal" data-target="#modalDelAdmin" class="btn btn-danger" type="button" style="font-size: 14px;">Remove Admin</button>
                                
                                     <div class="modal fade" role="dialog" tabindex="-1" id="modalDelAdmin">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-primary">Revoke Admin Privileges For User<br></h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col padMar margenesCajas">
                                                                <p class="text-secondary p-0 m-0 p-2">You can use this form to revoke the admin privileges for any user. Simply enter their employee ID and submit<br></p>
                                                            </div>
                                                        </div>
                                                        <form action="admin.php" class="p-4" method="post">
                                                            <div class="form-group"><input class="form-control" type="text" name="delAdmin" placeholder="User to remove" id="delAdmin"></div>
                                                            <div class="form-group"><button name="submitDelAdmin" id="submitDelAdmin" class="btn btn-dark btn-block" type="submit">Submit</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
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
</body>

</html>