<?php
include('classes/DB.php');
include('classes/Login.php');
$tokenIsValid = False;

$errors = array();

if (Login::isLoggedIn()) {

        if (isset($_POST['changePassword'])) {
            
            
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
    
            
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword'];
                $newPasswordRepeat = $_POST['newPasswordRepeat'];
                $userID = Login::isLoggedIn();

                if (password_verify($oldPassword, DB::query('SELECT password FROM users WHERE empID=:userID', array(':userID'=>$userID))[0]['password'])) {

                        if ($newPassword == $newPasswordRepeat) {

                                if (strlen($newPassword) >= 6 && strlen($newPassword) <= 60) {

                                        DB::query('UPDATE users SET password=:newPassword WHERE empID=:userID', array(':newPassword'=>password_hash($newPassword, PASSWORD_BCRYPT), ':userID'=>$userID));
                                        echo 'Password changed successfully!';
                                    
                                    header('Location: login.php');
                                }
                            
                            else{
                                $err = "Invalid password. Doesn't match minimum character length of 6 or exceeds maximum character length of 60.";
                                 array_push($errors, $err);
                            }
                        } 
                    
                    else {
                            
                                $err = 'Passwords don\'t match!';
                                array_push($errors, $err);
                        }

                } else {
                        $err = 'Incorrect old password!';
                        array_push($errors, $err);
                    
                }

            }
        }

} else {
        if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (DB::query('SELECT empID FROM password_tokens WHERE token = :token', array(':token'=>sha1($token)))) {
                $userID = DB::query('SELECT empID FROM password_tokens WHERE token = :token', array(':token'=>sha1($token)))[0]['empID'];
                $tokenIsValid = True;
                if (isset($_POST['changePassword'])) {
                    
                    
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
    

                        $newPassword = $_POST['newPassword'];
                        $newPasswordRepeat = $_POST['newPasswordRepeat'];

                                if ($newPassword == $newPasswordRepeat) {

                                        if (strlen($newPassword) >= 6 && strlen($newPassword) <= 60) {

                                                DB::query('UPDATE users SET password = :newPassword WHERE empID = :userID', array(':newPassword'=>password_hash($newPassword, PASSWORD_BCRYPT), ':userID'=>$userID));
                                                echo 'Password changed successfully!';
                                                DB::query('DELETE FROM password_tokens WHERE empID = :userID', array(':userID'=>$userID));
                                                
                                            
                                            header('Location: login.php');
                                        }

                                } else {
                                    $err = 'Passwords don\'t match!';
                                    array_push($errors, $err);
                                }
                    }
                    
                    else {
                        $err = 'ReCaptcha Verification failed';
                        array_push($errors, $err);
                    }
                }


        } else {
                die('Token invalid');
        }
} 
    
    else {
        die('Not logged in');
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
    <script src="https://www.google.com/recaptcha/api.js?render=6LexmdkUAAAAAMRZ8X2k7cFIt7MiUA1zqEPYiVmg"></script>
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
                                        <h4 class="text-dark mb-4" style="color: #2a2a2a;">Reset Your Password Below</h4>
                                        
                                         <?php if(count($errors) > 0){
                                            foreach($errors as $error){
                                            echo "<div><p class='text-danger'>".$error."</p></div>";
                                        }
                                        }?>
                                        
                                    </div>
                                    <form class="user" method="post" <?php if(!Login::isLoggedIn()){$token = $_GET['token']; echo 'action = "change-password.php?token='.$token.'"';} else{echo 'action="change-password.php"';}?>>
                                        
                                        <?php if(Login::isLoggedIn()){echo '<div class="form-group"><input class="form-control form-control-user" type="password" id="oldPassword" aria-describedby="emailHelp" placeholder="Old Password" name="oldPassword"></div>';}?>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="newPassword" aria-describedby="emailHelp" placeholder="New Password" name="newPassword"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="newPasswordRepeat" placeholder="Repeat New Password" name="newPasswordRepeat"></div>
                                        <input type="hidden" id="token" name="token">
                                        <div class="form-group">
                                        </div><button class="btn btn-light btn-block text-light btn-user" type="submit" name="changePassword" id="changePassword" style="background-color: #3c3d41;font-size: 16px;color: #ffffff;">Reset Password</button></form><br>
                                    <div
                                        class="text-center"><a class="text-dark small" href="login.php">Made a mistake? Click here to login or go back to the dashboard</a></div>
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