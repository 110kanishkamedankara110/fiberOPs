<?php
require "database.php";
session_start();
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FIBEROPTICSLK | Manage Users</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="recourses\logo.svg" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="bgbg">
        <?php
        require "loading.php";
        ?>
        <div class="container-fluid">
            <div class="row align-items-start justify-content-between">

                <?php
                require('sidemenu.php');
                ?>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <nav class="bg-light">
                            <ol class="d-flex flex-wrap mb-1 mt-1 list-unstyled">
                                <li class="breadcrumb-item small">
                                    <a href="adminpannel.php">Admin Pannel</a>
                                </li>

                                <li class="breadcrumb-item active small">
                                    <a class="text-decoration-none text-black-50" href="#">Manage Users</a>
                                </li>
                            </ol>
                        </nav>
                        <div class="col-12 bg-light text-center py-2">
                            <label class="form-label fs-4 text-primary">Manage All Users</label>
                        </div>

                        <div class="col-12 bg-light">

                            <!-- <div class="input-group">
                                            <div class="form-outline">
                                                <input type="search" id="form1" class="form-control" />
                                                <label class="form-label" for="form1">Search</label>
                                            </div>
                                            <button type="button"  class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                               
                               
                             </div> -->

                            <div class="input-group align-items-baseline justify-content-center">
                                <div class="form-outline w-75">
                                    <input id="search-input" type="search" id="form1" class="form-control" />
                                </div>
                                <button id="search-button" type="button" class="btn btn-primary" onclick="ussearch();">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>


                        </div>

                        <div class="col-12 mb-2 p-0 overflow-x-scroll">
                            <table class="table w-100 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Profile Image</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Registered Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $pronum = database::s("SELECT * FROM `user` ; ");
                                    $n = $pronum->num_rows;
                                    $results_per_page = 20;
                                    $pages = ceil($n / $results_per_page);

                                    if (!isset($_GET["page"])) {
                                        $pageno = 1;
                                    } else {
                                        $pageno = $_GET["page"];
                                    }

                                    $page_first_result = ($pageno * $results_per_page) - $results_per_page;
                                    $user = database::s("SELECT * FROM `user`  LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ; ");
                                    $un = $user->num_rows;

                                    for ($p = 0; $p < $un; $p++) {
                                        $us = $user->fetch_assoc();

                                    ?>

                                        <?php

                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $p + 1; ?></th>
                                            <td onclick="viewmassagemodel('<?php echo $us['email'] ?>');refresh2('<?php echo $us['email'] ?>');" style="max-width: 50px;"><img src="<?php echo $us["image"] ?>" alt="propic" class="w-100 h-100 object-fit-cover" ></td>
                                            <td onclick="viewmassagemodel('<?php echo $us['email'] ?>');refresh2('<?php echo $us['email'] ?>');"><?php echo $us["email"] ?></td>
                                            <td><?php echo $us["first_name"] . " " . $us["last_name"] ?></td>
                                            <td><?php echo $us["mobile"] ?></td>
                                            <td><?php echo explode(" ", $us["register_date"])["0"];    ?></td>
                                            <td>
                                                <?php
                                                if ($us["status"] == "1") {
                                                ?>
                                                    <button id="btn<?php echo $us['email'] ?>" class="btn btn-danger m-0" onclick="blockuser('<?php echo $us['email'] ?>');">Block</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button id="btn<?php echo $us['email'] ?>" class="btn btn-success m-0" onclick="blockuser('<?php echo $us['email'] ?>');">Unblock</button>
                                                <?php
                                                }

                                                ?>
                                            </td>
                                        </tr>

                                        <!-- <div class="col-12 mt-3 mb-2">
        <div class="row">
            <div class="col-2 col-lg-1 bg-info pt-2 pb-2 text-end">
                <span class="fs-5 fw-bold text-white"></span>
            </div>
            <div  class="col-2 bg-light d-none d-lg-block">
                
            </div>
            <div class="col-6 col-lg-2 bg-primary pt-2 pb-2 text-center">
                <span class="fs-5 fw-bold text-white"></span>
            </div>
            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                <span class="fs-5 fw-bold"></span>
            </div>
            <div class="col-2 bg-primary pt-2 pb-2 text-center d-none d-lg-block">
                <span class="fs-5 fw-bold text-white"></span>
            </div>
            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                <span class="fs-5 fw-bold"></span>
            </div>
            <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
               

            </div>
        </div>
    </div> -->
                                        <!--model-->


                                        <div class="modal fade" id="massageModal<?php echo $us["email"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Send Massage To <?php echo $us["first_name"] . " " . $us["last_name"] ?> </h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="col-12 p-0">
                                                            <div class="row px-4 text-dark">

                                                                <div class="col-12 p-3" id="chatbox<?php echo $us["email"] ?>" style="height: 300px;overflow-y: auto;">

                                                                    <?php
                                                                    $userimgg = database::s("SELECT * FROM `user` WHERE `email`='" . $us["email"] . "'");
                                                                    $seluimg = $userimgg->fetch_assoc();
                                                                    if ($seluimg["image"] == "NULL") {
                                                                        $im = "recourses\demoProfileImg.jpg";
                                                                    } else {
                                                                        $im = $seluimg["image"];
                                                                    }
                                                                    $adminimgg = database::s("SELECT * FROM `user` WHERE `email`='" . $_SESSION["admin"]["email"] . "'");
                                                                    $selaimg = $adminimgg->fetch_assoc();
                                                                    if ($selaimg["image"] == "NULL") {
                                                                        $aim = "recourses\demoProfileImg.jpg";
                                                                    } else {
                                                                        $aim = $selaimg["image"];
                                                                    }
                                                                    $chats = database::s("SELECT * FROM `chat` WHERE (`to`='" . $_SESSION["admin"]["email"] . "' AND `from`='" . $us["email"] . "' ) OR (`to`='" . $us["email"] . "' AND `from`='" . $_SESSION["admin"]["email"] . "' ) ORDER BY `date` ASC ; ");
                                                                    $nr = $chats->num_rows;
                                                                    for ($i = 0; $i < $nr; $i++) {
                                                                        $ch = $chats->fetch_assoc();
                                                                        if ($ch["to"] == $us["email"]) {
                                                                    ?>
                                                                            <!--Sender's massage-->

                                                                            <div class="row">
                                                                                <div class="text-end">

                                                                                    <label class=" p-2 rounded bg-primary">
                                                                                        <?php echo $ch["content"] ?>
                                                                                    </label>
                                                                                    <img src="<?php echo $aim ?>" width="50px" height="50px" class=" mb-3 rounded-circle">
                                                                                </div>
                                                                                <p class="small text-black-50 text-end"><?php
                                                                                                                        $tim = explode(" ", $ch["date"]);
                                                                                                                        echo $tim[1] . " | " . $tim[0]

                                                                                                                        ?>
                                                                                </p>
                                                                            </div>









                                                                            <!--reciver's massage-->
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <!--sender's massage-->
                                                                            <div class="row">
                                                                                <div class="text-start">
                                                                                    <img src="<?php echo $im ?>" width="50px" height="50px" class=" mb-3 rounded-circle">
                                                                                    <label class=" p-2 rounded bg-dark text-white"><?php echo $ch["content"] ?>
                                                                                    </label>
                                                                                </div>
                                                                                <p class="small text-black-50 text-start"><?php
                                                                                                                            $tim = explode(" ", $ch["date"]);
                                                                                                                            echo $tim[1] . " | " . $tim[0]

                                                                                                                            ?>
                                                                                </p>
                                                                            </div>



                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    ?>







                                                                </div>
                                                                <!--text-->
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-11">
                                                                            <input id="ms<?php echo  $us['email'] ?>" class="form-control  py-3  bg-light rounded-3 border-0   " type="text" placeholder="Type a massage.." />
                                                                        </div>
                                                                        <div class="col-1 d-grid">
                                                                            <button onclick="sendmassage2('<?php echo $us['email'] ?>');" id="sendbutton" class="btn btn-dark"><i class="bi bi-cursor-fill"></i></button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--text-->
                                                            </div>

                                                        </div>




                                                    </div>

                                                </div>
                                            
                                            </div>
                                        </div>


                                        <!--model-->
                                    <?php
                                    }


                                    ?>

                                </tbody>
                            </table>
                            <!-- <div class="row">
                                <div class="col-2 col-lg-1 bg-info pt-2 pb-2 text-end">
                                    <span class="fs-4 fw-bold text-white">#</span>
                                </div>
                                <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-4 fw-bold">Profile Image</span>
                                </div>
                                <div class="col-6 col-lg-2 bg-primary pt-2 pb-2 text-center">
                                    <span class="fs-4 fw-bold text-white">Email</span>
                                </div>
                                <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-4 fw-bold">User</span>
                                </div>
                                <div class="col-2 bg-primary pt-2 pb-2 text-center d-none d-lg-block">
                                    <span class="fs-4 fw-bold text-white">Mobile</span>
                                </div>
                                <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-4 fw-bold">Registered Date</span>
                                </div>
                                <div class="col-4 col-lg-1 bg-white pt-2 pb-2"></div>
                            </div>
                        </div> -->
                            <div id="users">


                            </div>
                        </div>
                        <div class="col-12 text-center fs-5 fw-bold mt-3">


                    <div class="pagination" id="pag">
                        <!-- <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a class="active" href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                        </div> -->

                        <div class="col-12 mb-3">
                            <div class="row">

                                <div class="pagination justify-content-center">
                                    <?php
                                    if ($pageno == 1) {
                                    ?>
                                        <a href="#" class="d-none">&laquo;</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="manageusers.php?page=<?php echo $pageno - 1 ?>"><i class="bi bi-caret-left-fill"></i></a>
                                    <?php
                                    }
                                    ?>



                                    <?php
                                    for ($pn = 1; $pn <= $pages; $pn++) {
                                        if ($pn == $pageno) {
                                    ?>
                                            <a href="manageusers.php?page=<?php echo $pn ?>" class="active"><?php echo $pn ?></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="manageusers.php?page=<?php echo $pn ?>"><?php echo $pn ?></a>

                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    if ($pageno == $pages) {
                                    ?>
                                        <a href="#" class="d-none">&raquo;</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="manageusers.php?page=<?php echo $pageno + 1 ?>"><i class="bi bi-caret-right-fill"></i></a>
                                    <?php
                                    }
                                    ?>

                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                    </div>
                </div>
                
            </div>


        </div>


            <?php require "footer.php"; ?>
            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "adminsignin.php"
    </script>
<?php
}


?>