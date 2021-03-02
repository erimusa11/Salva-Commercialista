<?php
session_cache_limiter('nocache');

session_start();

include 'functions.php';

registra();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://www.google.com/recaptcha/api.js?render=6LdkM-QUAAAAAB2Z8K0BrNdW_SY8cO3V9cqFWCmu"></script>

    <meta charset="utf-8" />
    <title>Register | Salva Commercialista</title>
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
    <style>
    body,header,footer {
  font-family: "Times New Roman", Times, serif;
}
</style>
</head>

<body>

    <div>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">

                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register rounded-left"></div>

                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">

                                            <a href="index.php" class="text-dark font-size-22 font-family-secondary">
                                            <img src="assets/images/logo-salva-commercialista.jpg" alt="" class="col-12">
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1 text-info">Riempi gli campi per fare la registrazione..</h1>
                                        <p class="text-muted mb-4"></p>
                                        <form class="user" method="POST" action="register.php"  >
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleFirstName" name='inputName' placeholder="Nome" " id="validationCustom01" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleLastName" name='inputCognome'
                                                        placeholder="Cognome" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="inputEmail" placeholder="Email " required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="inputPhone" placeholder="Telefono" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" name="inputPassword"
                                                        placeholder="Password" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleRepeatPassword" name="inputCitta"
                                                        placeholder="Citta" required>
                                                </div>
                                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                                            </div>
                                            <button href="#" type="submit" name="submit"
                                                class="btn btn-dark btn-block waves-effect waves-light">
                                                REGISTRATI </button>

                                            <div class="text-center mt-4">
                                                <h5 class=" font-size-16 text-info mb-4">La procedura per registrare
                                                </h5>
                                                <div class="col-xl-12">
                                                    <p class="card-subtitle  text-primary">Registrati </p>
                                                    <i class="feather-arrow-down text-primary col-12"></i>
                                                    <p class="card-subtitle  ">Apri la mail che ti abbiamo inviato
                                                    </p>
                                                    <i class="feather-arrow-down col-12 text-primary "></i>
                                                    <p class="card-subtitle  ">Attiva il tuo utente
                                                    </p>
                                                    <i class="feather-arrow-down col-12 text-primary "></i>
                                                    <p class="card-subtitle  ">Effettua il login </p>
                                                    <div class="progress  ">
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                            </div>

                                        </form>
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

    <script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LdkM-QUAAAAAB2Z8K0BrNdW_SY8cO3V9cqFWCmu', {
        action: 'contact'
    }).then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
});
</script>
</body>
<!--**********************************************************************************************************************************************************************************************************


  This site was  Developed By 
                              //******  You can find us on ****//

                      //!  Eri Musa  
           //? Website  : http://dilavermusa.com/
           //? Linkedin : https://www.linkedin.com/in/eri-musa-681332181/


                  //!    Alban Delishi 
         //?  Linkedin : :https://www.linkedin.com/in/alban-delishi-22b485186

                

 ********************************************************************************************************************************************************************************************************** --->
</html>