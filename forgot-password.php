<?php
include('./classes/DB.php');
include('./classes/Login.php');

$errors = array();

if (isset($_POST['resetpassword'])) {
        include('./classes/Mail.php');
    
        $email = $_POST['email'];
    
        if(DB::query('SELECT empID FROM users WHERE email=:email', array(':email'=>$email))){
            
        $empID = DB::query('SELECT empID FROM users WHERE email=:email', array(':email'=>$email))[0]['empID'];
            
        $id = 0; 

        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            
                        
        echo '<div><strong>An email has been sent to you with instructions to change your password. Please check your inbox.</strong></div>';

        echo'<a href="http://localhost/zenCompliance/change-password.php?token='.$token.'&email='.$email.'">localhost/zenCompliance/change-password.php?token='.$token.'</a>';

        DB::query('INSERT INTO password_tokens VALUES (:id, :token, :empID)', array(':id'=>$id,':token'=>sha1($token), ':empID'=>$empID));
            
        Mail::sendMail('Forgot Password!', "<a href='http://localhost/zenCompliance/change-password.php?token=$token'>http://localhost/zenCompliance/change-password.php?token=$token</a>", $email);
                        
        }
    
     else {
        $err = "No such user in our records";
        array_push($errors, $err);
    }
}

if(Login::isLoggedIn()){
    header('Location: index.php'); 
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forgotten Password - Zensar compliance tracker</title>
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
            <div class="col-md-9 col-lg-12 col-xl-10" style="background-color: #ffffff;">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(&quot;assets/img/zensar.jpg&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-2">Forgot Your Password?</h4>
                                        <p class="mb-4">We get it, we wll forget stuff somtimes. Just enter your email address below and we'll send you a link to reset your password!</p>
                                    </div>
                                    
                                    <?php if(count($errors) > 0){
                                            foreach($errors as $error){
                                            echo "<div><p class='text-danger'>".$error."</p></div>";
                                        }
                                        }?>
                                        
                                    
                                    <form class="user" method="post" action="forgot-password.php">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div><button class="btn btn-primary btn-block text-white btn-user"
                                            type="submit" name="resetpassword" id="resetpassword" style="background-color: #092c6e;">Reset Password</button></form><br>
                                    <div class="text-center"><a class="small" href="login.php">Click Here By Accident? Use This To Go Back To Login</a></div>
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