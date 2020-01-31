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
    
           public static function addParticularsVal($id, $particularsVal, $deptID){
           
        $errors = array();
        
        if(!DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsVal))){
            
        DB::query('INSERT INTO task_details VALUES(:id, :task, :deptID)', array(':id'=> $id, ':task'=> $particularsVal, ':deptID'=>$deptID));
        echo 'Success';
            
        }
           
        else{
            $err = 'That particular already exists';
            array_push($errors, $err);
            echo 'That particular already exists';
            return $errors;
            }
    }
    
     public static function editParticularsVal($particularsOldVal, $particularsNewVal){
        
        if(DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsOldVal))){
            
            if(!DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsNewVal))){
            
        DB::query('UPDATE task_details SET task = :taskNew WHERE task = :taskOld', array(':taskNew'=> $particularsNewVal, ':taskOld'=> $particularsOldVal));
        echo 'Success';
            
            }
            
            else{
                echo 'Cannot make that edit because particular already exists';
            }
        }
    }
    
        public static function delParticularsVal($particularsValDel){
        
        if(DB::query('SELECT task FROM task_details WHERE task = :task', array(':task'=> $particularsValDel))){
        
        DB::query('DELETE FROM task_details WHERE task = :task', array(':task'=>$particularsValDel));
        echo 'Success';
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



?>