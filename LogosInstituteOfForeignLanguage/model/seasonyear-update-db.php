<?php 
session_start();
require_once('../config/db.php');

if (isset($_POST['edit_seasonyear'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $seasonyear = $_POST['seasonyear'];

        if (empty($seasonyear)) {
            // $errorMsg = "Please enter Season year!";
            $_SESSION['error'] = "Please enter Season year!";
            header("location: ../admin/seasonyear-edit.php?id=$id");
        } else {
            if (!isset($errorMsg)) {
                try {
                    $sql = "UPDATE season_year SET year=:year WHERE id=:id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':year', $seasonyear);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $_SESSION['success'] = "Successfully Updated Season year!";
                    header("location: ../admin/seasonyear-list.php");
                } catch (PDOException $e) {
                    echo $e->getMessage();
                } 
            }
        }
        
    }
}









?>