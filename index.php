<?php

session_cache_limiter('nocache');

session_start();

include 'functions.php';

login();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>
<style>
    body,header,footer {
  font-family: "Times New Roman", Times, serif;
}
</style>
<body>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="index.php" class="text-dark font-size-22 font-family-secondary">
                                                <img src="assets/images/logo-salva-commercialista.jpg" alt="" class="col-12">
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Benvenuto!</h1>
                                        <form class="user" method="POST" action="index.php">
                                            <div class="form-group">
                                                <input type="text" name="username"
                                                    class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user" id="exampleInputPassword"
                                                    placeholder="Password">
                                            </div>
                                            <center>
                                                <button href="#" type="submit" name="submit"
                                                    class="btn btn-info col-3 btn-sm btn-block waves-effect waves-light">
                                                    Log In </button>
                                            </center>
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">

                                                <p class="text-dark mb-0">Non hai un account?
                                                    <br>
                                                    <a href="register.php"
                                                        class="text-light btn col-10  btn-dark font-weight-medium ml-1"><b
                                                            style=" font-size: 25px;">Clicca qui per Registrarti
                                                            GRATIS</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.html"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>
 <!--**********************************************************************************************************************************************************************************************************


  This site was  Developed By 
                              //******  You can find us on ****//

                      //!  Eri Musa  
           //? Website  : http://dilavermusa.com/
           //? Linkedin : https://www.linkedin.com/in/eri-musa-681332181/


                  //!    Alban Delishi 
           //? Website  : http://delishicodes.com/
         //?  Linkedin : :https://www.linkedin.com/in/alban-delishi-22b485186
 

 ********************************************************************************************************************************************************************************************************** ---></html>