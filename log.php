<?php

    function logs($date, $level, $ip, $msg) {

        include_once('conn.php');

        $sql = "insert into logs (date_time,level,ip,message) values (:date,:level,:ip,:msg)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":level", $level);
        $stmt->bindParam(":ip", $ip);
        $stmt->bindParam(":msg", $msg);
        $stmt->execute();

    }

    function logConectaDb($msg) {
    
        $filename = 'C:/xampp/apache/logs/log_database.txt';
    
        if (file_exists($filename)) {
            
            $open_file = fopen($filename, 'a');
            
            if(is_writable($filename)) {
                
                $write_file = fwrite($open_file, $msg);
            }
    
            fclose($open_file);
    
        } else {
    
            $open_file = fopen($filename, 'x');
            $write_file = fwrite($open_file, $msg);    
    
            fclose($open_file);
        }
    }

?>