<?php

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'crud');

    $query = "SELECT * FROM person";
    $query_r = mysqli_query($connection, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>


    <!-- add -->
    <div class="modal fade" id="namesadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายชื่อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="add.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fname">ชื่อ</label>
                            <input type="text" class="form-control" name="fname" placeholder="ชื่อ">
                        </div>
                        <div class="form-group">
                            <label for="lastname">นามสกุล</label>
                            <input type="text" class="form-control" name="lname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" name="insertnames" class="btn btn-primary">เพิ่มรายชื่อ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mewwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww -->

    <!-- edit -->
    <div class="modal fade" id="namesedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="updateid" id="updateid">

                        <div class="form-group">
                            <label for="fname">ชื่อ</label>
                            <input type="text" class="form-control" name="fname" id="firstname" placeholder="ชื่อ">
                        </div>
                        <div class="form-group">
                            <label for="lastname">นามสกุล</label>
                            <input type="text" class="form-control" name="lname" id="lastname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" name="updatenames" class="btn btn-primary">แก้ไขชื่อ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mewwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww -->

    <!-- delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="delete.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="deleteid" id="deleteid">
                        <h5>คุณแน่ใจว่าจะลบรายชื่อนี้?</h5>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                        <button type="submit" name="deletenames" class="btn btn-danger">ใช่ ฉันต้องการลบข้อมูลนี้</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container my-5">
        <div class="row"> 
            <div class="col-12 mb-3"> 
                <h2 class="text-center">ข้อมูลรายชื่อ</h2>
            </div>
            <div class="col-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#namesadd">เพิ่มรายชื่อ</button>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">...</th>
                            </tr>
                        </thead>
                    <?php 
                        if($query_r) {
        
                            foreach($query_r as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['firstname']; ?> </td>
                                <td> <?php echo $row['lastname']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-warning editbtn">แก้ไข</button>
                                    <button type="button" class="btn btn-danger deletebtn">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                            }
                        } else {
                            echo "ไม่มีข้อมูล";
                        }
                    ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/node_modules/popper.js/dist/umd/popper.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deleteid').val(data[0]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#namesedit').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#updateid').val(data[0]);
                $('#firstname').val(data[1]);
                $('#lastname').val(data[2]);
            });
        });
    </script>


</body>
</html>