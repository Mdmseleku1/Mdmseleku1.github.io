<?php

class GenerateReport{
    
    public static function getTaxReportData(){
        
        $empID = Login::isLoggedIn();
        
        $compliedItems = DB::query('SELECT sNo, description, country, ou, entity, period, fy, dueFor, dueIn, empID, compliedOn, compliedOnMon FROM tax WHERE empID = :empID ORDER BY sNo DESC;', array(':empID'=>$empID));
        
            $earlyTasks = 0;
            $onTimeTasks = 0;
            $lateTasks = 0;
            $lateTasks2 = 0;
        
        foreach($compliedItems as $comp) {
            
            $dateTime1 = strtotime($comp['dueIn']);
            $dateTime2 = $comp['compliedOnMon'];
            $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
            $dateTimeCompare = strtotime($dateStringCompare);
            
            if($dateTime1 > $dateTimeCompare){
                $class = "alert-success";
                $earlyTasks++;
            }
            
            else if($dateTime1 < $dateTimeCompare){
                $class = "alert-danger";
                $lateTasks++;
            }
            
            else{
                $class = "alert-warning";
                $onTimeTasks++;
            }
            
            echo "<tr>
                <td>".$comp['sNo']."</td>
                <td>".$comp['country']."</td>
                <td>".$comp['ou']."</td>
                <td>".$comp['entity']."</td>
                <td>".$comp['description']."</td>
                <td>".$comp['fy']."</td>
                <td>".$comp['period']."</td>
	            <td>".$comp['dueFor']."</td>
	            <td>".$comp['dueIn']."</td>
                <td class='alert ".$class."'>".$comp['compliedOn']."</td>
                </tr>";
        }
        
        if(DB::query('SELECT sNo FROM tax WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){
            
        $id = 0;
        
        DB::query('INSERT INTO tracktaskprogress VALUES (:id, :early, :onTime, :late, :empID)', array(':id'=>$id, ':early'=>$earlyTasks, ':onTime'=>$onTimeTasks, ':late'=>$lateTasks, ':empID'=> Login::isLoggedIn()));
            
        }
    }
    
    public static function getTaskProgress(){
        
        if(DB::query('SELECT early FROM tracktaskprogress WHERE empID = :empID', array(':empID'=>Login::isLoggedIn()))){
            
        $early = DB::query('SELECT early FROM tracktaskprogress WHERE empID = :empID ORDER BY id DESC LIMIT 1', array(':empID'=>Login::isLoggedIn()))[0]['early'];
            
        }
           
            else{
                $early = 0;
            }
           
           
        if(DB::query('SELECT onTime FROM tracktaskprogress WHERE empID = :empID',array(':empID'=>Login::isLoggedIn()))){
            
        $onTime = DB::query('SELECT onTime FROM tracktaskprogress WHERE empID = :empID ORDER BY id DESC LIMIT 1', array(':empID'=>Login::isLoggedIn()))[0]['onTime'];
            
        }
           
           else {
               $onTime = 0;
           }
           
           
        if(DB::query('SELECT late FROM tracktaskprogress WHERE empID = :empID',array(':empID'=>Login::isLoggedIn()))){
            
        $late = DB::query('SELECT late FROM tracktaskprogress WHERE empID = :empID ORDER BY id DESC LIMIT 1', array(':empID'=>Login::isLoggedIn()))[0]['late'];
            
        }
           
           else{
               $late = 0;
           }
        
        if($early == 0 && $onTime == 0 && $late == 0){
            
            echo '<br><br><section><p>No chart data to display yet. Start adding tasks to track compliance.</p></section>';
        }
        
        else {
            
            echo '<section><br><br>
                    <div style="background-color: transparent;">
                        <h1 style="font-size: 26px;padding-left: 14px;">Compliance Overview</h1>
                        <div style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Early&quot;,&quot;In Progress/ On Time&quot;,&quot;Late / Not complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:[&quot;#52ff00&quot;,&quot;rgb(255,188,110)&quot;,&quot;#ff0000&quot;],&quot;borderColor&quot;:[&quot;transparent&quot;,&quot;transparent&quot;,&quot;transparent&quot;],&quot;data&quot;:[&quot;'.$early.'&quot;,&quot;'.$onTime.'&quot;,&quot;'.$late.'&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false}}}"></canvas></div>
                        <div
                            style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Early&quot;,&quot;On Time&quot;,&quot;Late / Not complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#fbb778&quot;,&quot;borderColor&quot;:&quot;transparent&quot;,&quot;borderWidth&quot;:&quot;1&quot;,&quot;data&quot;:[&quot;'.$early.'&quot;,&quot;'.$onTime.'&quot;,&quot;'.$late.'&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}]}}}"></canvas></div>
            </div>
            </section>';
        }
    }
    
    public static function getLateTasks(){
        
        if(DB::query('SELECT late FROM tracktaskprogress WHERE empID = :empID',array(':empID'=>Login::isLoggedIn()))){
        
        $late = DB::query('SELECT late FROM tracktaskprogress WHERE empID = :empID ORDER BY id DESC LIMIT 1', array(':empID'=>Login::isLoggedIn()))[0]['late'];
        
        $empID = Login::isLoggedIn();
        
        $compliedItems = DB::query('SELECT sNo, description, country, ou, entity, period, fy, dueFor, dueIn, empID, compliedOn, compliedOnMon FROM tax WHERE empID = :empID ORDER BY sNo DESC;', array(':empID'=>$empID));
        
            foreach($compliedItems as $comp) {
            
            $dateTime1 = strtotime($comp['dueIn']);
            $dateTime2 = $comp['compliedOnMon'];
            $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
            $dateTimeCompare = strtotime($dateStringCompare);
            
            if($dateTime1 < $dateTimeCompare){
                echo '<div class="row">
                                        <div class="col-10">
                                            <h4>'.$comp['description'].'</h4>
                    <small class="text-muted">Was Due In '.$comp['dueIn'].' </small><br>
                    <small class="text-muted">Only Submitted In '.date("F", mktime(0, 0, 0, $comp['compliedOnMon'], 10)).' </small>
                                                            </div>
                                                        </div><br>';
                }

            
            }
        }
        
        else{
            echo'<p>No late / overdue tasks to display.</p>';
        }
    }
    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class GenerateAdminReport{
    
    public static function checkView(){
        
            if(!DB::query('SELECT view FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
         $view = 'viewOwn';  
                            
            }
                
            else {
            
         $view = DB::query('SELECT view FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view'];
                }
        
        return $view;
    }
    
        public static function checkView2(){
        
            if(!DB::query('SELECT view2 FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
         $view = 'viewOwn';  
                            
            }
                
            else {
            
         $view = DB::query('SELECT view2 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view2'];
                }
        
        return $view;
    }
    
            public static function checkView3(){
        
            if(!DB::query('SELECT view3 FROM view WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){ 
                            
         $view = 'viewOwn';  
                            
            }
                
            else {
            
         $view = DB::query('SELECT view3 FROM view WHERE empID =:empID', array(':empID'=> Login::isLoggedIn()))[0]['view3'];
                }
        
        return $view;
    }

    
     public static function getAdminTaxReportData(){
        
        $empID = Login::isLoggedIn();
        $isAdmin = DB::query('SELECT isAdmin FROM users WHERE empID = :empID', array(':empID'=> $empID))[0]['isAdmin'];
        
        $compliedItems = DB::query('SELECT sNo, description, country, ou, entity, period, fy, dueFor, dueIn, empID, compliedOn, compliedOnMon FROM tax');
        
            $earlyTasks = 0;
            $onTimeTasks = 0;
            $lateTasks = 0;
            $lateTasks2 = 0;
        
        foreach($compliedItems as $comp) {
            
            $dateTime1 = strtotime($comp['dueIn']);
            $dateTime2 = $comp['compliedOnMon'];
            $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
            $dateTimeCompare = strtotime($dateStringCompare);
            
            if($dateTime1 > $dateTimeCompare){
                $class = "alert-success";
                $earlyTasks++;
            }
            
            else if($dateTime1 < $dateTimeCompare){
                $class = "alert-danger";
                $lateTasks++;
            }
            
            else{
                $class = "alert-warning";
                $onTimeTasks++;
            }
            
            echo "<tr>
                <td>".$comp['sNo']."</td>
                <td>".$comp['country']."</td>
                <td>".$comp['ou']."</td>
                <td>".$comp['entity']."</td>
                <td>".$comp['description']."</td>
                <td>".$comp['fy']."</td>
                <td>".$comp['period']."</td>
	            <td>".$comp['dueFor']."</td>
	            <td>".$comp['dueIn']."</td>
                <td class='alert ".$class."'>".$comp['compliedOn']."</td>
                </tr>";
        }
        
        if(DB::query('SELECT sNo FROM tax WHERE empID = :empID', array(':empID'=> Login::isLoggedIn()))){
            
        $id = 0;
        
        DB::query('INSERT INTO tracktaskprogress VALUES (:id, :early, :onTime, :late, :empID)', array(':id'=>$id, ':early'=>$earlyTasks, ':onTime'=>$onTimeTasks, ':late'=>$lateTasks, ':empID'=> Login::isLoggedIn()));
            
        }
    }
    
        public static function getAdminLateTasks(){
        
        $empID = Login::isLoggedIn();
        
        $compliedItems = DB::query('SELECT sNo, description, country, ou, entity, period, fy, dueFor, dueIn, empID, compliedOn, compliedOnMon FROM tax ORDER BY sNo DESC;');
        
            foreach($compliedItems as $comp) {
            
            $dateTime1 = strtotime($comp['dueIn']);
            $dateTime2 = $comp['compliedOnMon'];
            $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
            $dateTimeCompare = strtotime($dateStringCompare);
            
            if($dateTime1 < $dateTimeCompare){
                echo '<div class="row">
                                        <div class="col-10">
                                            <h4>'.$comp['description'].'</h4>
                    <small class="text-muted">Was Due In '.$comp['dueIn'].' </small><br>
                    <small class="text-muted">Only Submitted In '.date("F", mktime(0, 0, 0, $comp['compliedOnMon'], 10)).' </small>
                                                            </div>
                                                        </div><br>';
                }

            
            }
        }
    
        public static function getAdminTaskProgress(){
        
        $empID = Login::isLoggedIn();
        
        $compliedItems = DB::query('SELECT sNo, dueIn, empID, compliedOn, compliedOnMon FROM tax ORDER BY sNo DESC;');
        
            $earlyTasks = 0;
            $onTimeTasks = 0;
            $lateTasks = 0;
            $lateTasks2 = 0;
        
        foreach($compliedItems as $comp) {
            
            $dateTime1 = strtotime($comp['dueIn']);
            $dateTime2 = $comp['compliedOnMon'];
            $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
            $dateTimeCompare = strtotime($dateStringCompare);
            
            if($dateTime1 > $dateTimeCompare){
                $earlyTasks++;
            }
            
            else if($dateTime1 < $dateTimeCompare){
                $lateTasks++;
            }
            
            else{
                $onTimeTasks++;
            }   
            
        }
            
            echo '<section><br><br>
                    <div style="background-color: transparent;">
                        <h1 style="font-size: 26px;padding-left: 14px;">Compliance Overview</h1>
                        <div style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Early&quot;,&quot;In Progress/ On Time&quot;,&quot;Late / Not complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:[&quot;#52ff00&quot;,&quot;rgb(255,188,110)&quot;,&quot;#ff0000&quot;],&quot;borderColor&quot;:[&quot;transparent&quot;,&quot;transparent&quot;,&quot;transparent&quot;],&quot;data&quot;:[&quot;'.$earlyTasks.'&quot;,&quot;'.$onTimeTasks.'&quot;,&quot;'.$lateTasks.'&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false}}}"></canvas></div>
                        <div
                            style="width: 255px;height: 140px;"><canvas data-bs-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Early&quot;,&quot;On Time&quot;,&quot;Late / Not complied&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#fbb778&quot;,&quot;borderColor&quot;:&quot;transparent&quot;,&quot;borderWidth&quot;:&quot;1&quot;,&quot;data&quot;:[&quot;'.$earlyTasks.'&quot;,&quot;'.$onTimeTasks.'&quot;,&quot;'.$lateTasks.'&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{&quot;display&quot;:false},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgba(255,19,19,0.1)&quot;,&quot;zeroLineColor&quot;:&quot;rgba(255,19,19,0.1)&quot;}}]}}}"></canvas></div>
            </div>
            </section>';
            
        
    }
        
    }
    
?>