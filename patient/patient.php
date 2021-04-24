<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['patientSession'])) {
    header("Location: ../index.php");
}

$usersession = $_SESSION['patientSession'];


$res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient=" . $usersession);

if ($res === false) {
    echo mysqli_error($res);
}

$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Patient Dashboard</title>
    <!-- Bootstrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/material.css" rel="stylesheet">
    <link href="../assets/css/styl.css" rel="stylesheet">
    <!-- <link href="assets/css/default/style1.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/default/blocks.css" rel="stylesheet"> -->
    <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />

</head>

<body>

    <!-- navigation -->
    <nav class="navbar bg-dark sticky-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="patient.php"><img alt="Brand" src="assets/img/mylogo.png"
                        height="35px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="patient.php">Home</a></li>
                        <li><a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>">Profile</a></li>
                        <li><a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>">Appointment</a>
                        </li>
                    </ul>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>"><i
                                        class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i></i>
                                    Appointment</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation -->

    <!-- 1st section start -->
    <section class="content-block min-height-600px bg-offwhite">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">


                    <?php if ($userRow['patientMaritialStatus'] == "") {
                        // <!-- / notification start -->
                        echo "<div class='row'>";
                        echo "<div class='col-lg-12'>";
                        echo "<div class='alert alert-danger alert-dismissable'>";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                        echo " <i class='fa fa-info-circle'></i>  <strong>Please complete your profile.</strong>";
                        echo "  </div>";
                        echo "</div>";
                        // <!-- notification end -->

                    } else {
                    }
                    ?>
                    <!-- notification end -->
                    <h2 style="margin:15px;">Hello <?php echo $userRow['patientFirstName']; ?>
                        <?php echo $userRow['patientLastName']; ?>.
                    </h2>
                    <h2 style="margin:15px;margin-bottom:20px;">Make appointment today!</h2>

                    <div class="input-group" style="margin:15px;margin-bottom:30px">
                        <div class="input-group-addon" style="margin-right:10px;">
                            <i class="fa fa-calendar" style="font-size:20px;"></i>
                        </div>
                        <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>"
                            onchange="showUser(this.value)" />
                    </div>
                </div>
                <!-- date textbox end -->
                <!-- script start -->
                <script>
                function showUser(str) {

                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "No data to be shown";
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
                        xmlhttp.open("GET", "getschedule.php?q=" + str, true);
                        console.log(str);
                        xmlhttp.send();
                    }
                }
                </script>

                <!-- script start end -->

                <!-- table appointment start -->
                <!-- <div class="container"> -->
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <div id="txtHint"></div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- table appointment end -->
            </div>
        </div>
        <!-- /.row -->
        </div>
    </section>
    <!-- first section end -->
    <!-- forth sections start -->
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
    <!-- forth section end -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>

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