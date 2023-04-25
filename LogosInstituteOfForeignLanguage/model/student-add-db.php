<?php 
    session_start();
    require_once('../config/db.php');

    if(isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $firstname_en = $_POST['firstname_en'];
        $lastname_en = $_POST['lastname_en'];
        $gender = $_POST['gender'];
        $firstname_la = $_POST['firstname_la'];
        $lastname_la = $_POST['lastname_la'];
        $dateofbirth = $_POST['dateofbirth'];
        $firstname_ch = $_POST['firstname_ch'];
        $lastname_ch = $_POST['lastname_ch'];
        $phonenumber = $_POST['phonenumber'];
        $whatsappnumber = $_POST['whatsappnumber'];
        $email = $_POST['email'];
        $address_residence = $_POST['address_residence'];
        $address_current = $_POST['address_current'];
        $address_type = $_POST['address_type'];
        $nation = $_POST['nation'];
        $religion = $_POST['religion'];
        $heightschool = $_POST['heightschool'];
        $middleschool = $_POST['middleschool'];
        $elementaryschool = $_POST['elementaryschool'];
        $familymatter = $_POST['familymatter'];
        $planofthefuture = $_POST['planofthefuture'];
        $year = $_POST['year'];
        $profile_pic = $_POST['profile_pic'];
        $urole = 'Student';

        $target_dir = "uploads/";

        if (empty($student_id)) {
            $_SESSION['error'] = 'Please enter student ID!';
            header("location: ../admin/add_student.php");
        } else if (empty($firstname_en)) {
            $_SESSION['error'] = 'Please enter english first name!';
            header("location: ../admin/add_student.php");
        } else {
            try {
                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "This email is alread registerd! <a href='signin.php'>Click here</a> to login";
                    header("location: ../admin/add_student.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(email, password, urole) 
                                            VALUE(:email, :password, :urole");
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();

                    $stmt2 = $conn->prepare("INSERT INTO students(student_id, firstname_la, lastname_la, firstname_en, lastname_en, firstname_ch, lastname_ch, gender, dateofbirth, 
                                                            phonenumber, whatsappnumber, address_residence, address_current, address_type, nation, religion, heightschool, middleschool, 
                                                            elementaryschool, familymatter, planofthefuture, year, profile_pic, email) 
                                            VALUE(:student_id, :firstname_la, :lastname_la, :firstname_en, :lastname_en, :firstname_ch, :lastname_ch,: gender, :dateofbirth, 
                                            :phonenumber, :whatsappnumber, :address_residence, :address_current, :address_type, :nation, :religion, :heightschool, :middleschool, 
                                            :elementaryschool, :familymatter, :planofthefuture, :year, :profile_pic, :email");
                    $stmt2->bindParam(":student_id", $student_id);
                    $stmt2->bindParam(":firstname_la", $firstname_la);
                    $stmt2->bindParam(":lastname_la", $lastname_la);
                    $stmt2->bindParam(":firstname_en", $firstname_en);
                    $stmt2->bindParam(":lastname_en", $lastname_en);
                    $stmt2->bindParam(":firstname_ch", $firstname_ch);
                    $stmt2->bindParam(":lastname_ch", $lastname_ch);
                    $stmt2->bindParam(":gender", $gender);
                    $stmt2->bindParam(":dateofbirth", $dateofbirth);
                    $stmt2->bindParam(":phonenumber", $phonenumber);
                    $stmt2->bindParam(":whatsappnumber", $whatsappnumber);
                    $stmt2->bindParam(":address_residence", $address_residence);
                    $stmt2->bindParam(":address_current", $address_current);
                    $stmt2->bindParam(":address_type", $address_type);
                    $stmt2->bindParam(":nation", $nation);
                    $stmt2->bindParam(":religion", $religion);
                    $stmt2->bindParam(":heightschool", $heightschool);
                    $stmt2->bindParam(":middleschool", $middleschool);
                    $stmt2->bindParam(":elementaryschool", $elementaryschool);
                    $stmt2->bindParam(":familymatter", $familymatter);
                    $stmt2->bindParam(":planofthefuture", $planofthefuture);
                    $stmt2->bindParam(":year", $year);
                    $stmt2->bindParam(":profile_pic", $profile_pic);
                    $stmt2->bindParam(":email", $email);
                    $stmt2->execute();

                    $_SESSION['success'] = "Successfully added! <a href='#' class='alert-link'>Click here</a> to login";
                    header("location: add_student.php");
                } else {
                    $_SESSION['error'] = 'Something went wrong!';
                    header("location: add_student.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

?>