<?php
require("connect.php");
require("CheckLogin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maintain Student Records</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">


<?php

$sql = "SELECT * FROM users WHERE username = '$user'";
$record = $mysqli->query($sql);
while($row = $record->fetch_array()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $role = $row['role'];
    $email = $row['email'];
}
?>
<?php include("nav.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-wrench"></i> Maintain Student Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    if($role=="admin") {?>
                    <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Student Name</td>
                                                <td>
<?php
$students = "SELECT * FROM users WHERE role='student' ORDER BY first_name ASC";
$studentRecords = $mysqli->query($students);
?>
                                                    <select name="students">
                                                        <option value="-1">Select</option>
                                                        <?php while($row = $studentRecords->fetch_array()) {?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Course</td>
                                                <td>
<?php
$courses = "SELECT * FROM courses ORDER BY course_title ASC";
$courseRecords = $mysqli->query($courses);
?>
                                                    <select name="course">
                                                        <option value="-1">Select</option>
                                                        <?php while($row = $courseRecords->fetch_array()) {?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['course_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td><input type="button" value="Add Student" class="btn btn-lg btn-success"></td>
                                                <td><input type="button" value="Drop Student" class="btn btn-lg btn-danger"></td>
                                            </tr>
                                  </table>
                                </div>
                    <?php }
                    else {
                        //No Access
                    }
                ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
