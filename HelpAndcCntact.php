<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>FIBEROPTICSLK | Contact</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="recourses\logo.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="bg-light">

    <div class="px-0">
        <?php
        require('database.php');
        require('header.php');
        require('TopNav.php');
        ?>
    </div>

    <!-- <footer class=" text-white pt-5 pb-4">
            <div class="col-12 text-center text-md-start">
                <div class="row text-center text-md-start">
                    
                    <div class="col-12 col-md-4 col-lg-3 mx-auto mt-3">
                        <h5 class="text-warning text-uppercase mb-4">contact</h5>
                        <p>
                            <i class="bi bi-house-fill pe-1"></i> Kandy,Kandy 10,Sri Lanka
                        </p>
                        <p>
                            <i class="bi bi-envelope-fill pe-1"></i> 
                        </p>
                        <p>
                            <i class="pe-1 bi bi-telephone-fill "></i>+94 705715007
                        </p>
                        <p>
                            <i class="pe-1 bi bi-printer-fill"></i>+94 705715007
                        </p>

                    </div>
                </div>
                <hr class="mb-4" />
            </div>
            

        </footer> -->
    <div class="container-fluid px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0 rounded-3 shadow shadow-md overflow-hidden">
                    <div class="card-body pt-3">
                        <div class="text-center">
                            <div class="h3 fw-bold">Get In Touch With Us</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-sm-6 col-12 d-sm-block bg-image p-3">


                                <ul class="p-0">
                                    <li class=" h4"><i class="fa-solid fa-phone text-orange"></i></li>
                                    <li><span class="h6 text-secondary">0773406693</span></li>


                                    <li>
                                        <div class="gap-1 align-items-center tex-center p-0">
                                            <span class="h6">Follow Us On</span><br />
                                            <a href="https://web.facebook.com/fiberopticslk" class="text-secondary h4"> <i class="fa-brands fa-facebook text-orange"></i> </a>
                                        </div>
                                    </li>
                                    <li><span class="h6 ">Email Us</span></li>
                                    <li class="h6 text-secondary">info@fiberopticslk.com</li>


                                    <li class="text-secondary h4"><i class="fa-solid fa-location-dot mr-3 text-orange"></i></li>
                                    <li><span class="h6">Address</span></li>
                                    <li class="text-secondary">139/16 Pitakanada Road ,Kandy, Sri Lanka</li>
                                    <li>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.384655514871!2d80.63537981395478!3d7.310611815542387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae367d92316c81b%3A0x8284036f071004ab!2s139%2C%2016%20Pitakanda%20Rd%2C%20Kandy!5e0!3m2!1sen!2slk!4v1677912461828!5m2!1sen!2slk" width="100%" height="100" style="border:0; margin-top: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-sm-6 col-12 p-4">


                                <!-- * * * * * * * * * * * * * *
          // * * SB Forms Contact Form * *
          // * * * * * * * * * * * * * * *

          // This form is pre-integrated with SB Forms.
          // To make this form functional, sign up at
          // https://startbootstrap.com/solution/contact-forms
          // to get an API token!
          -->

                                <form id="contactForm" method="POST" action="https://formspree.io/f/mzblleob">

                                    <!-- Name Input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="Name" type="text" placeholder="Name" data-sb-validations="required" required />
                                        <label for="name">Name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="emailAddress" name="Email" type="email" placeholder="Email Address" data-sb-validations="required,email" required />
                                        <label for="emailAddress">Email Address</label>
                                        <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                                    </div>

                                    <!-- Message Input -->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="Message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required" required></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                                    </div>

                                    <!-- Submit success message -->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            <p>To activate this form, sign up at</p>
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>

                                    <!-- Submit error message -->
                                    <div class="d-none" id="submitErrorMessage">
                                        <div class="text-center text-danger mb-3">Error sending message!</div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-grid">
                                        <button class="btn bg-orange btn-lg" id="submitButton" type="submit">Submit</button>
                                    </div>
                                </form>
                                <!-- End of contact form -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('footer.php');
    ?>
    <!-- <div class="col-6 offset-3 background1 d-none d-lg-block order-2" style="height:450px">

    </div> -->













    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</body>

</html>
