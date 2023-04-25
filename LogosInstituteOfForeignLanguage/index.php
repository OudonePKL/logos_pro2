<?php

session_start();
require_once 'config/db.php';

if (isset($_REQUEST['submit'])) {

    $user_id = $_REQUEST['user_id'];
    $password = $_REQUEST['password'];

    try {
        $check_data = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $check_data->bindParam(":user_id", $user_id);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);

        if ($check_data->rowCount() > 0) {

            if ($user_id == $row['user_id']) {
                if (password_verify($password, $row['password'])) {
                    if ($row['urole'] == 'Administrator') {
                        $_SESSION['admin_login'] = $row['id'];
                        header("location: admin/admin-home.php");
                    } else if ($row['urole'] == 'Teacher') {
                        $_SESSION['teacher_login'] = $row['id'];
                        header("location: teacher/teacher-home.php");
                    } else if ($row['urole'] == 'Student') {
                        $_SESSION['student_login'] = $row['id'];
                        header("location: student/student-home.php");
                    } else {
                        $_SESSION['error'] = "Something Wrong!";
                        header("location: index.php");
                    }
                } else {
                    $errorMsg = 'Wrong password!';
                }
            } else {
                $errorMsg = 'Wrong email!';
            }
        } else {
            $errorMsg = 'Not Found!';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logos Institute of Foreign Language </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo_logos.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="loginbox2">
                        <div class="login-left">
                            <img class="img-fluid" src="assets/img/logo_logos.png" alt="Logo">
                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <h1>Welcome to Department of Chines Language</h1>
                                <p class="account-subtitle">Logos Institute Of Foreign Language's Management Systems</p>

                                <h2>Sign in</h2>
                                <?php
                                if (isset($errorMsg)) {
                                ?>
                                    <div class="alert alert-danger">
                                        <strong><?php echo $errorMsg;?></strong>
                                    </div>
                                <?php } ?>

                                <?php
                                if (isset($successMsg)) {
                                ?>
                                    <div class="alert alert-success">
                                        <strong><?php echo $successMsg;?></strong>
                                    </div>
                                <?php } ?>
                                <form method="post" action="" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>User ID <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="user_id" required 
                                        oninvalid="this.setCustomValidity('Enter User ID!')" oninput="setCustomValidity('')" 
                                        >
                                        <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input" type="text" name="password" required 
                                        oninvalid="this.setCustomValidity('Enter Password!')" oninput="setCustomValidity('')">
                                        <span class="profile-views feather-eye toggle-password"></span>
                                    </div>
                                    <p>Don't have an account <a href="admin/signup.php">Click here</a></p>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/script.js"></script>

</body>

</html>