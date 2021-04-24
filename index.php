<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic Appointment Application</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="assets/css/styl.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/8f4dfcf519.js" crossorigin="anonymous"></script>
    <!-- <link href="assets/css/material.css" rel="stylesheet"> -->
</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-dark sticky-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img alt="Brand" src="assets/img/logo/mylogo.png" width="200px" height="40px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div>
                <ul class="nav navbar-right">
                    <!-- <li><a href="adminlogin.php">Admin</a></li> -->
                    <li class="mx-5">
                        <a href="../PHP-Doctor-Appointment-System/signup.php"><button
                                class="btn navbar-btn text-primary"><b>SIGN
                                    UP</b></button></a>
                    </li>

                    <li>
                        <a href="../PHP-Doctor-Appointment-System/login.php">
                            <button class="btn navbar-btn text-primary"><b>LOGIN</b></button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation -->

    <!-- 1st section start -->
    <div class="row" id="make">
        <div class="col-md-5 align-items-center" style="top:20%;left:15%;">
            <h1 class="text-dark my-3"><b>Make appointment today!</b></h1>
            <h5 class="text-dark mb-4"><b>This is Doctor's Schedule.<br> Please <span class="badge badge-danger">LOGIN
                    </span> to make an appointment. </h5></b>

            <!-- date textbox -->

            <div class="input-group mb-4" style="margin-bottom:10px;">
                <div class="input-group-addon" style="margin-right:10px;">
                    <i class="fa fa-calendar" style="font-size:30px;"></i>
                </div>
                <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>"
                    onchange="showUser(this.value)" />
            </div>

            <!-- date textbox end -->

            <!-- script start -->
            <script>
            function showUser(str) {

                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getuser.php?q=" + str, true);
                    console.log(str);
                    xmlhttp.send();
                }
            }
            </script>

            <!-- script start end -->

            <!-- table appointment start -->
            <div id="txtHint"><b> </b></div>

            <!-- table appointment end -->
        </div>
    </div>



    <section style="height: 600px;">
        <div class="container">
            <div class="text-center" style="margin-top:100px;">
                <h1 style="color:#005396;"><b>About Us</b></h1>
                <hr>
                <h2 class="mb-5">What We Provide</h2>
            </div>
            <div class="row" style="text-align: center;">
                <div class="col-md-6 col-sm-12 col-xs-12 pad50" style="text-align: center;">

                    <div>
                        <p style="font-size:30px; color:#005396;"><span class="fa fa-flask"></span>

                            <b>Laboratory</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pad50">
                    <div>
                        <p style="font-size:30px; color:#005396	;"><span class="fa fa-hospital-alt"></span>

                            <b>Facilities</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pad50">
                    <div>
                        <p style="font-size:30px; color:#005396	;"><span class="fa fa-check-double"></span>

                            <b>Specialists</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pad50">
                    <div>
                        <p style="font-size:30px; color:#005396	;"><span class="fa fa-clock"></span>

                            <b>Timings</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pad50">
                    <div>
                        <p style="font-size:30px; color:#005396	;"><span class="fa fa-ambulance"></span>

                            <b>Emergency</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 pad50">
                    <div>
                        <p style="font-size:30px; color:#005396	;"><span class="fa fa-shield-virus"></span>

                            <b>Safety</b>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eum quod ipsa veniam
                            laborum maxime!</p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="mb-4">
        <div class="container">


            <!--Section heading-->
            <h1 class="h1-responsive font-weight-bold text-center" style="color:#005396;">Contact Us</h1>
            <hr>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto">Do you have any questions? Please do not hesitate to
                contact us directly.</p>
            <p class="text-center w-responsive mx-auto mb-5"> Our team will come back to you within a matter of hours to
                help you.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" style="color:#005396;"><b>Your name</b></label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" style="color:#005396;"><b>Your email</b></label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" style="color:#005396;"><b>Subject</b></label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2"
                                        class="form-control md-textarea"></textarea>
                                    <label for="message" style="color:#005396;"><b>Your message</b></label>
                                </div>

                            </div>
                            <div class="text-center text-md-left">
                                <button class="btn btn-dark text-light ml-3"><b>SEND</b></button>
                            </div>
                        </div>
                        <!--Grid row-->

                    </form>


                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt mb-2 fa-2x" style="font-size:30px; color:#005396;"></i>
                            <p>Vadodara, Gujarat, INDIA</p>
                        </li>

                        <li><i class="fas fa-phone mb-2 fa-2x" style="font-size:30px; color:#005396;"></i>
                            <p>9898123789</p>
                        </li>

                        <li><i class="fas fa-envelope mb-2 fa-2x" style="font-size:30px; color:#005396;"></i>
                            <p>Arena Aman Nihisha Abhi</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>
        </div>
    </section>

    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container">
            <p><a href="adminlogin.php"><button class="btn navbar-btn text-primary">
                        <b>ADMIN LOGIN</b></button></a></p>
        </div>
    </footer>

    <!-- footer end -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').focus()
    })
    </script>
    <!-- date start -->

    <script>
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })
    </script>

    <!-- date end -->

</body>

</html>