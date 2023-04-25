<?php
session_start();
require_once('../config/db.php');

if (isset($_POST['submit'])) {
    $teacher_id = $_POST['teacher_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['teacher_id'];
    $email = $_POST['email'];
    $urole = 'teacher';

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //Insert user--------------------------------------------------
    $stmt1 = $conn->prepare("INSERT INTO users(email, password, urole)
                                            VALUES(:email, :password, :urole)");
    $stmt1->bindParam(":email", $email);
    $stmt1->bindParam(":password", $passwordHash);
    $stmt1->bindParam(":urole", $urole);

    // Insert Student--------------------------------------------------
    
    $stmt2 = $conn->prepare("INSERT INTO teachers(id, firstname, lastname, teacher_id)
                                            VALUES(LAST_INSERT_ID(), :firstname, :lastname, :teacher_id)");
    $stmt2->bindParam(":firstname", $firstname); 
    $stmt2->bindParam(":lastname", $lastname);
    $stmt2->bindParam(":teacher_id", $teacher_id);

    $stmt1->execute();
    $stmt2->execute();

    $_SESSION['success'] = "Student... Successfully Added...";
    header("location: ../admin/add_teacher.php");

}
