<?php
session_start();
require_once '../config/db.php';
include "data/student-db.php";
include "data/seasonyear-db.php";

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = getStudentById($id, $conn);
    $user = getUserById($id, $conn);
    $seasonyears = getAllSeasonYear($conn);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Logos Institute of Foreign Language</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="../assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <?php
        include_once("../include/header.php");
        include_once("../include/sidebar.php");
        ?>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Edit Students</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                                    <li class="breadcrumb-item active">Edit Students</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">

                                <form method="post" action="" enctype="multipart/form-data">

                                    <?php if (isset($errorMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $errorMsg;
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($successMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $successMsg;
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title student-info">Student Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Student ID <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['student_id'] ?>" name="student_id">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['firstname_en'] ?>" name="firstname_en">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['lastname_en'] ?>" name="lastname_en">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="gender">
                                                    <option> <?php echo $student['gender'] ?> </option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['firstname_la'] ?>" name="firstname_la">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['lastname_la'] ?>" name="lastname_la">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" value="<?php echo $student['dateofbirth'] ?>" name="dateofbirth">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['firstname_ch'] ?>" name="firstname_ch">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['lastname_ch'] ?>" name="lastname_ch">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Phone Number <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['phonenumber'] ?>" name="phonenumber">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp Number <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['whatsappnumber'] ?>" name="whatsappnumber">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="<?php echo $student['email'] ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Residence <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['address_residence'] ?>" name="address_residence">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Current <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['address_current'] ?>" name="address_current">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Type <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="address_current_type">
                                                    <option><?php echo $student['address_current_type'] ?></option>
                                                    <option>Self</option>
                                                    <option>Relative</option>
                                                    <option>Hengtaew</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nation <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['nation'] ?>" name="nation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="religion">
                                                    <option><?php echo $student['religion'] ?></option>
                                                    <option>Buddhism</option>
                                                    <option>Christianity</option>
                                                    <option>Islam</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>High School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['highschool'] ?>" name="highschool">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Middle School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['middleschool'] ?>" name="middleschool">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Elementary School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['elementaryschool'] ?>" name="elementaryschool">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Family Matters <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['familymatters'] ?>" name="familymatters">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Plans For Future <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" value="<?php echo $student['plansforthefuture'] ?>" name="plansforthefuture">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Year<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="seasonyear">
                                                    <option><?php echo $student['seasonyear'] ?></option>
                                                    <?php $i = 0;
                                                    foreach ($seasonyears as $seasonyear) {
                                                        $i++; ?>
                                                        <option> <?php echo $seasonyear['year'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group students-up-files">
                                                <label>Upload Student Photo (<?php echo $student['image'] ?>) <span class="login-danger">*</span> </label>
                                                <?php $studentImage_file = $student['image'] ?>
                                                <img src="<?php echo "upload/student_profile/$studentImage_file" ?>" alt="Logo" width="150px">
                                                <label class="file-upload image-upbtn mb-0 ml-2">
                                                    Choose File <input type="file" name="txt_file">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>