<?php
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
?>