<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (!Login::isLoggedIn()) {
        header('Location: login.php');
}

if (isset($_POST['confirm'])) {
    
     $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
			'secret' => "your_secret_key",
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

        if (isset($_POST['alldevices'])) {

                DB::query('DELETE FROM login_tokens WHERE empID=:empID', array(':empID'=>Login::isLoggedIn()));

        } else {
                if (isset($_COOKIE['complianceSession'])) {
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['complianceSession'])));
                }
                setcookie('complianceSession', '', time()-3600);
                setcookie('complianceSession_', '', time()-3600);
        }
    
    header('Location: login.php');
            
    }

}

?>
<html>
<head>
<script src="https://www.google.com/recaptcha/api.js?render=your_site_key"></script>
</head>
<body>
<h1>Logout of your Account?</h1>
<p>Are you sure you'd like to logout?</p>
<form action="logout.php" method="post">
    <input type="hidden" id="token" name="token">
        <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>
<script>
          grecaptcha.ready(function() {
              grecaptcha.execute('your_site_key', {action: 'homepage'}).then(function(token) {
                 // console.log(token);
                 document.getElementById("token").value = token;
              });
          });
    </script>
</body>
</html>
