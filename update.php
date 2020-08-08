<?php 

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'crud');

    if(isset($_POST['updatenames'])) {

        $id = $_POST['updateid'];

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $query = "UPDATE person SET firstname='$fname', lastname='$lname' WHERE id='$id' ";
        $query_r = mysqli_query($connection, $query);

        if($query_r) {
            echo "<script type='text/javascript'>alert('บันทึกการแก้ไขข้อมูลเรียบร้อยแล้ว!');</script>";
            header("Refresh: 1; index.php");
        } else {
            echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด กรุณาลองอีกครั้ง');</script>";
            header("Refresh: 1; index.php");
        }
    }

?>