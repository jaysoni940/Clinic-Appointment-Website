<?php
include_once 'assets/conn/dbconnect.php';
// include_once 'assets/conn/server.php';
?>

<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['patientSession']) != "") {
    header("Location: patient/patient.php");
}
if (isset($_POST['login'])) {
    $icPatient = mysqli_real_escape_string($con, $_POST['icPatient']);
    $password  = mysqli_real_escape_string($con, $_POST['password']);

    $res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient = '$icPatient'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ($row['password'] == $password) {
        $_SESSION['patientSession'] = $row['icPatient'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
        header("Location: patient/patient.php");
    } else {
    ?>
<script>
alert('wrong input ');
</script>
<?php
    }
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="assets/css/styl.css" rel="stylesheet">

</head>

<body class="mak">
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
                        <a href="../PHP-Doctor-Appointment-System/index.php">
                            <button class="btn navbar-btn text-primary"><b>HOME</b></button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation -->
    <h1 class="text-center" style="margin-top:100px"><b>It's free and always will be.</b></h1><br>

    <!-- <h1 class="text-center" style="margin-top:50px; font-size:75px;font-family: ' Montserrat', sans-serif; "><b>CLINIC
            PLUS +</b></h1> -->
    <div style=" width: 340px; margin:auto;margin-top:2%">
        <form class="form" role="form" method="POST" accept-charset="UTF-8">
            <div class="form-group">
                <label class="sr-only" for="icPatient">Email</label>
                <input type="text" class="form-control" name="icPatient" placeholder="ID Number" required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" id="login" class="btn btn-dark btn-block"><b>LOGIN</b></button>
            </div>
        </form>
    </div>
</body>


</html>