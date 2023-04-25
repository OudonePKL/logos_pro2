<?php

if (isset($_SESSION['admin_login'])) {
    $id = $_SESSION['admin_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $admin = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
if (isset($_SESSION['teacher_login'])) {
    $id = $_SESSION['teacher_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $admin = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
if (isset($_SESSION['student_login'])) {
    $id = $_SESSION['student_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $admin = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
?>

<?php if ($user['urole'] == 'Administrator') {?>
    <div class="header">

        <div class="header-left">
            <a href="admin-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="admin-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <?php $admin_image = $admin['image'] ?>
                        <img class="rounded-circle" src="<?php echo "../admin/upload/admin_profile/$admin_image" ?>" width="31" alt="Soeng Souy">
                        <div class="user-text">


                            <h6><?php echo $admin['firstname_en'] . " " . $admin['lastname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>

                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="<?php echo "../admin/upload/admin_profile/$admin_image" ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $admin['firstname_en'] . " " . $admin['lastname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } else if ($user['urole'] == 'Teacher') {?>
    <div class="header">

        <div class="header-left">
            <a href="teacher-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="teacher-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item dropdown noti-dropdown me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-05.svg" alt="">
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-02.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                                approved <span class="noti-title">your estimate</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-11.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">International Software
                                                    Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-17.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                                a cancellation request <span class="noti-title">Apple iPhone
                                                    XR</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-13.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Mercury Software
                                                    Inc</span> added a new product <span class="noti-title">Apple
                                                    MacBook Pro</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>

            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list win-maximize">
                    <img src="../assets/img/icons/header-icon-04.svg" alt="">
                </a>
            </li> -->

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <?php $teacher_image = $teacher['image'] ?>
                        <img class="rounded-circle" src="../admin/upload/teacher_profile/$teacher_image" width="31" alt="Soeng Souy">
                        <div class="user-text">
                            <h6><?php echo $teacher['teacher_id'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>

                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="../admin/upload/teacher_profile/$teacher_image" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $teacher['teacher_id'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } else {?>
    <div class="header">

        <div class="header-left">
            <a href="student-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="student-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item dropdown noti-dropdown me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-05.svg" alt="">
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-02.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                                approved <span class="noti-title">your estimate</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-11.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">International Software
                                                    Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-17.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                                a cancellation request <span class="noti-title">Apple iPhone
                                                    XR</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profiles/avatar-13.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Mercury Software
                                                    Inc</span> added a new product <span class="noti-title">Apple
                                                    MacBook Pro</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>

            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list win-maximize">
                    <img src="../assets/img/icons/header-icon-04.svg" alt="">
                </a>
            </li> -->

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <?php $student_image = $student['image'] ?>
                        <img class="rounded-circle" src="<?php echo "../admin/upload/student_profile/$student_image" ?>" width="31" alt="Soeng Souy">
                        <div class="user-text">
                            <h6><?php echo $student['firstname_en'] . $student['lastname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>
                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <?php $student_image = $student['image'] ?>
                            <img src="<?php echo "../admin/upload/student_profile/$student_image" ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $student['firstname_en'] . $student['lastname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['urole'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } ?>
