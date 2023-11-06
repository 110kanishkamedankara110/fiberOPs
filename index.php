<!DOCTYPE html>
<html>

<head>
    <title>FIBEROPTICSLK | SignIn</title>

    <link rel="icon" href="recourses/logo.svg" />
    <link rel="stylesheet" href="./bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="main-background">
    <?php
    require "loading.php";
    require "database.php";
    ?>
    <div class="container-fluid   d-flex justify-content-center">
        <div class="row align-content-center">
            <!--   header   -->
            <!-- <div class="col-12">
                    <div class="row">
                        <div class="col-12 ">
    <h1 class="text-center text-white fw-bolder mt-3" style="font-size: 100px;">PiXMart</h1>
                        </div>

                        <div class="col-12">
                            <p class="text-center title1 text-white fw-bolder">Lets Go Shopping</p>
                        </div>
                    </div>
                </div> -->
            <!--  end header   -->
            <!--  body   -->
            <div class="col-12 p-5">
                <div class="row" style="transition: 0.5s;">
                    <!-- left -->
                    <!-- <div class="col-6 background1 d-none d-lg-block order-2" onclick="window.location='adminsignin.php';">

                    </div> -->
                    <!-- end left -->
                    <!-- right -->
                    <!-- <div class="col-12 col-lg-6 text-white order-3" id="signin-box">
                        <div class="row g-3">
                            <h4 class="fw-bold">Sign In To Your account</h4>
                            <p class="mass" id="mass"></p>
                            <div class="col-6">
                                <lable class="form-form-label">First Name</lable>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="col-6">
                                <lable class="form-form-label">Last Name</lable>
                                <input type="text" class="form-control" id="lname">
                            </div>
                            <div class="col-12">
                                <lable class="form-form-label">Email</lable>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="col-12">
                                <lable class="form-form-label">Password</lable>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="col-6">
                                <lable class="form-form-label">Mobile</lable>
                                <input type="text" class="form-control" id="mobile">
                            </div>
                            <div class="col-6">
                                <lable class="form-form-label">Gender</lable>
                                <select class="form-select" id="gender">
                                    <?php
                                    $q = "SELECT * FROM `gender`";
                                    $res = database::s($q);
                                    $no = $res->num_rows;
                                    echo $no;
                                    for ($i = 0; $i < $no; $i++) {
                                        $gen = $res->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $gen["id"] ?>"><?php echo $gen["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signup();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="changeview();">Alredy Have An Account, Sign In</button>
                            </div>
                        </div>
                    </div> -->

                    <div  class=" col-12 col-lg-6  text-dark bg-white rounded rounded-lg order-3 py-5 shadow shadow-sm" id="signin-box">
                        <div class="col-12 text-center mb-2" onclick="window.location='adminsignin.php';">
                            <img src="recourses/logo.png" class="w-50 w-md-25 mx-auto">
                        </div>
                        <div class="row px-1 px-md-5">
                            <h5 class="fw-bold text-center mb-0">Sign up</h5>
                            <p class="mass" id="mass"></p>
                            <div class="col-12 col-md-6">
                                <lable class="form-form-label">First Name</lable>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="col-12 col-md-6">
                                <lable class="form-form-label">Last Name</lable>
                                <input type="text" class="form-control" id="lname">
                            </div>
                            <div class="col-12">
                                <lable class="form-form-label">Email</lable>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="col-12">
                                <lable class="form-form-label">Password</lable>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="col-6">
                                <lable class="form-form-label">Mobile</lable>
                                <input type="text" class="form-control" id="mobile">
                            </div>
                            <div class="col-6">
                                <lable class="form-form-label">Gender</lable>
                                <select class="form-select" id="gender">
                                    <?php
                                    $q = "SELECT * FROM `gender`";
                                    $res = database::s($q);
                                    $no = $res->num_rows;
                                    echo $no;
                                    for ($i = 0; $i < $no; $i++) {
                                        $gen = $res->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $gen["id"] ?>"><?php echo $gen["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary col-12 mt-3 " style="background-color: #f57224;border:none" onclick="signup();">Sign Up</button>
                            <a style="cursor: pointer;" onclick="changeview();" class="small">Alredy Have An Account, Sign In</a>

                        </div>
                    </div>
                    <!-- end right -->
                    <!-- right2 -->
                    <!-- <div class="col-12 d-none col-lg-6 text-white order-1" id="signup-box">
                            <div class="row g-3">
                                <h4 class="fw-bold">Sign Up To Your account</h4>
                                <p class="mass" id="mass2"></p>
                                <?php
                                if (isset($_COOKIE["e"])) {
                                    $email = $_COOKIE["e"];
                                    $password = $_COOKIE["p"];
                                } else {
                                    $email = "";
                                    $password = "";
                                }

                                ?>
                                <div class="col-12">
                                    <lable class="form-form-label">Email</lable>
                                    <input type="email" class="form-control" id="email2" value="<?= $email ?>">
                                </div>
                                <div class="col-12">
                                    <lable class="form-form-label">Password</lable>
                                    <input type="password" class="form-control" id="password2" value="<?= $password ?>">
                                </div>
                                <div class="col-6">
                                    <input class="form-check-input" value="1" type="checkbox" id="remember">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="text-white" onclick="fogetpassword();">Fogot Password</a>

                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-primary" onclick="signin();">Sign In</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-danger" onclick="changeview();">Don't Have An Account, Sign Up</button>
                                </div>
                            </div>
                        </div> -->
                    <div class=" mt-5 col-12 col-lg-6  d-none py-4 text-dark order-1 bg-white rounded rounded-lg shadow shadow-sm" id="signup-box">
                        <div class="col-12 text-center mb-2" onclick="window.location='adminsignin.php';">
                            <img src="recourses/logo.png" class="w-50 w-md-25 mx-auto">
                        </div>
                        <div class="row px-1 px-md-4">
                            <h5 class="fw-bold mb-0 text-center">Sign in</h5>
                            <p class="mass" id="mass2"></p>
                            <div class="col-12 mb-1">
                                <lable class="form-form-label">Email</lable>
                                <input type="email" class="form-control" id="email2" value="<?= $email ?>">
                            </div>
                            <div class="col-12 mb-3">
                                <lable class="form-form-label">Password</lable>
                                <input type="password" class="form-control" id="password2" value="<?= $password ?>">
                            </div>
                            <div class="col-6 mb-0">
                                <input class="form-check-input mb-0" value="1" type="checkbox" id="remember">
                                <label class="form-check-label mb-0" for="flexCheckChecked">
                                    Remember Me
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" onclick="fogetpassword();">Forgot Password ?</a>

                            </div>
                            <div class="col-12 my-0">
                                <button class="btn btn-primary w-100" style="background-color: #f57224;border: #f57224;" onclick="signin();">Sign In</button>
                            </div>
                            <a href="#" onclick="changeview();" class="small">Don't Have An Account, Sign Up</a>
                        </div>
                    </div>
                    <!-- end right 2 -->
                </div>
            </div>
            <!-- end body   -->
            <!-- bottom -->
            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy; 2021 FiberOpticsLk All Rights Reserved </p>
            </div>
            <!--  end mbottom  -->

        </div>

        <div class="modal fade" tabindex="-1" id="fogetpassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <lable class="form-form-label">Verification Coade</lable>
                            <input type="email" class="form-control" id="vc" value="<?php echo $em; ?>">
                        </div>
                        <div class="col-12">
                            <lable class="form-form-label">Password</lable>
                            <input type="password" class="form-control" id="mp" value="<?php echo $em; ?>">
                        </div>
                        <div class="col-12">
                            <lable class="form-form-label">Veryfy Password</lable>
                            <input type="password" class="form-control" id="mp2" value="<?php echo $em; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetpw();">Change Password</button>
                    </div>
                </div>
            </div>
        </div>













    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>
<?php


?>