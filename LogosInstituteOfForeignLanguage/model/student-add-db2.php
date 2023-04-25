<?php
session_start();
require_once('../config/db.php');

if (isset($_POST['submit'])) {
    try {
        $student_id = $_POST['student_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['student_id'];
        $email = $_POST['email'];
        $urole = 'student';

        // ----------------------------------------------------------------
        $imgfile = $_FILES["image_file"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");


        //    ---------------------------------------------------------------------------------------------------


        if (empty($student_id)) {
            $_SESSION['error'] = "Please enter student ID!";
            header("location: ../admin/add_student2.php");
        } else if (empty($firstname)) {
            $_SESSION['error'] = "Please enter first name!";
            header("location: ../admin/add_student2.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = "Please enter last name!";
            header("location: ../admin/add_student2.php");
        } else if (empty($email)) {
            $_SESSION['error'] = "Please enter email!";
            header("location: ../admin/add_student2.php");
        } else {
            if (!isset($_SESSION['error'])) {

                // Validation for allowed extensions .in_array() function searches an array for a specific value.
                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
                } else {
                    //rename the image file
                    $imgnewfile = md5($imgfile) . $extension;
                    // Code for move image into directory
                    move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    //Insert user--------------------------------------------------
                    $stmt1 = $conn->prepare("INSERT INTO users(email, password, urole)
                                                VALUES(:email, :password, :urole)");
                    $stmt1->bindParam(":email", $email);
                    $stmt1->bindParam(":password", $passwordHash);
                    $stmt1->bindParam(":urole", $urole);

                    // Insert Student--------------------------------------------------

                    $stmt2 = $conn->prepare("INSERT INTO students(id, firstname, lastname, student_id, image)
                                                VALUES(LAST_INSERT_ID(), :firstname, :lastname, :student_id, :image)");
                    $stmt2->bindParam(":firstname", $firstname);
                    $stmt2->bindParam(":lastname", $lastname);
                    $stmt2->bindParam(":student_id", $student_id);
                    $stmt2->bindParam(":image", $image_file);

                    $stmt1->execute();
                    $stmt2->execute();

                    $_SESSION['success'] = "Student... Successfully Added...";
                    header("location: ../admin/add_student2.php");
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
