<?php  

    session_start();
    require_once '../config/db.php';
    
    if(!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "data/student-db.php";
            if (removeStudent($id, $conn)) {
                $_SESSION['success'] = "Successfully deleted!";
                header('location: student-list.php');
                exit;
            } else {
                $_SESSION['error'] = "Delete Fail, Please try again!";
                header('location: student-list.php');
                exit;
            }
        }
    }
    
?>