<?php

class CountryAdmin{
    
       public static function addCountryVal($id, $countryVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT country FROM country_details WHERE country = :country', array(':country'=> $countryVal))){
            
        DB::query('INSERT INTO country_details VALUES(:id, :country, :deptID)', array(':id'=> $id, ':country'=> $countryVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That country already exists';
            array_push($errors, $err);
            echo 'That country already exists';
            return $errors;
            }
    }
    
     public static function editCountryVal($countryOldVal, $countryNewVal){
        
        if(DB::query('SELECT country FROM country_details WHERE country = :country', array(':country'=> $countryOldVal))){
            
            if(!DB::query('SELECT country FROM country_details WHERE country = :country', array(':country'=> $countryNewVal))){
            
        DB::query('UPDATE country_details SET country = :countryNew WHERE country = :countryOld', array(':countryNew'=> $countryNewVal, ':countryOld'=> $countryOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because country already exists';
            }
        }
    }
    
        public static function delCountryVal($countryValDel){
        
        if(DB::query('SELECT country FROM country_details WHERE country = :country', array(':country'=> $countryValDel))){
        
        DB::query('DELETE FROM country_details WHERE country = :country', array(':country'=>$countryValDel));
        echo 'Success';
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating OU form field data

class OUAdmin{
    
    public static function addOUVal($id, $ouVal, $deptID){
        
        if(!DB::query('SELECT ou FROM ou_details WHERE ou = :ou', array(':ou'=> $ouVal))){
            
        DB::query('INSERT INTO ou_details VALUES(:id, :ou, :deptID)', array(':id'=> $id, ':ou'=> $ouVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
    }
    
    public static function editOUVal($ouOldVal, $ouNewVal){
        
        if(DB::query('SELECT ou FROM ou_details WHERE ou = :ou', array(':ou'=> $ouOldVal))){
            
            if(!DB::query('SELECT ou FROM ou_details WHERE ou = :ou', array(':ou'=> $ouNewVal))){
            
        DB::query('UPDATE ou_details SET ou = :ouNew WHERE ou = :ouOld', array(':ouNew'=> $ouNewVal, ':ouOld'=> $ouOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because ou value already exists';
            }
        }
    }
        
        
    public static function delOUVal($ouValDel){
        
        if(DB::query('SELECT ou FROM ou_details WHERE ou = :ou', array(':ou'=> $ouValDel))){
        
        DB::query('DELETE FROM ou_details WHERE ou = :ou', array(':ou'=>$ouValDel));
        echo 'Success';
        }
    }
    
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating Entity form field data

class EntityAdmin{
    
       public static function addEntityVal($id, $entityVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT entity FROM entity_details WHERE entity = :entity', array(':entity'=> $entityVal))){
            
        DB::query('INSERT INTO entity_details VALUES(:id, :entity, :deptID)', array(':id'=> $id, ':entity'=> $entityVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That entity already exists';
            array_push($errors, $err);
            echo 'That entity already exists';
            return $errors;
            }
    }
    
     public static function editEntityVal($entityOldVal, $entityNewVal){
        
        if(DB::query('SELECT entity FROM entity_details WHERE entity = :entity', array(':entity'=> $entityOldVal))){
            
            if(!DB::query('SELECT entity FROM entity_details WHERE entity = :entity', array(':entity'=> $entityNewVal))){
            
        DB::query('UPDATE entity_details SET entity = :entityNew WHERE entity = :entityOld', array(':entityNew'=> $entityNewVal, ':entityOld'=> $entityOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because entity already exists';
            }
        }
    }
    
        public static function delEntityVal($entityValDel){
        
        if(DB::query('SELECT entity FROM entity_details WHERE entity = :entity', array(':entity'=> $entityValDel))){
        
        DB::query('DELETE FROM entity_details WHERE entity = :entity', array(':entity'=>$entityValDel));
        echo 'Success';
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating Particulars form field data

class ParticularsAdmin{
    
     public static function addParticularsVal($id, $particularsVal, $deptID, $taskType, $linkedTo, $dueMonth, $dueYear, $dueDay){
           
        $errors = array();
        $due = '';
        $due2 = $dueYear.'0'.$dueMonth.$dueDay;
        $status = 1;
        
        if(!DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsVal))){
            
            if($taskType == 2){
                
                $data = DB::query('SELECT task, dueYear, dueMonth, dueDay FROM task_details WHERE task = :task', array(':task'=>$linkedTo));
                
                foreach($data as $data){
                $due = $data['dueYear'].'0'.$data['dueMonth'].$data['dueDay'];
                }
                
                if($due2 < $due){
                    echo 'Cannot add a subtask with a due date later than the main task you linked it to';
                }
                
                else {
                    DB::query('INSERT INTO task_details VALUES(:id, :task, :deptID, :taskType, :linkedTo, :dueMonth, :dueYear, :dueDay)', array(':id'=> $id, ':task'=> $particularsVal, ':deptID'=>$deptID, ':taskType'=>$taskType, ':linkedTo'=> $linkedTo, ':dueMonth'=>$dueMonth, ':dueYear'=>$dueYear, ':dueDay'=>$dueDay));
                    echo 'Success';
                }
            }
            
            else {
                DB::query('INSERT INTO task_details VALUES(:id, :task, :deptID, :taskType, :linkedTo, :dueMonth, :dueYear, :dueDay)', array(':id'=> $id, ':task'=> $particularsVal, ':deptID'=>$deptID, ':taskType'=>$taskType, ':linkedTo'=> $linkedTo, ':dueMonth'=>$dueMonth, ':dueYear'=>$dueYear, ':dueDay'=>$dueDay));
                    echo 'Success';
            }
            
        }
           
        else{
            
            if(DB::query('SELECT task FROM task_details WHERE task = :task AND status = :status', array(':task'=> $particularsVal, ':status'=>$status))){
                DB::query('UPDATE task_details SET status = :status, linkedTo = :linkedTo, dueMonth = :dueMonth, dueYear = :dueYear, dueDay = :dueDay, deptID =:deptID, taskType = :taskType WHERE task = :task', array(':status'=>0, ':task'=>$particularsVal, ':linkedTo'=>$linkedTo, ':dueMonth'=>$dueMonth, ':dueYear'=> $dueYear, ':dueDay'=>$dueDay, ':deptID'=>$deptID, ':taskType'=>$taskType));
                echo 'Success';
            }
            
            else{
            
            $err = 'That particular already exists';
            array_push($errors, $err);
            echo 'That particular already exists';
            return $errors;
            }
        }
    }
    
     public static function editParticularsVal($particularsOldVal, $particularsNewVal, $dueMonth, $dueYear, $dueDay){
         
         $dueMonthS = '';
         $dueYearS = '';
         $dueDayS = '';
        
        if(DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsOldVal))){
            
            if(!DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsNewVal))){
                
                if(empty($dueMonth)){
                    $dueMonthS = DB::query('SELECT dueMonth FROM task_details WHERE task =:task', array(':task'=>$particularsOldVal))[0]['dueMonth'];
                }
                else{
                    $dueMonthS = $dueMonth;
                }
                
                if(empty($dueYear)){
                    $dueYearS = DB::query('SELECT dueYear FROM task_details WHERE task =:task', array(':task'=>$particularsOldVal))[0]['dueYear'];
                }
                else{
                    $dueYearS = $dueYear;
                }
                
                if($dueDay == 0){
                    $dueDayS = DB::query('SELECT dueDay FROM task_details WHERE task =:task', array(':task'=>$particularsOldVal))[0]['dueDay'];
                }
                else{
                    $dueDayS = $dueDay;
                }
            
        DB::query('UPDATE task_details SET task = :taskNew, dueMonth = :dueMonth, dueYear = :dueYear, dueDay = :dueDay WHERE task = :taskOld', array(':taskNew'=> $particularsNewVal, ':taskOld'=> $particularsOldVal, ':dueMonth'=>$dueMonthS, ':dueYear'=>$dueYearS, ':dueDay'=>$dueDayS));
        
        DB::query('UPDATE task_details SET linkedTo = :linkedTo WHERE linkedTo = :task', array(':linkedTo'=>$particularsNewVal, ':task'=>$particularsOldVal));        
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because particular already exists';
            }
        }
    }
    
        public static function delParticularsVal($particularsValDel){
        
        if(DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsValDel))){
            
            if(!DB::query('SELECT linkedTo FROM task_details WHERE linkedTo = :task', array(':task'=> $particularsValDel))){
        
        DB::query('DELETE FROM task_details WHERE task = :task', array(':task'=>$particularsValDel));
        echo 'Success';
                
                }
            
            else{
                echo 'Cannot delete task because it is a main task that has dependant tasks';
            }

            }
            
                        
            else{
                echo 'Cannot delete that task because it does not exist';
            }
        }
    
    
        public static function getMainTasks(){
            
            $taskType = 1;
            $notLinked = 0;
            $empty = '';
            $class = '';
            $status = 0;

            $mainTasks  = DB::query('SELECT id ,task, dueMonth, dueDay, dueYear FROM task_details WHERE taskType = :taskType AND status = :status ORDER BY id ASC LIMIT 5', array(':taskType'=>$taskType, ':status'=>0));
            
            foreach($mainTasks as $main){
                
                $subTasks = DB::query('SELECT * FROM task_details WHERE linkedTo != :notLinkedTo AND linkedTo != :empty AND linkedTo = :linkedToName AND status = :status', array(':notLinkedTo'=>$notLinked, ':empty'=>$empty, ':linkedToName'=>$main['task'], ':status'=>$status));
                
                $dateTime1 = strtotime($main['dueMonth']);
                $dateTime2 = date("m");
                $dateStringCompare = date("F", mktime(0, 0, 0, $dateTime2, 10));
                $dateTimeCompare = strtotime($dateStringCompare);
                
                $dueMonth = $main['dueMonth'];
                $dueMonthString = '';
                
                    switch($dueMonth){
        case '01':{
            $dueMonthString = 'January';
            break;
        }
        case '02':{
            $dueMonthString = 'February';
            break;
        }
        case '03':{
            $dueMonthString = 'March';
            break;
        }
        case '04':{
            $dueMonthString = 'April';
            break;
        }
        case '05':{
            $dueMonthString = 'May';
            break;
        }
        case '06':{
            $dueMonthString = 'June';
            break;
        }
        case '07':{
            $dueMonthString = 'July';
            break;
        }
        case '08':{
            $dueMonthString = 'August';
            break;
        }
        case '09':{
            $dueMonthString = 'September';
            break;
        }
        case '10':{
            $dueMonthString = 'October';
            break;
        }
        case '11':{
            $dueMonthString = 'November';
            break;
        }
        case '12':{
            $dueMonth = 'December';
            break;
            }
    }
                
                $dayComp = $main['dueDay'] - date('d'); 
                $monthComp = $main['dueMonth'] - date('m');
                $yearComp = $main['dueYear'] - date('Y');
                $dueDate = '';
                
                 if($dueMonth < 10){
                $dueDate = $main['dueYear'].'0'.$dueMonth.$main['dueDay'];
            }
            
            else{
                
                $dueDate = $main['dueYear'].$dueMonth.$main['dueDay'];
                }
                
                $today = date('Ymd');
                
                $dueComp = $dueDate - $today;
                
                if($dueComp > 30){
                    $class = 'alert-success';
                }
                
                else if($dueComp <= 30 && $dueComp > 7){
                    $class = 'alert-warning';
                }
                
                if($dueComp <= 7){
                    $class = 'flashit alert-danger';
                }

                if($dueDate > $today){
                      echo '
                            <div class="carousel-item col-sm-10">
                            <div class="card '.$class.'">
                              <div class="card-body">
                                <h4 class="card-title">'.$main['task'].'</h4><small class="text-muted">Parent task and all subtasks due by: '.$main['dueDay'].' '.$dueMonthString.'</small><hr>
                                ';
                
                foreach($subTasks as $task){
                    echo '
                          <p class="card-text">'.$task['task'].'.</p>
                          <p class="card-text"><small class="text-muted">Task is due: '.$task['dueDay'].' '.$task['dueMonth'].' '.$task['dueYear'].'</small></p>
                          
        
                    ';
                }
                
                echo'</div>
                            </div></div>
                          ';
                              
                      
            }
                }
            
        }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating FY form field data

class FYAdmin{
    
           public static function addFYVal($id, $fyVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT fy FROM fy_details WHERE fy = :fy', array(':fy'=> $fyVal))){
            
        DB::query('INSERT INTO fy_details VALUES(:id, :fy, :deptID)', array(':id'=> $id, ':fy'=> $fyVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That FY already exists';
            array_push($errors, $err);
            echo 'That FY already exists';
            return $errors;
            }
    }
    
     public static function editFYVal($fyOldVal, $fyNewVal){
        
        if(DB::query('SELECT fy FROM fy_details WHERE fy = :fy', array(':fy'=> $fyOldVal))){
            
            if(!DB::query('SELECT fy FROM fy_details WHERE fy = :fy', array(':fy'=> $fyNewVal))){
            
        DB::query('UPDATE fy_details SET fy = :fyNew WHERE fy = :fyOld', array(':fyNew'=> $fyNewVal, ':fyOld'=> $fyOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because FY already exists';
            }
        }
    }
    
        public static function delFYVal($fyValDel){
        
        if(DB::query('SELECT fy FROM fy_details WHERE fy = :fy', array(':fy'=> $fyValDel))){
        
        DB::query('DELETE FROM fy_details WHERE fy = :fy', array(':fy'=>$fyValDel));
        echo 'Success';
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating Periodicity form field data

class PeriodAdmin{
    
           public static function addPeriodVal($id, $periodVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT period FROM period_details WHERE period = :period', array(':period'=> $periodVal))){
            
        DB::query('INSERT INTO period_details VALUES(:id, :period, :deptID)', array(':id'=> $id, ':period'=> $periodVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That period already exists';
            array_push($errors, $err);
            echo 'That period already exists';
            return $errors;
            }
    }
    
     public static function editPeriodVal($periodOldVal, $periodNewVal){
        
        if(DB::query('SELECT period FROM period_details WHERE period = :period', array(':period'=> $periodOldVal))){
            
            if(!DB::query('SELECT period FROM period_details WHERE period = :period', array(':period'=> $periodNewVal))){
            
        DB::query('UPDATE period_details SET period = :periodNew WHERE period = :periodOld', array(':periodNew'=> $periodNewVal, ':periodOld'=> $periodOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because period already exists';
            }
        }
    }
    
        public static function delPeriodVal($periodValDel){
        
        if(DB::query('SELECT period FROM period_details WHERE period = :period', array(':period'=> $periodValDel))){
        
        DB::query('DELETE FROM period_details WHERE period = :period', array(':period'=>$periodValDel));
        echo 'Success';
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating Due For form field data

class DueForAdmin{
    
           public static function addDueForVal($id, $dueForVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT dueFor FROM duefor_details WHERE dueFor = :dueFor', array(':dueFor'=> $dueForVal))){
            
        DB::query('INSERT INTO duefor_details VALUES(:id, :dueFor, :deptID)', array(':id'=> $id, ':dueFor'=> $dueForVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That dueFor already exists';
            array_push($errors, $err);
            echo 'That dueFor already exists';
            return $errors;
            }
    }
    
     public static function editDueForVal($dueForOldVal, $dueForNewVal){
        
        if(DB::query('SELECT dueFor FROM duefor_details WHERE dueFor = :dueFor', array(':dueFor'=> $dueForOldVal))){
            
            if(!DB::query('SELECT dueFor FROM duefor_details WHERE dueFor = :dueFor', array(':dueFor'=> $dueForNewVal))){
            
        DB::query('UPDATE dueFor_details SET dueFor = :dueForNew WHERE dueFor = :dueForOld', array(':dueForNew'=> $dueForNewVal, ':dueForOld'=> $dueForOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because dueFor already exists';
            }
        }
    }
    
        public static function delDueForVal($dueForValDel){
        
        if(DB::query('SELECT dueFor FROM duefor_details WHERE dueFor = :dueFor', array(':dueFor'=> $dueForValDel))){
        
        DB::query('DELETE FROM duefor_details WHERE dueFor = :dueFor', array(':dueFor'=>$dueForValDel));
        echo 'Success';
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Class to handle the back-end logic for manipulating Due For form field data

class DueInAdmin{
    
           public static function addDueInVal($id, $dueInVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT duein FROM dueIn_details WHERE dueIn = :dueIn', array(':dueIn'=> $dueInVal))){
            
        DB::query('INSERT INTO duein_details VALUES(:id, :dueIn, :deptID)', array(':id'=> $id, ':dueIn'=> $dueInVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That dueIn already exists';
            array_push($errors, $err);
            echo 'That dueIn already exists';
            return $errors;
            }
    }
    
     public static function editDueInVal($dueInOldVal, $dueInNewVal){
        
        if(DB::query('SELECT dueIn FROM duein_details WHERE dueIn = :dueIn', array(':dueIn'=> $dueInOldVal))){
            
            if(!DB::query('SELECT dueIn FROM duein_details WHERE dueIn = :dueIn', array(':dueIn'=> $dueInNewVal))){
            
        DB::query('UPDATE duein_details SET dueIn = :dueInNew WHERE dueIn = :dueInOld', array(':dueInNew'=> $dueInNewVal, ':dueInOld'=> $dueInOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because dueIn already exists';
            }
        }
    }
    
        public static function delDueInVal($dueInValDel){
        
        if(DB::query('SELECT dueIn FROM duein_details WHERE dueIn = :dueIn', array(':dueIn'=> $dueInValDel))){
        
        DB::query('DELETE FROM duein_details WHERE dueIn = :dueIn', array(':dueIn'=>$dueInValDel));
        echo 'Success';
        }
    }
}

class UserAdminPermissions{
    
    public static function setAdmin($empID){
        
        $isAdmin = 1;
        
        DB::query('UPDATE users SET isAdmin = :isAdmin WHERE empID = :empID', array(':isAdmin'=>$isAdmin ,':empID'=>$empID));
        echo 'Success';
        
    }
    
    public static function removeAdmin($empID){
        $isAdmin = 0;
        
        DB::query('UPDATE users SET isAdmin = :isAdmin WHERE empID = :empID', array(':isAdmin'=> $isAdmin, ':empID'=>$empID));
        echo 'Success';
    }
    
    public static function getUsers(){
        $users = DB::query('SELECT empID, firstName, lastName, deptID, isAdmin FROM users');
        
        $dept = "";
        
        foreach($users as $user) {
            
            switch($user['deptID']){
                case "1": $dept = "Tax";
                    break;
                case "2": $dept = "HR";
                    break;
                default: $dept = "Tax";
            }
            
                if($user['isAdmin'] == 0){
            
                echo '
                <h4>Non-Admin User</h4><br>
                <p>Employee ID: '.$user['empID'].'</p><br>
                <p>Name: '.$user['firstName'].' '.$user['lastName'].'</p><br>
                <p>Department: '.$dept.'</p><br><hr>';
            }
            
                else{
                    echo '
                    <h4>Admin User</h4><br>
                    <p>Employee ID: '.$user['empID'].'</p><br>
                    <p>Name: '.$user['firstName'].' '.$user['lastName'].'</p><br>
                    <p>Department: '.$dept.'</p><br><hr>';
                }
        }
    }
    
}




?>