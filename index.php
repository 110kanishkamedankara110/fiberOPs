<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> FIBEROPTICSLK | Online Shoppping</title>
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body onload="getResent();">
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo"><a href=""><img src="images/logo 2-01.png" alt="logo" width="125"> </a></div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="#home" id="home">Home</a> </li>
                        <li><a href="#about">About</a> </li>
                        <li><a href="#product">Product</a> </li>
                        <li><a href="#contact">Contact</a> </li>
                    </ul>
                </nav>
                <a href="home.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/1024px-Hamburger_icon_white.svg.png" class="menu-icon" id="menuBtn">
            </div>
            <div class="row-header">
                <div class="col-2">
                    <h1>Your total <br>FTTX solutions</h1>
                    <p>We are committed to bringing the world into a tightly connected network,
                        <br>to drive it towards innovations for sustainability
                    </p>
                    <a href="https://www.daraz.lk/shop/fiberopticslk/?spm=a2a0e.pdp.seller.1.38daqfQrqfQrtC&itemId=122177738&channelSource=pdp" class="btn" target="_blank">explore now &#8594</a>
                </div>
                <div class="col-2">
                    <img src="">
                </div>
            </div>
        </div>
    </div>
    <!--About us-->
    <div class="aboutUs" id="about">
        <div class="small-container">
            <div class="textarea">
                <h2 class="title01">About Us</h2>
                <p>Fiberopticslk started its business in Sri Lanka in 2020
                    with world’s trading partner of telecommunication
                    equipment. Imports and supply electronic components
                    to the local market. We are to meet telecommunication
                    challenges of our customers and in the society as a whole
                    and achieving them with best humane quality and
                    providing excellence in the telecommunication field</p>
                <p> Fiberopticslk being an industrial marketing company
                    offers innovative and reliable FTTH solutions to our
                    customers.. Our intentions are to support
                    telecommunication industry to provide the best services
                    to the country. Telecommunication operators, industrial
                    customers, systems integrators, contractors and project
                    operators are our valuable customers who benefit from
                    our services. </p>
                <button class="viewall-btn" onclick="popUpShow()">View more</button>
            </div>
            <div class="imagearea">
                <img src="images/ADSS-Standard.jpg" alt="">
            </div>
        </div>
    </div>
    <!--Our Services-->
    <div class="our-services">
        <div class="small-container">
            <h2 class="title01">Our Services</h2>
            <div class="box-container">
                <div class="box">
                    <p>Fiber pigtail and Fiber patch cords SC/FC/LC/ST both
                        SM and MM</p>
                </div>
                <div class="box">
                    <p>FTTX Tool kits include Fiber cleaver/Power Meter</p>
                </div>
                <div class="box">
                    <p>Splicing closure Aerial and Underground</p>
                </div>
                <div class="box">
                    <p>FTTX Testing equipment’s such as OTDR /Optical
                        power Meter etc</p>
                </div>
                <div class="box">
                    <p>FTTX connectors SC UPC and Mechanical Connectors</p>
                </div>
                <div class="box">
                    <p>Fiber sleeves/ Heat shrinking sleeves</p>
                </div>
                <div class="box">
                    <p>Fiber Midspan tool /Sheild cutting tool etc</p>
                </div>
                <div class="box">
                    <p>Fiber Jointing Boxes wall/Pole mountable</p>
                </div>
                <div class="box">
                    <p>Fiber Splicing Machines</p>
                </div>
                <div class="box">
                    <p>Fiber related any products</p>
                </div>
            </div>
        </div>
    </div>
    <!--Feactured Catergories-->
    <div class="catergories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/exclusive.png">
                </div>
                <div class="col-3">
                    <img src="images/rtba-rack-mount-fiber-optic-terminal-box-3.jpg">
                </div>
                <div class="col-3">
                    <img src="images/93f6e8a42bfa9439edf0b623a51e8776.jpg_720x720.jpg_.webp">
                </div>

            </div>
        </div>
    </div>
    <!--Latest Product-->
    <!--NOTICE : New Item Layout developed in home.php -->
    <div class="small-container">
        <h2 class="title" id="product">latest product</h2>
        <div class="row flex-nowrap">




            <div id="proview">
                <div id="main" class="row">
                </div>
            </div>







        </div>
        <a href="home.php" target="_blank" class="viewall-btn">View All</a>
    </div>
    <!--OFFER-->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-12 col-md-6 p-5">
                    <img src="images/exclusive.png" class="offer-img w-100  h-100 object-fit-contain">
                </div>
                <div class="col-12 col-md-6 text-white">
                    <p class="text-white">Exclusively available on FiberopticksLk</p>
                    <h1>Fiber Optic Cleaver</h1>
                    <small class="text-white">Fiber Optic Cleaver FC-6s with Carry bag Black -SHIP FROM SRI LANKA DELIVERY WITHIN 2
                        DAYS</small><br>
                    <a href="https://www.daraz.lk/products/fiber-optic-cleaver-fc-6s-with-carry-bag-black-ship-from-sri-lanka-delivery-within-2-days-i108858082-s1017558382.html?spm=a2a0e.seller.list.15.7912a78cjoVtUP&mp=1" class="btn btn-primary text-white" target="_blank">Buy now Rs 7499.00</a>
                </div>
            </div>
        </div>
    </div>
    <!--Brands-->
    <div class="brands">
        <div class="small-container">
            <h2 class="title">Our Clients</h2>
            <div class="row align-items-center justify-content-evenly clientsRow">
                <div class="col-5 col-md-2">
                    <img src="images/clients/SLTMobitel_Logo.svg.png">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/Ceylon-Electricity-Board.png">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/serendib.jpg">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/sri-lanka-telecom-largex5-logo.png">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/etel.webp">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/luminex1.png">
                </div>
                <div class="col-5 col-md-2">
                    <img src="images/clients/access.png">
                </div>
            </div>
        </div>
    </div>
    <!--Testimonial-->
    <div class="testimonial">
        <div class="small-container">
            <h2 class="title">Reviews</h2>
            <div class="row justify-content-center">
                <div class="col-3">
                    <p>Same product as described. Fast delivery. Arrived in just 2 days.👍🏻👌🏻looks good. Havent used
                        them yet though. Hope these will last</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/user.png">
                    <h3>Pabasara r***</h3>
                </div>
                <div class="col-3">
                    <p>Received well before predicted date. Product is as ordered. Weldon team Daraz amidst limited
                        movements.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/user.png">
                    <h3>Anura ***</h3>
                </div>
                <div class="col-3">
                    <p>The product came with really good condition no problem with connectors.I really recommend this
                        product</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/user.png">
                    <h3>K S R Mudalige</h3>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php
    require "footer.php";
    ?>
    <!--footer-->
    <div class="popUpContainer" id="PopUp">
        <div class="popup-message">
            <div class="close-bar">
                <h2>About Us</h2>
                <i class="fa-solid fa-xmark" id="closeBtn" onclick="Close()"></i>
            </div>
            <hr>
            <div class="textarea">
                <h2>Our Mission</h2>
                <p>To help telecommunication networks to overcome
                    existing network bottlenecks and provide premier
                    solutions for daily expanding business</p>
                <h2>Our Vision</h2>
                <p>We are committed to bringing the world into a tightly
                    connected network, to drive it towards innovations for
                    sustainability.</p>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
    <script src="script.js"></script>

</body>



</html>