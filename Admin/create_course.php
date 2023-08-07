<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'lms');
// unset($_SESSION['Error']);
// unset($_SESSION['data']);
if (isset($_POST['submit'])) {
    // extract($_POST);
    foreach ($_POST as $key => $value) {
        $$key = $value;
        // $_SESSION['data'][$key] = $value;
        
    }
    // print_r($_SESSION['data']) ; exit;
    $flg = false;

    if($code==''){
        $_SESSION['Error']['code'] = 'Please enter your code';
        $flg = true;
    }

    if($cname==''){
        $_SESSION['Error']['cname'] = 'Pleasen enter your course name';
        $flg = true;
    }

    if($smr_id==''){
        $_SESSION['Error']['smr_id'] = 'Please enter your semester';
        $flg = true;
    }

if($flg){
    // echo json_encode($_SESSION['Error']); exit;
    header('location:/LMSDashboard/Admin/create_course.php');exit;
}else{
    // $username = $_POST['username'];
    $smr_id= $_POST['smr_id'];
    $code = $_POST['code'];
    $coursename = $_POST['cname'];
    // $instructorname = $_POST['iname'];
    $semester = $_POST['semester'];
    $credit_hour = $_POST['credit_hour'];
    // $year = $_POST['Year'];
    //$fqq = "SET FOREIGN_KEY_CHECKS=0";
    $sql = " INSERT into course (smr_id,code, name,semester,credit_hour )
        values('$smr_id','$code','$coursename','$semester','$credit_hour' )";
    $result = mysqli_query($connect, $sql);
    

    if ($result) {
        header('location:/LMSDashboard/Admin/course.php');
    } else {
        die(mysqli_error($connect));
    }
    // echo $result;
    // exit;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .sidebar-brand-text {
            font-size: 35px;
        }

        .mt-2 {
            float: right;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">LMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/LMSDashboard/Admin/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/LMSDashboard/Admin/teacherinfo.php">
                    <i class="fas fa-fw fa-light fa-user"></i>
                    <span>Teacher</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/LMSDashboard/Admin/studentinfo.php">
                    <i class="fas fa-fw fa-light fa-user"></i>
                    <span>Student</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/LMSDashboard/Admin/course.php">
                    <i class="fas fa-fw fa-light fa-layer-group"></i>
                    <span>Course</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>
    -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container">
                    <div class="card">
                        <?php if(isset($_SESSION['Error'])){
                                foreach ($_SESSION['Error'] as $key => $value) {
                                    echo $value.'<br>';


                                }

                        }?>
                    </div>
                    <form method="post" class="my-5" action="create_course.php">
                        <!-- <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="number" class="form-control" placeholder="Enter ID" name="id" autocomplete="off">
                        </div>-->
                        <!-- <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter username" name="username" autocomplete="off">
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="number" class="form-control" placeholder="Enter code" name="code" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="cname" autocomplete="off">
                        </div>
                         <!-- <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <input type="text" class="form-control" placeholder="Enter Semester" name="SemesterName" autocomplete="off">
                        </div> -->
                         <div class="mb-3">
                        <label for="form-label">Semester:</label> 
                                                <select name="smr_id" class="form-select">
                                                    <option selected>Select Semester</option>
                                                    <?php
                                                     $rquery = "SELECT  smr_id , concat(SemesterName,\"-\",Year) as Semester from register_semester;";

                                                     $rresult = mysqli_query($connect, $rquery);
                                                    while ($row = mysqli_fetch_assoc($rresult)) {
                                                        

                                                    ?>
                                                        <option value="<?php echo $row["smr_id"]?>"><?php echo $row["Semester"] ?></option>
                                                    <?php   
                                                    }
                                                    ?>
                                                </select>
                                                

                                                
                        </div> 
                        <div class="mb-3">
                            <label class="form-label">Credit Hour</label>
                            <input type="number" class="form-control" placeholder="Enter credit hour" name="credit_hour" autocomplete="off">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
                <!--Modal Code-->
                <!-- Button trigger modal -->



                <!-- Footer
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2023</span>
                        </div>
                    </div>
                </footer>
                End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/LMSDashboard/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

        <!-- Page level custom scripts -->
        <!-- <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script> -->
</body>

</html>