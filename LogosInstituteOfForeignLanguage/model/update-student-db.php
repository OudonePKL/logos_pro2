<?php
session_start();
require_once('../config/db.php');
include '../admin/data/student_db.php';

if (isset($_POST['submit'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $student_id = $_POST['student_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($student_id)) {
            $_SESSION['error'] = 'Please enter your student ID!';
            header("location: ../admin/edit_student.php?id=$id");
        } else if (empty($firstname)) {
            $_SESSION['error'] = 'Please enter your first name!';
            header("location: ../admin/edit_student.php?id=$id");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'Please enter your last name!';
            header("location: ../admin/edit_student.php?id=$id");
        } else if (empty($email)) {
            $_SESSION['error'] = 'Please enter your email!';
            header("location: ../admin/edit_student.php?id=$id");
        } else {
            if (empty($password)) {
                try {
                    $sql1 = "UPDATE users SET email=:email WHERE id=:id";

                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bindParam(':email', $email);
                    $stmt1->bindParam(':id', $id);
                    $stmt1->execute();

                    $sql2 = "UPDATE students SET firstname=:firstname, lastname=:lastname, student_id=:student_id WHERE id=:id";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':firstname', $firstname);
                    $stmt2->bindParam(":lastname", $lastname);
                    $stmt2->bindParam(":student_id", $student_id);
                    $stmt2->bindParam(":id", $id);
                    $stmt2->execute();


                    $_SESSION['success'] = "Student... Successfully Updated...";
                    header("location: ../admin/view_student.php");
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                if (strlen($_POST['password']) < 8) {
                    $_SESSION['error'] = 'Password must be at least 8 charactors!';
                    header("location: ../admin/edit_student.php?id=$id");
                } else {
                    try {
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        $sql1 = "UPDATE users SET email=:email, password=:password WHERE id=:id";

                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->bindParam(':email', $email);
                        $stmt1->bindParam(':password', $passwordHash);
                        $stmt1->bindParam(':id', $id);
                        $stmt1->execute();

                        $sql2 = "UPDATE students SET firstname=:firstname, lastname=:lastname, student_id=:student_id WHERE id=:id";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->bindParam(':firstname', $firstname);
                        $stmt2->bindParam(":lastname", $lastname);
                        $stmt2->bindParam(":student_id", $student_id);
                        $stmt2->bindParam(":id", $id);
                        $stmt2->execute();


                        $_SESSION['success'] = "Student... Successfully Updated...";
                        header("location: ../admin/view_student.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
        }
    }
}
