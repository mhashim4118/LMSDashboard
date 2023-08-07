<?php
$connect = mysqli_connect('localhost', 'root', '', 'lms');
// $cquery = "select * from course  ORDER BY `course_id` DESC";

$cquery= "select * from course as cs inner join register_semester as rs ON cs.smr_id=rs.smr_id";
$cresult = mysqli_query($connect, $cquery);
// echo $cquery;
// exit;
// echo json_encode($cresult);
// exit;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
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

            <!-- <li class="nav-item active">
                <a class="nav-link" href="/LMSDashboard/Admin/course_layout.php">
                    <i class="fas fa-fw fa-light fa-layer-group"></i>
                    <span>Course</span></a>
            </li> -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-light fa-layer-group"></i>
                    <span>Course</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Course Details:</h6>
                        <a class="collapse-item" href="/LMSDashboard/Admin/course.php">List</a>
                        <a class="collapse-item" href="/LMSDashboard/Admin/semester_wise_course.php">Semester Wise List</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/LMSDashboard/Admin/course_registration.php">
                    <i class="fas fa-fw fa-light fa-layer-group"></i>
                    <span>Course Registration</span></a>
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
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h2 class="display-8 text-center font-weight-bolder">Course Details<a href="/LMSDashboard/Admin/create_course.php"><button class="btn btn-info mt-2">Add Course</button></a></h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <tr class="bg-primary text-white">

                                                <td>Code</td>
                                                <td>Course Name</td>
                                                <td>Credit Hour</td>
                                                <td>Semester</td>
                                                <td>Action</td>
                                                <!-- <td>Year</td> -->
                                                <!-- <td>Option 1</td> -->
                                                <!-- <td>Option 2</td> -->

                                            </tr>
                                            <tr>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($cresult)) {
                                                ?>

                                                    <td><?php echo $row['code'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['credit_hour'] ?></td>
                                                    <td><?php echo $row['SemesterName'].'-'. $row['Year']?></td>
                                                    <!-- <td><?php echo $row['Year'] ?></td> -->

                                                    <td>
                                                        <a href="/LMSDashboard/Admin/edit_course.php?update=<?php echo $row['code'] ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;|&nbsp;
                                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['code'] ?>"><i class="fa fa-trash"></i></button>    
                                                        <!-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['code'] ?>"><i class="fa fa-cog"></i></button>                                                         -->
                                                    </td>
                                                    <!-- <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row['code'] ?>">Delete</button></td> -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop<?php echo $row['code'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete
                                                                        Course Data</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete course data?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="/LMSDashboard/Admin/delete_course.php?deletecode=<?php echo $row['code'] ?>"><button type="button" class="btn btn-danger">Yes</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </tr>
                                        <?php
                                                }
                                        ?>

                                        <!-- <div class="card-header">
                                    <h2 class="display-8 text-center font-weight-bolder">Course Details<a href="/LMSDashboard/Admin/create_course.php"><button class="btn btn-info mt-2">Add Course</button></a></h2>
                                </div> -->
                                        <!-- <div class="col cd">
                                            <h2 class="display-8 text-center font-weight-bolder">Course Details<a href="/LMSDashboard/Admin/create_course.php"><button class="btn btn-info mt-2">Add Course</button></a></h2>             
                                            </div> -->
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
                        <a class="btn btn-primary" href="/LMSDashboard/login.php">Logout</a>
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
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>