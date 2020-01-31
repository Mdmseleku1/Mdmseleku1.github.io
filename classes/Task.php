<?php

class Task{
    
        public static function getMonTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "Monthly";
        
        $upcomingTasks = DB::query('SELECT description, country, ou, dueIn, entity FROM taxduetasks WHERE dueIn = :dueIn ORDER BY dueFor DESC;', array(':dueIn'=> $dueIn1));
        
        foreach($upcomingTasks as $due){
            echo '<p>Task: '.$due['description'].'</br> Country: '.$due['country'].'</br> Entity: '.$due['entity'].'<hr></p>';
        }
    }
    
    public static function getMayTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "May";
        
        $upcomingTasks = DB::query('SELECT description, country, ou, dueIn, entity FROM taxduetasks WHERE dueIn = :dueIn ORDER BY dueFor DESC;', array(':dueIn'=> $dueIn1));
        
        foreach($upcomingTasks as $due){
            echo '<p>Task: '.$due['description'].'</br> Country: '.$due['country'].'</br> Entity: '.$due['entity'].'<hr></p>';
        }
    }
    
     public static function getJunTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "June";
        
        $upcomingTasks = DB::query('SELECT description, country, ou, dueIn, entity FROM taxduetasks WHERE dueIn = :dueIn ORDER BY dueFor DESC;', array(':dueIn'=> $dueIn1));
        
        foreach($upcomingTasks as $due){
            echo '<p>Task: '.$due['description'].'</br> Country: '.$due['country'].'</br> Entity: '.$due['entity'].'<hr></p>';
        }
    }
    
       public static function getJulTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "July";
        
        $upcomingTasks = DB::query('SELECT description, country, ou, dueIn, entity FROM taxduetasks WHERE dueIn = :dueIn ORDER BY dueFor DESC;', array(':dueIn'=> $dueIn1));
        
        foreach($upcomingTasks as $due){
            echo '<p>Task: '.$due['description'].'</br> Country: '.$due['country'].'</br> Entity: '.$due['entity'].'<hr></p>';
        }
    }
}

?>