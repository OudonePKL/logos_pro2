<?php 

    session_start();
    require_once '../config/db.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];


        if (empty($email)) {
            $_SESSION['error'] = 'Please enter your email!';
            header("location: ../index.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format!';
            header("location: ../index.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'Please enter your password!';
            header("location: ../index.php");
        } else {
            try {
                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {
                    
                    if ($email == $row['email']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                $_SESSION['success'] = "Admin... Successfully Login...";
                                header("location: ../admin/admin_home.php");
                            } else if ($row['urole'] == 'teacher') {
                                $_SESSION['teacher_login'] = $row['id'];
                                $_SESSION['success'] = "Teacher... Successfully Login...";
                                header("location: ../teacher/teacher_home.php");
                            }else if ($row['urole'] == 'student') {
                                $_SESSION['student_login'] = $row['id'];
                                $_SESSION['success'] = "Student... Successfully Login...";
                                header("location: ../student/student_home.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: ../index.php");
                            }
                        } else {
                            $_SESSION['error'] = 'Wrong password!';
                            header("location: ../index.php");
                        }
                    } else {
                        $_SESSION['error'] = 'Wrong email!';
                        header("location: ../index.php");
                    }
                } else {
                    $_SESSION['error'] = 'Not Found!';
                    header("location: ../index.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>