<?php
session_start();
include "functions.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
$userId = $_SESSION['user_id'];
logout();
global $connection;
dashFunc();

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <title>Salva Commercialista</title>
    <?php include "cssLinks.php"; ?>

    <style>
    .button {
        background-color: #00c6ff;
        /* fallback for old browsers */
        background-color: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
        /* Chrome 10-25, Safari 5.1-6 */
        background-color: linear-gradient(to right, #0072ff, #00c6ff);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    body,header,footer {
  font-family: "Times New Roman", Times, serif;
}
    </style>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="main-content">
            <?php include "topMenu.php"; ?>
            <div class="page-content">
                <div class=" ">
                    <div class="card" style="border: 0.7mm ridge #00c6ff;">
                        <div class="card-body d-flex justify-content-between">
                        
                        <div class="row">
                     <div class="col-8">  
                   
                     <h6 class="card-title text-center">Livello commercialista strategico</h6>
                     <center>
                     <label for="">
                            <?php     if(isset($_GET['selectedweek'])){
                                echo "Settimana ".$_GET['selectedweek'];
                            } else{
                                $today1 = date('Y-m-d');
                                $newDate1 = new DateTime($today1);
                                $currentWeek1 = $newDate1->format("W");
                                 echo "Settimana ".$currentWeek1;
                            } ?>
                        </label> </center>
                        </div>
                        
                        <input data-plugin="knob" id="grafico" data-width="120" data-height="120" data-linecap=round
                                                value="0" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1"/></div>
                            <form  id="weekform" method="POST" action="dashboard.php<?php if(isset($_GET['selectedweek'])){
                                echo '?selectedweek='.$_GET['selectedweek'];
                            }
                                ?>" class="needs-validation" novalidate>
                                <h4 class="card-title text-center">Seleziona la settimana</h4>
                              
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <select class="form-control  " id="select2" data-toggle="select2" name="week" onchange="window.location.href='dashboard.php?selectedweek='+this.value"  required>
                                
                                        <?php

                                        //get current number week
                                        $today = date('Y-m-d');
                                        $newDate = new DateTime($today);
                                        $currentWeek = $newDate->format("W");
                                     

                                        //get all year weeks
                                        $year = date('Y');
                                        $weeks = getIsoWeeksInYear($year);

                                        function getStartAndEndDate($week1, $year1) {
                                            $dto = new DateTime();
                                            $dto->setISODate($year1, $week1);
                                            $ret['week_start'] = $dto->format('Y-m-d');
                                            $dto->modify('+6 days');
                                            $ret['week_end'] = $dto->format('Y-m-d');
                                            return $ret;
                                          }
                                          
                                          function getIsoWeeksInYear($year)
                                          {
                                              $date = new DateTime;
                                              $date->setISODate($year, 53);
                                              return ($date->format("W") === "53" ? 53 : 52);
                                          }

                                                 // if the button i click search for that week if not current week
                                                 if(isset($_GET['selectedweek'])){
                                                    $selectedWeek = $_GET['selectedweek'];
                                                   
                                                }  else {
                                                    $selectedWeek = $newDate->format("W");
                                                } 
                                                $currentWeek = $newDate->format("W");
                                                
                                            

                                      
                                        for ($x = 1; $x <= $weeks; $x++) {

                                                    $week_array = getStartAndEndDate($x,$year);
                                                
                                            if ($x <= $currentWeek) { 
                                                if($x != $selectedWeek ){
                                                    echo '<option    value="' . $x . '"> Settimana ' . $x .': '.date('d-m-Y', strtotime($week_array['week_start']))  .' / '.date('d-m-Y', strtotime($week_array['week_end'])) .'</option>';
                                                }else {
                                                    echo '<option selected   value="' . $x . '"> Settimana ' . $x .': '.date('d-m-Y', strtotime($week_array['week_start']))  .' / '.date('d-m-Y', strtotime($week_array['week_end'])) .'</option>';
                                                }
                                             
                                            }  else {
                                                echo '<option value="' . $x . '" disabled="disabled">Settimana ' . $x .': '.date('d-m-Y', strtotime($week_array['week_start'])) .' / '.date('d-m-Y', strtotime($week_array['week_end'])).'</option>';
                                            } 
                                        }

                                            $currentWeek = $selectedWeek;
                                        
                                        ?>
                                    </select>
                                 
                            
                                </div>
                                <input hidden value="<?php echo $year; ?>" name="year">
                        </div> <!-- end card-body-->
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-xl-7 col-lg-7">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;" >
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row justify-content-between">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-4 col-4">
                                                    <h1 class="card-title text-info"><u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2"></i> Nuovi Servizi </u></h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input data-plugin="knob"  data-width="80" data-height="80"
                                                            data-linecap=round data-fgColor="#31cb72" value="0"
                                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                            data-thickness=".1" id="graph1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="nrRiunioni"> <i class="feather-info text-info"></i>
                                                            Nr. Riunioni Colloqui Strategici con
                                                            clienti settimanale</label>
                                                        <?php
                                                        $shownrRiunioni = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 1 AND id_category = 1 and id_user = '$userId' ";
                                                        $resultnrRiunioni = mysqli_query($connection, $shownrRiunioni);
                                                        $rownrRiunioni = mysqli_fetch_assoc($resultnrRiunioni);
                                                        $valuenrRiunioni = $rownrRiunioni['value'];
                                                        ?>
                                                        <input type="text" id="nrRiunioni" name="nrRiunioni"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuenrRiunioni ?>">
                                                        <div class="invalid-feedback invalid1">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label for="totaleRiunioni"><i
                                                                class="feather-info text-info"></i> Totale Riunioni
                                                            e
                                                            colloqui settimanale</label>
                                                        <?php
                                                        $showtotaleRiunioni = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 2 AND id_category = 1 and id_user = '$userId' ";
                                                        $resulttotaleRiunioni = mysqli_query($connection, $showtotaleRiunioni);
                                                        $rowtotaleRiunioni = mysqli_fetch_assoc($resulttotaleRiunioni);
                                                        $valuetotaleRiunioni = $rowtotaleRiunioni['value'];
                                                        ?>
                                                        <input type="text" id="totaleRiunioni" name="totaleRiunioni"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuetotaleRiunioni ?>">
                                                        <div class="invalid-feedback invalid2">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <output id="benchmark1"
                                                                class="output-cal font-weight-bold  rounded-lg  border border-warning text-dark"
                                                                style="padding: 12px;"></output> 
                                                                <br>
                                                                
                                                        </div> 
                                                        
                                                    </div>
                                                    
                                                </div> <!-- end col -->

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="nrRicavi"><i class="feather-info text-info"></i>
                                                            Ricavi Nuovi Servizi settimanale</label>
                                                        <?php
                                                        $shownrRicavi = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 3 AND id_category = 1 and id_user = '$userId' ";
                                                        $resultnrRicavi = mysqli_query($connection, $shownrRicavi);
                                                        $rownrRicavi = mysqli_fetch_assoc($resultnrRicavi);
                                                        $valuenrRicavi = $rownrRicavi['value'];
                                                        ?>
                                                        <input type="text" id="nrRicavi" name="nrRicavi"
                                                            placeholder="Inserisci il numero" data-a-sign="€ "
                                                            class="form-control autonumber"
                                                            value="<?php echo $valuenrRicavi ?>">
                                                        <div class="invalid-feedback invalid3">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label for="totaleRicavi"><i class="feather-info text-info"></i>
                                                            Ricavi Totali settimanale</label>
                                                        <?php
                                                        $showtotaleRicavi = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 4 AND id_category = 1 and id_user = '$userId' ";
                                                        $resulttotaleRicavi = mysqli_query($connection, $showtotaleRicavi);
                                                        $rowtotaleRicavi = mysqli_fetch_assoc($resulttotaleRicavi);
                                                        $valuetotaleRicavi = $rowtotaleRicavi['value'];
                                                        ?>
                                                        <input type="text" id="totaleRicavi" name="totaleRicavi"
                                                            data-a-sign="€ " class="form-control autonumber"
                                                            placeholder="Inserisci il numero"
                                                            value="<?php echo $valuetotaleRicavi ?>">
                                                        <div class="invalid-feedback invalid4">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <output id="benchmark2"
                                                                class="output-cal font-weight-bold  rounded-lg  border border-warning text-dark"
                                                                style="padding: 12px;"></output>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>


                        <div class="col-xl-5 col-lg-5 ">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="card-title text-info"><u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2 text-info"></i> Informazioni
                                                            e
                                                            vicinanza ai clienti </u></h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input id="graph2" data-plugin="knob" data-width="80"
                                                            data-height="80" data-linecap=round data-fgColor="#31cb72"
                                                            value="0" data-skin="tron" data-angleOffset="180"
                                                            data-readOnly=true data-thickness=".1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="nrContatti"><i class="feather-info text-info"></i>
                                                            Nr. contatti settimanale </label>
                                                        <?php
                                                        $shownrContatti = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 5 AND id_category = 2 and id_user = '$userId' ";
                                                        $resultnrContatti = mysqli_query($connection, $shownrContatti);
                                                        $rownrContatti = mysqli_fetch_assoc($resultnrContatti);
                                                        $valuenrContatti = $rownrContatti['value'];
                                                        ?>
                                                        <input type="text" id="nrContatti" name="nrContatti"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuenrContatti ?>">
                                                        <div class="invalid-feedback invalid5">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label for="nrClienti"> <i class="feather-info text-info"></i>
                                                            Nr. Clienti settimanale</label>
                                                        <?php
                                                        $shownrClienti = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 6 AND id_category = 2 and id_user = '$userId' ";
                                                        $resultnrClienti = mysqli_query($connection, $shownrClienti);
                                                        $rownrClienti = mysqli_fetch_assoc($resultnrClienti);
                                                        $valuenrClienti = $rownrClienti['value'];
                                                        ?>
                                                        <input type="text" id="nrClienti" name="nrClienti"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuenrClienti ?>">
                                                        <div class="invalid-feedback invalid6">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>


                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="card-title text-info"><u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2"></i> Rivoluzionare gli studi settimanale
                                                        </u>
                                                    </h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input id="graph3" data-plugin="knob" data-width="80"
                                                            data-height="80" data-linecap=round data-fgColor="#31cb72"
                                                            value="0" data-skin="tron" data-angleOffset="180"
                                                            data-readOnly=true data-thickness=".1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="orePasate"><i class="feather-info text-info"></i>
                                                            Ore passate su adempimenti utili al
                                                            futuro settimanale</label>
                                                        <?php
                                                        $showorePasate = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 7 AND id_category = 3 and id_user = '$userId' ";
                                                        $resultorePasate = mysqli_query($connection, $showorePasate);
                                                        $roworePasate = mysqli_fetch_assoc($resultorePasate);
                                                        $valueorePasate = $roworePasate['value'];
                                                        ?>
                                                        <input type="text" id="orePasate" name="orePasate"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valueorePasate ?>">
                                                        <div class="invalid-feedback invalid7">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label for="oreLavorate"><i class="feather-info text-info"></i>
                                                            Ore Lavorate settimanale</label>
                                                        <?php
                                                        $showoreLavorate = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 8 AND id_category = 3 and id_user = '$userId' ";
                                                        $resultoreLavorate = mysqli_query($connection, $showoreLavorate);
                                                        $roworeLavorate = mysqli_fetch_assoc($resultoreLavorate);
                                                        $valueoreLavorate = $roworeLavorate['value'];
                                                        ?>
                                                        <input type="text" id="oreLavorate" name="oreLavorate"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valueoreLavorate ?>">
                                                        <div class="invalid-feedback invalid8">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="card-title text-info"> <u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2"></i> Formazione </u></h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input id="graph4" data-plugin="knob" data-width="80"
                                                            data-height="80" data-linecap=round data-fgColor="#31cb72"
                                                            value="0" data-skin="tron" data-angleOffset="180"
                                                            data-readOnly=true data-thickness=".1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="hourFormation"> <i
                                                                class="feather-info text-info"></i> Numero ore
                                                            formazione di
                                                            tutti settimanale</label>
                                                        <?php
                                                        $showhourFormation = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 9 AND id_category = 4 and id_user = '$userId' ";
                                                        $resulthourFormation = mysqli_query($connection, $showhourFormation);
                                                        $rowhourFormation = mysqli_fetch_assoc($resulthourFormation);
                                                        $valuehourFormation = $rowhourFormation['value'];
                                                        ?>
                                                        <input type="text" id="hourFormation" name="hourFormation"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuehourFormation ?>">
                                                        <div class="invalid-feedback invalid9">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label for="nrDipendenti"><i class="feather-info text-info"></i>
                                                            Numero dipendenti settimanale</label>
                                                        <?php

                                                        $shownrDipendenti = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 13 AND id_category = 4 and id_user = '$userId' ";
                                                        $resultnrDipendenti = mysqli_query($connection, $shownrDipendenti);
                                                        $rownrDipendenti = mysqli_fetch_assoc($resultnrDipendenti);
                                                        $valuenrDipendenti = $rownrDipendenti['value'];
                                                        ?>
                                                        <input type="text" id="nrDipendenti" name="nrDipendenti"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuenrDipendenti ?>">
                                                        <div class="invalid-feedback invalid10">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="card-title text-info"><u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2"></i> Innovazione </u></h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input id="graph5" data-plugin="knob" data-width="80"
                                                            data-height="80" data-linecap=round data-fgColor="#31cb72"
                                                            value="0" data-skin="tron" data-angleOffset="180"
                                                            data-readOnly=true data-thickness=".1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                 
                                                <div class="form-group">
                                                        <label for="nuoviStrumenti"><i
                                                                class="feather-info text-info"></i> Numero di
                                                            contatti
                                                            nuovi
                                                            strumenti settimanale</label>
                                                        <?php
                                                        $shownuoviStrumenti = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 10 AND id_category = 5 and id_user = '$userId' ";
                                                        $resulthourFormation = mysqli_query($connection, $shownuoviStrumenti);
                                                        $rownuoviStrumenti = mysqli_fetch_assoc($resulthourFormation);
                                                        $valuenuoviStrumenti = $rownuoviStrumenti['value'];
                                                        ?>
                                                        <input type="text" id="nuoviStrumenti" name="nuoviStrumenti"
                                                            class="form-control" placeholder="Inserisci il numero"
                                                            value="<?php echo $valuenuoviStrumenti ?>">
                                                        <div class="invalid-feedback invalid11">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="border: 0.3mm ridge #00c6ff;">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 col-xl-12 col-lg-12 ">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="card-title text-info"><u
                                                            style="text-decoration: overline"> <i
                                                                class="feather-share-2"></i> Clima Aziendale</u>
                                                    </h1>
                                                </div>
                                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <div class="center">
                                                        <input id="graph6" data-plugin="knob" data-width="80"
                                                            data-height="80" data-linecap=round data-fgColor="#31cb72"
                                                            value="0" data-skin="tron" data-angleOffset="180"
                                                            data-readOnly=true data-thickness=".1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="riunioniStretegiche"><i
                                                                class="feather-info text-info"></i> Numero di
                                                            riunioni
                                                            strategiche settimanale</label>
                                                        <?php
                                                        $showriunioniStretegiche = "SELECT value FROM form WHERE week = '$currentWeek' AND year = '$year' AND id_subcategory = 12 AND id_category = 6 and id_user = '$userId' ";
                                                        $resultriunioniStretegiche = mysqli_query($connection, $showriunioniStretegiche);
                                                        $rowriunioniStretegiche = mysqli_fetch_assoc($resultriunioniStretegiche);
                                                        $valueriunioniStretegiche = $rowriunioniStretegiche['value'];
                                                        ?>
                                                        <input type="text" id="riunioniStretegiche"
                                                            name="riunioniStretegiche" class="form-control"
                                                            placeholder="Inserisci il numero"
                                                            value="<?php echo $valueriunioniStretegiche ?>">
                                                        <div class="invalid-feedback invalid13">
                                                            Il numero non dovrebbe essere negativo!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class=" button  btn btn-info btn-sm" id="aggiorna" type="submit" name="submit"><i
                                    class="feather-check"></i> Aggiorna
                            </button>
                        </div>
                        </form>
                    </div>
                    <!-- end row-->
                    <!-- container-fluid -->
                    <?php //include "charts.php"; 
                    ?>
                </div>
                <?php include "footer.php"; ?>
            </div>
            <!-- END layout-wrapper -->
            <?php include "scripts.php";
            dashFunc();
            ?>
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
 

 ********************************************************************************************************************************************************************************************************** --->
</html>