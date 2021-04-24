<?php
include_once 'assets/conn/dbconnect.php';
// include_once 'assets/conn/server.php';
?>

<!-- register -->
<?php
if (isset($_POST['signup'])) {
    $patientFirstName = mysqli_real_escape_string($con, $_POST['patientFirstName']);
    $patientLastName  = mysqli_real_escape_string($con, $_POST['patientLastName']);
    $patientEmail     = mysqli_real_escape_string($con, $_POST['patientEmail']);
    $icPatient     = mysqli_real_escape_string($con, $_POST['icPatient']);
    $password         = mysqli_real_escape_string($con, $_POST['password']);
    $month            = mysqli_real_escape_string($con, $_POST['month']);
    $day              = mysqli_real_escape_string($con, $_POST['day']);
    $year             = mysqli_real_escape_string($con, $_POST['year']);
    $patientDOB       = $year . "-" . $month . "-" . $day;
    $patientGender = mysqli_real_escape_string($con, $_POST['patientGender']);
    //INSERT
    $query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName,  patientDOB, patientGender,   patientEmail )
VALUES ( '$icPatient', '$password', '$patientFirstName', '$patientLastName', '$patientDOB', '$patientGender', '$patientEmail' ) ";
    $result = mysqli_query($con, $query);
    // echo $result;
    if ($result) {
?>
<script type="text/javascript">
alert('Register success. Please Login to make an appointment.');
</script>
<?php
    } else {
    ?>
<script type="text/javascript">
alert('User already registered. Please try again');
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
                        <a href="../PHP-Doctor-Appointment-System/login.php"><button
                                class="btn navbar-btn text-primary"><b>LOGIN
                                </b></button></a>
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
    <div style=" width: 550px; margin:auto;margin-top:2%">
        <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
            <h1 class="text-center"><b>It's free and always will be.</b></h1><br>
            <!-- <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="text" name="patientFirstName" value="" class="form-control input-lg"
                        placeholder="First Name" required />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input type="text" name="patientLastName" value="" class="form-control input-lg"
                        placeholder="Last Name" required />
                </div>
            </div> -->
            <input type="text" name="patientFirstName" value="" class="form-control input-lg m-2"
                placeholder="First Name" required />
            <input type="text" name="patientLastName" value="" class="form-control input-lg m-2" placeholder="Last Name"
                required />
            <input type="text" name="patientEmail" value="" class="form-control input-lg m-2" placeholder="Your Email"
                required />
            <input type="number" name="icPatient" value="" class="form-control input-lg m-2"
                placeholder="Your ID Number" required />


            <input type="password" name="password" value="" class="form-control input-lg m-2" placeholder="Password"
                required />

            <input type="password" name="confirm_password" value="" class="form-control input-lg m-2"
                placeholder="Confirm Password" required />
            <label class="ml-4"><b>Birth Date</b></label>
            <div class="row">

                <div class="col-xs-4 col-md-4">
                    <select name="month" class="form-control input-lg m-2" required>
                        <option value="">Month</option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="day" class="form-control input-lg m-2" required>
                        <option value="">Day</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="year" class="form-control input-lg m-2" required>
                        <option value="">Year</option>

                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                    </select>
                </div>
            </div>
            <b>
                <label class="ml-4">Gender : &nbsp;</label>
                <label class="radio-inline">
                    <input type="radio" name="patientGender" value="male" required />&nbsp;Male
                </label>
                &nbsp;

                &nbsp;

                <label class="radio-inline">
                    <input type="radio" name="patientGender" value="female" required />&nbsp;Female
                </label>
                <br />

                <button class="btn btn-lg btn-dark btn-block signup-btn m-2" type="submit" name="signup"
                    id="signup">Create
                    my
                    account</button>
            </b>
        </form>
    </div>
</body>

</html>