<?php

class Task{
    
        public static function getYearlyTasks(){
                Task::getJanTasks();
				Task::getFebTasks();
				Task::getMarTasks();
				Task::getAprTasks();
				Task::getMayTasks();
				Task::getJunTasks();
				Task::getJulTasks();
				Task::getAugTasks();
				Task::getSeptTasks();
				Task::getOctTasks();
				Task::getNovTasks();
				Task::getDecTasks();
        }
    
        public static function getMonTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "Monthly";
        
        $upcomingTasks = DB::query('SELECT description, country, ou, dueIn, entity FROM taxduetasks WHERE dueIn = :dueIn ORDER BY dueFor DESC;', array(':dueIn'=> $dueIn1));
        
        foreach($upcomingTasks as $due){
            echo '<p>Task: '.$due['description'].'</br> Country: '.$due['country'].'</br> Entity: '.$due['entity'].'<hr></p>';
        }
    }
    
    public static function getJanTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "1";
        $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Jan</h2>
			</div>
			<div class="col-10" id="janTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Jan</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noJanTasks" class="alert alert-info" style="display: none;">No January due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
            }
        }
        
        else {
            echo '';
        }
    }
    
    public static function getFebTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "2";
        $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Feb</h2>
			</div>
			<div class="col-10" id="febTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Feb</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noFebTasks" class="alert alert-info" style="display: none;">No February due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getMarTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "3";
        $today = date('Ymd');
        $dueMonth = '';
            
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1,':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Mar</h2>
			</div>
			<div class="col-10" id="marTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Mar</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noMarTasks" class="alert alert-info" style="display: none;">No March due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getAprTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "4";
        $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
           $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            if($dueDate > $today){
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Apr</h2>
			</div>
			<div class="col-10" id="aprTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Apr</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noAprTasks" class="alert alert-info" style="display: none;">No April due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
    
    public static function getMayTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "5";
        $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>May</h2>
			</div>
			<div class="col-10" id="mayTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In May</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noMayTasks" class="alert alert-info" style="display: none;">No May due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
     public static function getJunTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "6";
         $today = date('Ymd');
        $dueMonth = '';
         
         if(DB::query('SELECT dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0))){
        
        $upcomingTasks = DB::query('SELECT dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center">
				<h1 class="display-4"><span class="badge date-green"></span></h1>
				<h2>Jun</h2>
			</div>
			<div class="col-10" id="juneTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In June</strong></h3>
				
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noJuneTasks" class="alert alert-info" style="display: none;">No June due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            }
        }
     }
         
         else {
             echo '';
         }
    }
    
       public static function getJulTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "7";
           $today = date('Ymd');
        $dueMonth = '';
        $dueDate = '';   
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0))){
           
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            
            if($dueDate > $today){
            
            
            echo '
            
                   <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Jul</h2>
			</div>
			<div class="col-10" id="julyTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In July</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noJulyTasks" class="alert alert-info" style="display: none;">No July due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            }
        }
       }
           
           else {
               echo '';
           }
    }
    
        public static function getAugTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "8";
            $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status' => 0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Feb</h2>
			</div>
			<div class="col-10" id="augTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Aug</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noAugTasks" class="alert alert-info" style="display: none;">No August due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getSeptTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "9";
            $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Sept</h2>
			</div>
			<div class="col-10" id="septTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Sept</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noSeptTasks" class="alert alert-info" style="display: none;">No September due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getOctTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "10";
            $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Oct</h2>
			</div>
			<div class="col-10" id="octTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Oct</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noOctTasks" class="alert alert-info" style="display: none;">No October due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getNovTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "11";
            $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1,':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Nov</h2>
			</div>
			<div class="col-10" id="novTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In Nov</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noNovTasks" class="alert alert-info" style="display: none;">No November due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
    
        public static function getDecTasks(){
        $userID = Login::isLoggedIn();
        $dueIn1 = "12";
            $today = date('Ymd');
        $dueMonth = '';
        
        if(DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status', array(':dueIn'=> $dueIn1, ':status'=>0))){
            
        $upcomingTasks = DB::query('SELECT task, dueMonth, dueYear, dueDay FROM task_details WHERE dueMonth = :dueIn AND status = :status ORDER BY id DESC;', array(':dueIn'=> $dueIn1, ':status'=>0));
        
        foreach($upcomingTasks as $due){
            
            $dueMonth = $due['dueMonth'];
            
            if($dueMonth < 10){
              if($due['dueDay'] < 10){
                        $dueDate = $due['dueYear'].'0'.$dueMonth.'0'.$due['dueDay'];
                     }
                     
                     else{
                        $dueDate = $due['dueYear'].'0'.$dueMonth.$due['dueDay'];
                     }
            }
            
            else{
                
                $dueDate = $due['dueYear'].$dueMonth.$due['dueDay'];
            }
            
            if($dueDate > $today){
            
            
            echo '
            
            <div class="row row-striped">
			<div class="col-2 text-center ">
				<h1 class="display-4 "><span class="badge date-green"></span></h1>
				<h2>Dec</h2>
			</div>
			<div class="col-10" id="decTasks">
				<h3 class="text-uppercase"><strong>Tasks Due In December</strong></h3>
				<p>Task: '.$due['task'].'</br> Due: '.$due['dueDay'].'/'.$due['dueMonth'].'/'.$due['dueYear'].'<hr></p>
                <h5 id="noDecTasks" class="alert alert-info" style="display: none;">No December due date for the selected task.</h5>
			</div>
		</div>
            
            ';
            
            }
        }
        }
        
        else {
            echo '';
        }
    }
}

?>