<?php

include('./classes/DB.php');
include('./classes/Login.php');

$errors = array();

if (isset($_POST['login'])) {
    
        $empID = $_POST['empID'];
        $password = $_POST['password'];
        $id = 0;

    if(empty($empID)){
        $err = 'Field cannot be empty';
        array_push($errors, $err);
    }
    
    else{
        if (DB::query('SELECT empID FROM users WHERE empID=:empID', array(':empID'=>$empID))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE empID=:empID', array(':empID'=>$empID))[0]['password'])) {
                        echo 'Logged in!';
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT empID FROM users WHERE empID=:empID', array(':empID'=>$empID))[0]['empID'];
                        DB::query('INSERT INTO login_tokens VALUES (:id, :token, :empID)', array(':id'=> $id,':token'=>sha1($token), ':empID'=>$user_id));

                        setcookie("complianceSession", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("complianceSession_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                    
                        header('Location: index.php');

                } else {
                    $err = 'Incorrect Password';
                    array_push($errors, $err);
                }

        } else {
                $err = 'No such user in our records';
                array_push($errors, $err);
        }
    }

}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Zensar compliance tracker</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-gradient-primary" style="background-color: #092c6e;background-image: url(&quot;none&quot;);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10" style="background-color: #eb192e;">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/zensar.jpg&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;"></div>
                            </div>
                            <div class="col-lg-6" style="background-color: #ffffff;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="color: #2a2a2a;">Welcome Back!</h4>
                                        
                                         <?php if(count($errors) > 0){
                                            foreach($errors as $error){
                                            echo "<div><p class='text-danger'>".$error."</p></div>";
                                        }
                                        }?>
                                        
                                    </div>
                                    <form class="user" method="post" action="login.php">
                                        
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="empID" aria-describedby="emailHelp" placeholder="Enter Staff ID" name="empID"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Enter Password" name="password"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="remember"><label class="form-check-label text-dark custom-control-label" for="remember">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-light btn-block text-light btn-user" type="submit" name="login" id="login" style="background-color: #3c3d41;font-size: 16px;color: #ffffff;">Login</button></form><br>
                                    <div
                                        class="text-center"><a class="text-dark small" href="forgot-password.php">Forgot Password? Click Here To Reset It</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>