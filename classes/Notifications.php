<?php

    class Notify{
        
        public static function getNotifications(){
            
            $status = 0;
            $userid = Login::isLoggedIn();
            $notifications = DB::query('SELECT id, subject, text FROM notifications WHERE status = :status', array(':status'=>$status));
            
            foreach($notifications as $notify){
                echo '<a class="d-flex align-items-center dropdown-item" href="?status=1&id='.$notify['id'].'">
                                            <div class="mr-3"><i class="fa fa-check" style="font-size: 20px;color: #40c601;"></i></div>
                                            <div><span class="small text-gray-500">Submitted By: '.$notify['text'].'</span>
                                                <p>The compliance items for: '.$notify['subject'].' has been submitted</p>
                                            </div>
                                        </a>';
            }
            
        }
        
        public static function checkNotes(){
            $status = 0;
            if(!DB::query('SELECT subject FROM notifications WHERE status = :status', array(':status'=>$status))){
                echo 'grey';
            }
            
            else{
                echo 'red';
            }
        }
        
        public static function checkStatus(){
            
              if(isset($_GET['status'])){
            
              $status = $_GET['status'];
              $noteID = $_GET['id'];
            
              if($status == 1){
                  DB::query('UPDATE notifications SET status = 1 WHERE id=:id', array(':id'=>$noteID));
              }
                  
            $status2 = 0;
            if(!DB::query('SELECT subject FROM notifications WHERE status = :status', array(':status'=>$status2))){
                echo '<script>
                
                window.onload = function() {
                    if(!window.location.hash) {
                        window.location = window.location + "#loaded";
                        window.location.reload();
                    }
                }
                
                </script>';
            }
            
            }
        }
        
        public static function showAllNotifications(){
            
            $status = 0;
            $status2 = 1;
            $notifications = DB::query('SELECT id, subject, text FROM notifications WHERE status = :status OR status = :status2', array(':status'=>$status, ':status2'=> $status2));
            
            foreach($notifications as $notify){
                echo '<div class="row"><a class="d-flex align-items-center dropdown-item" href="?status=1&id='.$notify['id'].'">
                                            <div class="mr-3"><i class="fa fa-check" style="font-size: 20px;color: #40c601;"></i></div>
                                            <div><span class="small text-gray-500">Submitted By: '.$notify['text'].'</span>
                                                <p>The compliance items for: '.$notify['subject'].' have been submitted</p>
                                            </div>
                                        </a></div>';
            }
        }
        
        public static function showUserNotifications(){
            
            $status = 0;
            $status2 = 1;
            $userid = Login::isLoggedIn();
            $notifications = DB::query('SELECT id, subject, text FROM notifications WHERE status = :status OR status = :status2 AND  empID =:empID', array(':status'=>$status, ':status2'=> $status2, ':empID'=> $userid));
            
            foreach($notifications as $notify){
                echo '<div class="row"><a class="d-flex align-items-center dropdown-item" href="?status=1&id='.$notify['id'].'">
                                            <div class="mr-3"><i class="fa fa-check" style="font-size: 20px;color: #40c601;"></i></div>
                                            <div><span class="small text-gray-500">Submitted By: '.$notify['text'].'</span>
                                                <p>The compliance items for: '.$notify['subject'].' have been submitted</p>
                                            </div>
                                        </a></div>';
            }
        }
    }

?>
