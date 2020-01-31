<?php

class Profile{
    
    public static function getActiveUser(){
        $userID = Login::isLoggedIn();

        $name = DB::query('SELECT firstName FROM users WHERE empID = :empID', array(':empID' => $userID))[0]['firstName'];
        $surname = DB::query('SELECT lastName FROM users WHERE empID = :empID', array(':empID' => $userID))[0]['lastName'];
        
        echo $name.' '.$surname;
    }
    
}


?>