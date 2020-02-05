<?php

class GenerateReport{

    public static function getTaxReportData(){

        $empID = Login::isLoggedIn();

        $compliedItems = DB::query('SELECT tax.sNo, tax.description, tax.country, tax.ou, tax.entity, tax.period, tax.fy, tax.dueFor, tax.dueIn, tax.empID, tax.compliedOn, users.empID FROM tax, users
        WHERE users.empID = tax.empID ORDER BY tax.sNo DESC;', array(':empID'=>$empID));

        foreach($compliedItems as $comp) {

            $class = "alert-success";
            //  $class1 = "alert-warning";
                $class2 = "alert-danger";

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
                <td if(.$comp['compliedOn']. <= .$comp['dueIn']. ){
                  class='alert ".$class."'
                }
                else{
                  class='alert ".$class2."'
                }
                >".$comp['compliedOn']."</td>
                </tr>";
        }

    }

}


?>
