<?php 

        include_once('connect.php');

        if(isset($_POST['insertnames'])){

            $sql = "INSERT INTO `person` (`firstname`, `lastname`) 
                    VALUES ('".$_POST['fname']."', '".$_POST['lname']."');";
            

            $result = $conn->query($sql);
            
            if($result){
                echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว!');</script>";
                header("Refresh: 1; index.php");
            } else {
                echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด กรุณาลองอีกครั้ง');</script>";
                header("Refresh: 1; index.php");
            }
        }


?>