<?php 

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'crud');

    if(isset($_POST['deletenames'])) {

        $id = $_POST['deleteid'];

        $query = "DELETE FROM person WHERE id='$id' ";
        $query_r = mysqli_query($connection, $query);

        if($query_r) {
            echo "<script type='text/javascript'>alert('ลบข้อมูลนี้เรียบร้อยแล้ว!');</script>";
            header("Refresh: 1; index.php");
        } else {
            echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด กรุณาลองอีกครั้ง');</script>";
            header("Refresh: 1; index.php");
        }
    }

?>