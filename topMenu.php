<header id="page-topbar" style="background: #1e3c72;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #2a5298, #1e3c72);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #2a5298, #1e3c72); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <div class="navbar-header">
        <!-- LOGO -->
        <div class="navbar-brand-box d-flex align-items-left">
            <a href="dashboard.php" class="logo">
            <img src="assets/images/logo-salva-commercialista-piccolo-trasp.png" alt="" class="col-10">
         
             
            </a>
        <a href="">    <h3 class="text-light" style="padding-top: 20px; font-family: 'Times New Roman', Times, serif;">
                    Salva commercialista 
                </h3>  </a>
            <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">


            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item waves-effect waves-light" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQiTpL5cDSP7-7PqBFa78ejlmBgZVO0hXm-KUQBej0mh4A0M8sO"
                        alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['nome'] ." ".$_SESSION['cognome'] ?></span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <form method="POST" action="dashboard.php">
                        <button class="dropdown-item d-flex align-items-center justify-content-between" type="submit"
                            name="logout">
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav" style="background: #457fca;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #5691c8, #457fca);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #5691c8, #457fca); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="dashboard.php">
                            <i class="feather-home mr-2"></i>Dashboard
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************************************************************************************************************************************************************************************


  This site was  Developed By 
                              //******  You can find us on ****//

                      //!  Eri Musa  
           //? Website  : http://dilavermusa.com/
           //? Linkedin : https://www.linkedin.com/in/eri-musa-681332181/


                  //!    Alban Delishi 
           //? Website  : http://delishicodes.com/
         //?  Linkedin : :https://www.linkedin.com/in/alban-delishi-22b485186
 

 ********************************************************************************************************************************************************************************************************** --->