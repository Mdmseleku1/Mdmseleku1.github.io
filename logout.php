<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (!Login::isLoggedIn()) {
        header('Location: login.php');
}

if (isset($_POST['confirm'])) {

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

?>
<h1>Logout of your Account?</h1>
<p>Are you sure you'd like to logout?</p>
<form action="logout.php" method="post">
        <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>