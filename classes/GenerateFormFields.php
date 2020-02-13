<?php
    
    class GenerateTaxFormFields{
        
           public static function getCountryFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $countryItems = DB::query('SELECT country, deptID FROM country_details WHERE deptID = :deptID ORDER BY country_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($countryItems as $country) {
            
                echo "<option value='".$country['country']."'>".$country['country']."</option>";
        }
            
        }
        
        public static function getEntityFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $entityItems = DB::query('SELECT entity, deptID FROM entity_details WHERE deptID = :deptID ORDER BY entity_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($entityItems as $ent) {
            
                echo "<option value='".$ent['entity']."'>".$ent['entity']."</option>";
        }
            
        }
        
        public static function getTaskFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $taskItems = DB::query('SELECT task, deptID FROM task_details WHERE deptID = :deptID ORDER BY task_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($taskItems as $task) {
            
                echo "<option value='".$task['task']."'>".$task['task']."</option>";
        }
            
            }
        
        public static function getOUFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $ouItems = DB::query('SELECT ou, deptID FROM ou_details WHERE deptID = :deptID ORDER BY ou_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($ouItems as $ou) {
            
                echo "<option value='".$ou['ou']."'>".$ou['ou']."</option>";
        }
            
        }
        
          public static function getFYFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $fyItems = DB::query('SELECT fy, deptID FROM fy_details WHERE deptID = :deptID ORDER BY fy_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($fyItems as $fy) {
            
                echo "<option value='".$fy['fy']."'>".$fy['fy']."</option>";
        }
            
        }
        
           public static function getPeriodFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $periodItems = DB::query('SELECT period, deptID FROM period_details WHERE deptID = :deptID ORDER BY period_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($periodItems as $period) {
            
                echo "<option value='".$period['period']."'>".$period['period']."</option>";
        }
            
        }
        
        public static function getDueForFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $dueForItems = DB::query('SELECT dueFor, deptID FROM dueFor_details WHERE deptID = :deptID ORDER BY dueFor_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($dueForItems as $dueFor) {
            
                echo "<option value='".$dueFor['dueFor']."'>".$dueFor['dueFor']."</option>";
        }
            
        }
        
        public static function getDueInFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $dueInItems = DB::query('SELECT dueIn, deptID FROM dueIn_details WHERE deptID = :deptID ORDER BY dueIn_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($dueInItems as $dueIn) {
            
                echo "<option value='".$dueIn['dueIn']."'>".$dueIn['dueIn']."</option>";
        }
            
        }
        
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Formatted to appear in a paragraph rather than as an option 

    class getTaxFormFieldParagraphs{
        
           public static function getCountryFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $countryItems = DB::query('SELECT country, deptID FROM country_details WHERE deptID = :deptID ORDER BY country_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($countryItems as $country) {
            
                echo "<p>".$country['country']."</p>";
        }
            
        }
        
        
        public static function getEntityFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $entityItems = DB::query('SELECT entity, deptID FROM entity_details WHERE deptID = :deptID ORDER BY entity_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($entityItems as $ent) {
            
                echo "<p>".$ent['entity']."</p>";
        }
            
        }
        
        public static function getTaskFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
                
            $taskItems = DB::query('SELECT task, deptID FROM task_details WHERE deptID = :deptID ORDER BY task_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($taskItems as $task) {
            
                echo "<p>".$task['task']."</p>";
        }
            
            }
        
        public static function getOUFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $ouItems = DB::query('SELECT ou, deptID FROM ou_details WHERE deptID = :deptID ORDER BY ou_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($ouItems as $ou) {
            
                echo "<p>".$ou['ou']."</p>";
        }
            
        }
        
          public static function getFYFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $fyItems = DB::query('SELECT fy, deptID FROM fy_details WHERE deptID = :deptID ORDER BY fy_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($fyItems as $fy) {
            
                echo "<p>".$fy['fy']."</p>";
        }
            
        }
        
           public static function getPeriodFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $periodItems = DB::query('SELECT period, deptID FROM period_details WHERE deptID = :deptID ORDER BY period_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($periodItems as $period) {
            
                echo "<p>".$period['period']."</p>";
        }
            
        }
        
        public static function getDueForFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $dueForItems = DB::query('SELECT dueFor, deptID FROM dueFor_details WHERE deptID = :deptID ORDER BY dueFor_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($dueForItems as $dueFor) {
            
                echo "<p>".$dueFor['dueFor']."</p>";
        }
            
        }
        
        public static function getDueInFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();

            $dueInItems = DB::query('SELECT dueIn, deptID FROM dueIn_details WHERE deptID = :deptID ORDER BY dueIn_details.id DESC;', array(':deptID'=> $deptID));
            
              foreach($dueInItems as $dueIn) {
            
                echo "<p>".$dueIn['dueIn']."</p>";
        }
            
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class GenerateUnivFormFields{
            
        public static function taskLinkFields(){
            
            $deptID = 1;
            $userID = Login::isLoggedIn();
            $taskType = 1;

            $mainTasks = DB::query('SELECT id, task, deptID FROM task_details WHERE deptID = :deptID AND taskType = :taskType ORDER BY id DESC;', array(':deptID'=> $deptID, ':taskType'=> $taskType));
            
              foreach($mainTasks as $main) {
            
                echo "<option value='".$main['task']."'>".$main['task']."</option>";
        }
            
        }
            
}

?>