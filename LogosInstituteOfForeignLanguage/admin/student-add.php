<?php
session_start();
require_once '../config/db.php';
include "data/seasonyear-db.php";
include "data/student-db.php";
include "data/admin-db.php";
$seasonyears = getAllSeasonYear($conn);
$student = getAllStudents($conn);

if (!isset($_SESSION['admin_login'])) {
    header('location: ../index.php');
    exit;
}

if (isset($_REQUEST['submit'])) {
    try {
        $student_id = $_REQUEST['student_id'];
        $firstname_en = $_REQUEST['firstname_en'];
        $lastname_en = $_REQUEST['lastname_en'];
        $gender = $_REQUEST['gender'];
        $firstname_la = $_REQUEST['firstname_la'];
        $lastname_la = $_REQUEST['lastname_la'];
        $dateofbirth = $_REQUEST['dateofbirth'];
        $firstname_ch = $_REQUEST['firstname_ch'];
        $lastname_ch = $_REQUEST['lastname_ch'];
        $phonenumber = $_REQUEST['phonenumber'];
        $whatsappnumber = $_REQUEST['whatsappnumber'];
        $email = $_REQUEST['email'];
        $address_residence = $_REQUEST['address_residence'];
        $address_current = $_REQUEST['address_current'];
        $address_current_type = $_REQUEST['address_current_type'];
        $nation = $_REQUEST['nation'];
        $religion = $_REQUEST['religion'];
        $highschool = $_REQUEST['highschool'];
        $middleschool = $_REQUEST['middleschool'];
        $elementaryschool = $_REQUEST['elementaryschool'];
        $familymatters = $_REQUEST['familymatters'];
        $plansforthefuture = $_REQUEST['plansforthefuture'];
        $seasonyear = $_REQUEST['seasonyear'];
        $urole = 'Student';

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "upload/student_profile/" . $image_file; // set upload folder path

        $check_student_id = $conn->prepare("SELECT student_id FROM students WHERE student_id=:student_id");
        $check_student_id->bindParam(":student_id", $student_id);
        $check_student_id->execute();
        $row_student_id = $check_student_id->fetch(PDO::FETCH_ASSOC);

        $check_phone_number = $conn->prepare("SELECT phonenumber FROM students WHERE phonenumber=:phonenumber");
        $check_phone_number->bindParam(":phonenumber", $phonenumber);
        $check_phone_number->execute();
        $row_phone_number = $check_phone_number->fetch(PDO::FETCH_ASSOC);

        $check_whatsappnumber = $conn->prepare("SELECT whatsappnumber FROM students WHERE whatsappnumber=:whatsappnumber");
        $check_whatsappnumber->bindParam(":whatsappnumber", $whatsappnumber);
        $check_whatsappnumber->execute();
        $row_whatsappnumber = $check_whatsappnumber->fetch(PDO::FETCH_ASSOC);



        if ($row_student_id['student_id'] == $student_id) {
            // $warningMsg = "This student ID's already exist! <a href='student-list.php'> Click here to see the detail </a>";
            $_SESSION['error'] = "This student ID's already exist! <a href='student-list.php'> Click here to see the detail </a>";
            header('location: student-add.php');
            exit;
        } else {
            if (!isset($warningMsg)) {
                $passwordHash = password_hash($student_id, PASSWORD_DEFAULT);

                // Add User
                $stmt1 = $conn->prepare('INSERT INTO users(user_id, email, password, urole) 
                                                        VALUES (:user_id, :email, :password, :urole)');
                $stmt1->bindParam(':user_id', $student_id);
                $stmt1->bindParam(':email', $email);
                $stmt1->bindParam(':password', $passwordHash);
                $stmt1->bindParam(':urole', $urole);

                // Add Student
                $stmt2 = $conn->prepare('INSERT INTO students(id, student_id, firstname_en, lastname_en, firstname_la, lastname_la, firstname_ch, lastname_ch, gender, dateofbirth, phonenumber, whatsappnumber, email, address_residence, address_current, address_current_type, nation, religion, highschool, middleschool, elementaryschool,familymatters, plansforthefuture, seasonyear, image) 
                                            VALUES(LAST_INSERT_ID(), :student_id, :firstname_en, :lastname_en, :firstname_la, :lastname_la, :firstname_ch, :lastname_ch, :gender, :dateofbirth, :phonenumber, :whatsappnumber, :email, :address_residence, :address_current, :address_current_type, :nation, :religion, :highschool, :middleschool, :elementaryschool, :familymatters, :plansforthefuture, :seasonyear, :image)');
                $stmt2->bindParam(':student_id', $student_id);
                $stmt2->bindParam(':firstname_en', $firstname_en);
                $stmt2->bindParam(':firstname_la', $firstname_la);
                $stmt2->bindParam(':firstname_ch', $firstname_ch);
                $stmt2->bindParam(':lastname_en', $lastname_en);
                $stmt2->bindParam(':lastname_la', $lastname_la);
                $stmt2->bindParam(':lastname_ch', $lastname_ch);
                $stmt2->bindParam(':gender', $gender);
                $stmt2->bindParam(':dateofbirth', $dateofbirth);
                $stmt2->bindParam(':phonenumber', $phonenumber);
                $stmt2->bindParam(':whatsappnumber', $whatsappnumber);
                $stmt2->bindParam(':email', $email);
                $stmt2->bindParam(':address_residence', $address_residence);
                $stmt2->bindParam(':address_current', $address_current);
                $stmt2->bindParam(':address_current_type', $address_current_type);
                $stmt2->bindParam(':nation', $nation);
                $stmt2->bindParam(':religion', $religion);
                $stmt2->bindParam(':highschool', $highschool);
                $stmt2->bindParam(':middleschool', $middleschool);
                $stmt2->bindParam(':elementaryschool', $elementaryschool);
                $stmt2->bindParam(':familymatters', $familymatters);
                $stmt2->bindParam(':plansforthefuture', $plansforthefuture);
                $stmt2->bindParam(':seasonyear', $seasonyear);
                $stmt2->bindParam(':image', $image_file);

                $stmt1->execute();
                $stmt2->execute();

                if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                    if (!file_exists($path)) { // check file not exist in your upload folder path
                        if ($size < 5000000) { // check file size 5MB
                            move_uploaded_file($temp, 'upload/student_profile/' . $image_file); // move upload file temperory directory to your upload folder
                        } else {
                            // $warningMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
                            $_SESSION['error'] = "Your file too large please upload 5MB size";
                            header('location: student-add.php');
                            exit;
                        }
                    } else {
                        // $warningMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
                        $_SESSION['error'] = "File already exists... Check upload filder";
                        header('location: student-add.php');
                        exit;
                    }
                } else {
                    // $warningMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
                    $_SESSION['error'] = "Upload JPG, JPEG, PNG & GIF file formate...";
                    header('location: student-add.php');
                    exit;
                }

                // $successMsg = "Add admin successfully. <a href='student-list.php'> Click here to see the detail </a>";
                $_SESSION['success'] = "Add admin successfully. <a href='student-list.php'> Click here to see the detail </a>";
                header('location: student-add.php');
                exit;
            }
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
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
                                <h3 class="page-title">Add Students</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                                    <li class="breadcrumb-item active">Add Students</li>
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

                                    <?php if (isset($warningMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $warningMsg; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($warningMsg)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $warningMsg;
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($successMsg)) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php
                                            echo $successMsg;
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_SESSION['success'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
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
                                                <input class="form-control" type="text" name="student_id" required oninvalid="this.setCustomValidity('Enter Student ID!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="firstname_en" required oninvalid="this.setCustomValidity('Enter First Name(English)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(English) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="lastname_en" required oninvalid="this.setCustomValidity('Enter Last Name(English)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="gender" required>
                                                    <option></option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="firstname_la" required oninvalid="this.setCustomValidity('Enter First Name(Lao)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Lao) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="lastname_la" required oninvalid="this.setCustomValidity('Enter Last Name(Lao)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" name="dateofbirth" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="firstname_ch" required oninvalid="this.setCustomValidity('Enter First Name(Chines)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name(Chines) <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="lastname_ch" required oninvalid="this.setCustomValidity('Enter Last Name(Chines)!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Phone Number <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="phonenumber" required oninvalid="this.setCustomValidity('Enter Phone Number!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>WhatsApp Number <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="whatsappnumber" required oninvalid="this.setCustomValidity('Enter WhatsApp Number!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="email" required oninvalid="this.setCustomValidity('Enter Email Address!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Residence <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="address_residence" required oninvalid="this.setCustomValidity('Enter Address Residence!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Current <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="address_current" required oninvalid="this.setCustomValidity('Enter Address Current!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Address Type <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="address_current_type" required>
                                                    <option></option>
                                                    <option>Self</option>
                                                    <option>Relative</option>
                                                    <option>Hengtaew</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nation <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="nation" required oninvalid="this.setCustomValidity('Enter Nation!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="religion" required>
                                                    <option></option>
                                                    <option>Buddhism</option>
                                                    <option>Christianity</option>
                                                    <option>Islam</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Height School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="highschool" required oninvalid="this.setCustomValidity('Enter Height School!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Middle School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="middleschool" required oninvalid="this.setCustomValidity('Enter Middle School!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Elementary School <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="elementaryschool" required oninvalid="this.setCustomValidity('Enter Elementary School!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Family Matters <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="familymatters" required oninvalid="this.setCustomValidity('Enter Family Matters!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Plans For Future <span class="login-danger">*</span> </label>
                                                <input class="form-control" type="text" name="plansforthefuture" required oninvalid="this.setCustomValidity('Enter Plans For Future!')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Season Year<span class="login-danger">*</span></label>
                                                <select class="form-control select" name="seasonyear" required>
                                                    <option></option>
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
                                                <label>Upload Student Photo<span class="login-danger">* </span></label>
                                                <!-- <div class="uplod">
                                                    <label class="file-upload image-upbtn mb-0">
                                                        Choose File <input type="file" name="txt_file">
                                                    </label>
                                                </div> -->
                                                <input type="file" name="txt_file" required oninvalid="this.setCustomValidity('Choose Image Profile!')" oninput="setCustomValidity('')">
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