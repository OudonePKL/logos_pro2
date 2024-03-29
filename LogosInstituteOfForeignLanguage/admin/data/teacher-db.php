<?php
require_once '../config/db.php';

// All teachers
function getAllTeachers($conn) {
    $sql = "SELECT * FROM teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}

// Get Student By ID
function getTeacherById($id, $conn) {
    $sql = "SELECT * FROM teachers WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $teacher = $stmt->fetch();
        return $teacher;
    } else {
        return 0;
    }
}
// Get User By ID
function getUserById($id, $conn) {
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        return $user;
    } else {
        return 0;
    }
}


// Delete 
function removeTeacher($id, $conn) {
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
    if ($re) {
        return 1;
    } else {
        return 0;
    }
}


?>