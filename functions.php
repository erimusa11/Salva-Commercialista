<?php
  //***********************************************************************************************************************************************************************************************************

 
  //This site was  Developed By 
                              //******  You can find us on ****//

                      //!  Eri Musa  
           //? Website  : http://dilavermusa.com/
           //? Linkedin : https://www.linkedin.com/in/eri-musa-681332181/


                  //!    Alban Delishi 
           //? Website  : http://delishicodes.com/
         //?  Linkedin : :https://www.linkedin.com/in/alban-delishi-22b485186
 

 //********************************************************************************************************************************************************************************************************** */
  
date_default_timezone_set('Europe/Rome');
 //db connecion datas
include "dbconnect.php";

// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//*******************************************************this is the log in function *******************************************/
function login()
{
    global $connection;

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = (mysqli_real_escape_string($connection, $password));

        //query to get users from studio
        $query = "SELECT * FROM users WHERE username = '$username' AND password='$password' AND attivo='0'";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if ($count == 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Credenziali non valide")';
            echo '</script';
        }
        while (($row = mysqli_fetch_array($result))) {
            $_SESSION['user_id'] = $row[0];
            $_SESSION['username'] = $row[1];
            $_SESSION['password'] = $row[2];
            $_SESSION['ragione_sociale'] = $row[3];
            $_SESSION['nome'] = $row[4];
            $_SESSION['cognome'] = $row[5];
            $_SESSION['telefono'] = $row[6];
            $_SESSION['citta'] = $row[7];
            $_SESSION['data_attivazione'] = $row[8];
            $_SESSION['numero_accessi'] = $row[9];
            $_SESSION['last_access'] = $row[10];
            $_SESSION['user_livel'] = $row[11];
            $_SESSION['data_disat'] = $row[12];
            $user_id = $_SESSION['user_id'];
            $time = time() + (365 * 24 * 60 * 60);

            $query_upd = "UPDATE users SET last_access ='$time '  WHERE users_id = '$user_id'";
            mysqli_query($connection, $query_upd);

            return header("Location: dashboard.php");
        }
    }
}

//**************************************this is the log in end script********************************************************* */

function registra()
{
    //**************************************this is the register script ********************************************************* */

    global $connection;

    if (isset($_POST['submit'])) {
       
        // Controlla se il form � stato inviato:  
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

         
            // Costruire il POST request:      

            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = '6LdkM-QUAAAAAEiMNvcA5VdHpXhdghdRiIGnQg9X';
            $recaptcha_response = $_POST['recaptcha_response'];

            // Istanziare e decidoficare la richiesta POST:      

            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Azioni da compiere basate sul punteggio ottenuto:      

            if ($recaptcha->score >= 0.5) {
            //    if ($_POST['inputPassword'] == $_POST['passwordbis']) {

                   //    echo $_POST['recaptcha_response']; exit;
                    $email = mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputEmail'])));
                    $query = "SELECT * FROM users WHERE username='$email'";

                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo '
      <script type="text/javascript">
      alert("Username o email utilizzate per un altro account, riprova!");
      </script>';
                    } else {
                        $name = mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputName'])));
                        $surname = mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputCognome'])));
                        $citta = mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputCitta'])));
                        $phone = mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputPhone'])));
                        $password = (mysqli_real_escape_string($connection, strip_tags(trim($_POST['inputPassword']))));
                        $timenow = time();

                        $query = "INSERT INTO users (nome, cognome, username, password ,data_attivazione, citta, telefono,attivo) VALUES ('" . $name . "','" . $surname . "','" . $email . "','" . $password . "','" . $timenow . "','" . $citta . "','" . $phone . "' ,'2')";

                       // echo $query; exit;
                        $result = mysqli_query($connection, $query);

                        if ($result) {

                            //invio i dati a vtiger
                         
                            $request_headers = array();
                            $request_headers[] = 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8';
                            $curlObject = curl_init();

                            $fieldspost['__vtrftk'] = 'sid:03ff0c0ff1a1cdc0504169d3066d9d5c0786b9c0,1585338662';
                            $fieldspost['publicid'] = 'c26a0f5668dbd450cdc3ead7bee52285';
                            $fieldspost['urlencodeenable'] = '1';
                            $fieldspost['name'] = 'salvacommercialista';
                            $fieldspost['lastname'] = $surname;
                            $fieldspost['firstname'] = $name;
                            $fieldspost['email'] = $email;
                            $fieldspost['phone'] = $phone;
                            $fieldspost['city'] = $citta;
                            $fieldspost['data_creazione_lead'] = date('Y-m-d H:i:s');

                            foreach ($fieldspost as $key => $value) {
                                $fields_string .= $key . '=' . $value . '&';
                            }
                            rtrim($fields_string, '&');

                            curl_setopt_array($curlObject, array(
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_HTTPHEADER => $request_headers,
                                CURLOPT_URL => 'http://leonidaconsulting.it/crm/modules/Webforms/capture.php',
                                CURLOPT_POST => count($fieldspost),
                                CURLOPT_POSTFIELDS => $fields_string
                            ));

                            $resp = curl_exec($curlObject);
                            curl_close($curlObject);
                            $response = json_decode($resp, TRUE);



                           
                        }



                        $message = '
    <html>
        <head>
            <title>Benvenuto</title>
        </head>
        <body>
            <h1>Benvenuto nella nostra piattaforma</h1>
            <p>La registrazione &egrave; stata effettuata con successo, puoi attivare la tua utenza cliccando su questo link <a href="http://salvacommercialista.cruscottodicontrollo.it/attiva.php?email=' . trim($email) . '&control=' . trim($timenow) . '" target="_blank"> http://salvacommercialista.cruscottodicontrollo.it/attiva.php?email=' . trim($email) . '&control=' . trim($timenow) . '</a></p>
                <p>
                Una volta confermato il tuo account puoi effettuare il login con le credenziali che hai scelto:<br>
                Username: ' . $email . '<br>
                Password: ' . $password . '
</p>
        </body>
    </html>
';
                        /*  $nome_mittente = "Cruscotto di controllo";
                          $mail_mittente = "studio@155del2017.it";
                          $headers[] = 'MIME-Version: 1.0';
                          $headers[] = 'Content-type: text/html; charset=utf-8';
                          // $headers[] = "From: "  . $mail_mittente . ">";
                          $headers[] = "Reply-To: " . $mail_mittente;
                          //   mail($email, 'Accesso Piattaforma indici allerta OCRI', $message, implode("\r\n", $headers));
                          // Import PHPMailer classes into the global namespace

                         */

                        require 'assets/phpmailer/Exception.php';
                        require 'assets/phpmailer/PHPMailer.php';
                        require 'assets/phpmailer/SMTP.php';

                        $mail = new PHPMailer(true);

                        // Passing `true` enables exceptions
                        //Server settings
                         //$mail->SMTPDebug = 2;  
                                                        // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'wolf.myprivatehosting.biz';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'webmaster@indiciocri.it';                 // SMTP username
                        $mail->Password = 'uYt3@6k5';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                        //Recipients 
                        $mail->setFrom('webmaster@indiciocri.it', 'Piattaforma i Salva commercialista');
                        $mail->addAddress($email, $name);     // Add a recipient
                        // $mail->addReplyTo('info@example.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        //  $mail->addBCC('alessandro.m@studiobrancozzi.it');
                        //Attachments
                        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Accesso Piattaforma  Salva commercialista';
                        $mail->Body = $message;
                        //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        if (!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                            echo 'Message has been sent';
                        }

                       
                        $alert_message = 'Utente registrato con successo! Ti abbiamo inviato una mail per completare la procedura di attivazione!';

                        return header("Location: register-success.php?success=ok");
                 
                    }
            //    }
            } else {

                return header("Location: https://gestionale.cruscottodicontrollo.it/");

                // Non verificato - mostra errore   
            }
        }
    }
}

//**************************************this is the register end script ********************************************************* */
function AttivaUser() {
    global $connection;


    if (isset($_GET['email']) && isset($_GET['control'])) {
        $email = mysqli_real_escape_string($connection, strip_tags(trim($_GET['email'])));
        $control = mysqli_real_escape_string($connection, strip_tags(trim($_GET['control'])));

        $query_check = "SELECT users_id FROM users WHERE username='$email' AND attivo = '2' AND data_attivazione = '$control'";
        $result_check = mysqli_query($connection, $query_check);
      
        $count = mysqli_num_rows($result_check);

        if ($count == 1) {

            $detuser = mysqli_fetch_array($result_check, MYSQLI_ASSOC);
            $query = "UPDATE users SET attivo = '0' WHERE users_id = '" . $detuser['users_id'] . "'";

          
            // echo $query;
            $result = mysqli_query($connection, $query);
            $message = 'success';
        } else {
            $message = 'no';
        }
    } else {
        $message = 'no';
    }
    return $message;
}

//************************************** logout function ********************************************************* */
function logout()
{
    if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        return header("Location: index.php");
        exit();
    }
}
//************************************** /end/ logout function ********************************************************* */



//**************************************  the function on dashboard.php file ********************************************************* */
function dashFunc()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $id_user = $_SESSION['user_id'];
        $week = $_POST['week'];
        $year = $_POST['year'];

        
        /****** CATEGORY: nuovi servizi ******/

        // Nr. Riunioni Colloqui Strategici con clienti
        $nrRiunioni = $_POST['nrRiunioni'];
        if ($nrRiunioni != '') {
            $queryChecknrRiunioni = "SELECT * FROM form WHERE id_subcategory = 1 AND id_category = 1 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrRiunioni = mysqli_query($connection, $queryChecknrRiunioni);
            $countChecknrRiunioni = mysqli_num_rows($resulChecknrRiunioni);
            if ($countChecknrRiunioni == 0) {
                $insertChecknrRiunioni = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nrRiunioni', '$week', '$year', 1, 1, '$id_user')";
                $excetueInsertChecknrRiunioni = mysqli_query($connection, $insertChecknrRiunioni);
            } else {
                $updateChecknrRiunioni = "UPDATE form SET value = '$nrRiunioni' WHERE week = '$week' AND year = '$year' AND id_subcategory = 1 AND id_category = 1 AND id_user = '$id_user'";
                $excetueUpdateChecknrRiunioni = mysqli_query($connection, $updateChecknrRiunioni);
            }
        }

        //Totale Riunioni e colloqui
        $totaleRiunioni = $_POST['totaleRiunioni'];
        if ($totaleRiunioni != '') {
            $queryCheckTotaleRiunioni = "SELECT * FROM form WHERE id_subcategory = 2 AND id_category = 1 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknTotaleRiunioni = mysqli_query($connection, $queryCheckTotaleRiunioni);
            $countCheckTotaleRiunioni = mysqli_num_rows($resulChecknTotaleRiunioni);
            if ($countCheckTotaleRiunioni == 0) {
                $insertCheckTotaleRiunioni = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$totaleRiunioni', '$week', '$year', 2, 1, '$id_user')";
                $excetueInsertCheckTotaleRiunioni = mysqli_query($connection, $insertCheckTotaleRiunioni);
            } else {
                $updateCheckTotaleRiunioni = "UPDATE form SET value = '$totaleRiunioni' WHERE week = '$week' AND year = '$year' AND id_subcategory = 2 AND id_category = 1 AND id_user = '$id_user'";
                $excetueUpdateCheckTotaleRiunioni = mysqli_query($connection, $updateCheckTotaleRiunioni);
            }
        }

        // Ricavi Nuovi Servizi
        $nrRicavi = $_POST['nrRicavi'];
        //remove euro sign
        $nrRicavi = trim($nrRicavi, "€ ");
        if ($nrRicavi != '') {
            $queryChecknrRicavi = "SELECT * FROM form WHERE id_subcategory = 3 AND id_category = 1 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrRicavi = mysqli_query($connection, $queryChecknrRicavi);
            $countChecknrRicavi = mysqli_num_rows($resulChecknrRicavi);
            if ($countChecknrRicavi == 0) {
                $insertChecknrRicavi = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nrRicavi', '$week', '$year', 3, 1, '$id_user')";
                $excetueInsertChecknrRicavi = mysqli_query($connection, $insertChecknrRicavi);
            } else {
                $updateChecknrRicavi = "UPDATE form SET value = '$nrRicavi' WHERE week = '$week' AND year = '$year' AND id_subcategory = 3 AND id_category = 1 AND id_user = '$id_user'";
                $excetueUpdateChecknrRicavi = mysqli_query($connection, $updateChecknrRicavi);
            }
        }


        // Ricavi Totali
        $totaleRicavi = $_POST['totaleRicavi'];
        //remove euro sign
        $totaleRicavi = trim($totaleRicavi, "€ ");
        if ($totaleRicavi != '') {
            $queryChecktotaleRicavi = "SELECT * FROM form WHERE id_subcategory = 4 AND id_category = 1 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecktotaleRicavi = mysqli_query($connection, $queryChecktotaleRicavi);
            $countChecktotaleRicavi = mysqli_num_rows($resulChecktotaleRicavi);
            if ($countChecktotaleRicavi == 0) {
                $insertChecktotaleRicavi = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$totaleRicavi', '$week', '$year', 4, 1, '$id_user')";
                $excetueInsertChecktotaleRicavi = mysqli_query($connection, $insertChecktotaleRicavi);
            } else {
                $updateChecktotaleRicavi = "UPDATE form SET value = '$totaleRicavi' WHERE week = '$week' AND year = '$year' AND id_subcategory = 4 AND id_category = 1 AND id_user = '$id_user'";
                $excetueUpdateChecktotaleRicavi = mysqli_query($connection, $updateChecktotaleRicavi);
            }
        }

        /****** /end/ CATEGORY: nuovi servizi ******/



        /****** CATEGORY: informazioni e vicinanza ai clienti ******/

        //  Nr. contatti settimanale
        $nrContatti = $_POST['nrContatti'];
        if ($nrContatti != '') {
            $queryChecknrContatti = "SELECT * FROM form WHERE id_subcategory = 5 AND id_category = 2 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrContatti = mysqli_query($connection, $queryChecknrContatti);
            $countChecknrContatti = mysqli_num_rows($resulChecknrContatti);
            if ($countChecknrContatti == 0) {
                $insertChecknrContatti = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nrContatti', '$week', '$year', 5, 2, '$id_user')";
                $excetueInsertChecknrContatti = mysqli_query($connection, $insertChecknrContatti);
            } else {
                $updateChecknrContatti = "UPDATE form SET value = '$nrContatti' WHERE week = '$week' AND year = '$year' AND id_subcategory = 5 AND id_category = 2 AND id_user = '$id_user'";
                $excetueUpdateChecknrContatti = mysqli_query($connection, $updateChecknrContatti);
            }
        }


        //  Nr. Clienti
        $nrClienti = $_POST['nrClienti'];
        if ($nrClienti != '') {
            $queryChecknrClienti = "SELECT * FROM form WHERE id_subcategory = 6 AND id_category = 2 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrClienti = mysqli_query($connection, $queryChecknrClienti);
            $countChecknrClienti = mysqli_num_rows($resulChecknrClienti);
            if ($countChecknrClienti == 0) {
                $insertChecknrClienti = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nrClienti', '$week', '$year', 6, 2, '$id_user')";
                $excetueInsertChecknrClienti = mysqli_query($connection, $insertChecknrClienti);
            } else {
                $updateChecknrClienti = "UPDATE form SET value = '$nrClienti' WHERE week = '$week' AND year = '$year' AND id_subcategory = 6 AND id_category = 2 AND id_user = '$id_user'";
                $excetueUpdateChecknrClienti = mysqli_query($connection, $updateChecknrClienti);
            }
        }
        /****** /end/ CATEGORY: informazioni e vicinanza ai clienti ******/


        /****** CATEGORY: Rivoluzionare gli studi ******/

        // Ore passate su adempimenti utili al futuro
        $orePasate = $_POST['orePasate'];
        if ($orePasate != '') {
            $queryCheckorePasate = "SELECT * FROM form WHERE id_subcategory = 7 AND id_category = 3 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulCheckorePasate = mysqli_query($connection, $queryCheckorePasate);
            $countCheckorePasate = mysqli_num_rows($resulCheckorePasate);
            if ($countCheckorePasate == 0) {
                $insertCheckorePasate = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$orePasate', '$week', '$year', 7, 3, '$id_user')";
                $excetueInsertCheckorePasate = mysqli_query($connection, $insertCheckorePasate);
            } else {
                $updateCheckorePasate = "UPDATE form SET value = '$orePasate' WHERE week = '$week' AND year = '$year' AND id_subcategory = 7 AND id_category = 3 AND id_user = '$id_user'";
                $excetueUpdateCheckorePasate = mysqli_query($connection, $updateCheckorePasate);
            }
        }

        // Ore Lavorate
        $oreLavorate = $_POST['oreLavorate'];
        if ($oreLavorate != '') {
            $queryCheckoreLavorate = "SELECT * FROM form WHERE id_subcategory = 8 AND id_category = 3 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulCheckoreLavorate = mysqli_query($connection, $queryCheckoreLavorate);
            $countCheckoreLavorate = mysqli_num_rows($resulCheckoreLavorate);
            if ($countCheckoreLavorate == 0) {
                $insertCheckoreLavorate = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$oreLavorate', '$week', '$year', 8, 3, '$id_user')";
                $excetueInsertCheckoreLavorate = mysqli_query($connection, $insertCheckoreLavorate);
            } else {
                $updateCheckorePasate = "UPDATE form SET value = '$oreLavorate' WHERE week = '$week' AND year = '$year' AND id_subcategory = 8 AND id_category = 3 AND id_user = '$id_user'";
                $excetueUpdateCheckoreLavorate = mysqli_query($connection, $updateCheckorePasate);
            }
        }

        /****** /end/ CATEGORY: Rivoluzionare gli studi ******/

        /****** CATEGORY: formazione ******/

        //Numero ore formazione di tutti
        $oreFormazione = $_POST['hourFormation'];
        if ($oreFormazione != '') {
            $queryCheckoreFormazione = "SELECT * FROM form WHERE id_subcategory = 9 AND id_category = 4 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulCheckoreFormazione = mysqli_query($connection, $queryCheckoreFormazione);
            $countCheckoreFormazione = mysqli_num_rows($resulCheckoreFormazione);
            if ($countCheckoreFormazione == 0) {
                $insertCheckoreFormazione = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$oreFormazione', '$week', '$year', 9, 4, '$id_user')";
                $excetueInsertCheckoreFormazione = mysqli_query($connection, $insertCheckoreFormazione);
            } else {
                $updateCheckoreFormazione = "UPDATE form SET value = '$oreFormazione' WHERE week = '$week' AND year = '$year' AND id_subcategory = 9 AND id_category = 4 AND id_user = '$id_user'";
                $excetueUpdateCheckoreFormazione = mysqli_query($connection, $updateCheckoreFormazione);
            }
        }

        $nrDipendenti = $_POST['nrDipendenti'];
        if ($nrDipendenti != '') {
            $queryChecknrDipendenti = "SELECT * FROM form WHERE id_subcategory = 13 AND id_category = 4 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrDipendenti = mysqli_query($connection, $queryChecknrDipendenti);
            $countChecknrDipendenti = mysqli_num_rows($resulChecknrDipendenti);
            if ($countChecknrDipendenti == 0) {
                $insertChecknrDipendenti = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$oreFormazione', '$week', '$year', 13, 4, '$id_user')";
                $excetueInsertChecknrDipendentie = mysqli_query($connection, $insertChecknrDipendenti);
            } else {
                $updateChecknrDipendenti = "UPDATE form SET value = '$oreFormazione' WHERE week = '$week' AND year = '$year' AND id_subcategory = 13 AND id_category = 4 AND id_user = '$id_user'";
                $excetueUpdateChecknrDipendenti = mysqli_query($connection, $updateChecknrDipendenti);
            }
        }

        /****** /end/ CATEGORY: formazione ******/

        /****** CATEGORY: innovazione ******/
        //Numero di contatti nuovi strumenti
        $nuoviStrumenti = $_POST['nuoviStrumenti'];
        if ($nuoviStrumenti != '') {
            $queryChecknuoviStrumenti = "SELECT * FROM form WHERE id_subcategory = 10 AND id_category = 5 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknuoviStrumenti = mysqli_query($connection, $queryChecknuoviStrumenti);
            $countChecknuoviStrumenti = mysqli_num_rows($resulChecknuoviStrumenti);
            if ($countChecknuoviStrumenti == 0) {
                $insertChecknuoviStrumenti = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nuoviStrumenti', '$week', '$year', 10, 5, '$id_user')";
                $excetueInsertChecknuoviStrumenti = mysqli_query($connection, $insertChecknuoviStrumenti);
            } else {
                $updateChecknuoviStrumenti = "UPDATE form SET value = '$nuoviStrumenti' WHERE week = '$week' AND year = '$year' AND id_subcategory = 10 AND id_category = 5 AND id_user = '$id_user'";
                $excetueUpdateChecknuoviStrumenti = mysqli_query($connection, $updateChecknuoviStrumenti);
            }
        }

        //Numero Contatti
        $nrContattiInnovazione = $_POST['nrContatti'];
        if ($nrContattiInnovazione != '') {
            $queryChecknrContattiInnovazione = "SELECT * FROM form WHERE id_subcategory = 11 AND id_category = 5 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulChecknrContattiInnovazione = mysqli_query($connection, $queryChecknrContattiInnovazione);
            $countChecknrContattiInnovazione = mysqli_num_rows($resulChecknrContattiInnovazione);
            if ($countChecknrContattiInnovazione == 0) {
                $insertChecnrContattiInnovazione = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$nrContattiInnovazione', '$week', '$year', 11, 5, '$id_user')";
                $excetueInsertChecknrContattiInnovazione = mysqli_query($connection, $insertChecnrContattiInnovazione);
            } else {
                $updateChecknrContattiInnovazione = "UPDATE form SET value = '$nrContattiInnovazione' WHERE week = '$week' AND year = '$year' AND id_subcategory = 11 AND id_category = 5 AND id_user = '$id_user'";
                $excetueUpdateChecknrContattiInnovazione = mysqli_query($connection, $updateChecknrContattiInnovazione);
            }
        }
        /****** /end/ CATEGORY: innovazione ******/

        //CATEGORY: clima Aziendale

        //Numero di riunioni strategiche
        $riunioniStretegiche = $_POST['riunioniStretegiche'];
        if ($riunioniStretegiche != '') {
            $queryCheckriunioniStretegiche = "SELECT * FROM form WHERE id_subcategory = 12 AND id_category = 6 AND id_user = '$id_user' AND week='$week' AND year='$year'";
            $resulCheckriunioniStretegiche = mysqli_query($connection, $queryCheckriunioniStretegiche);
            $countCheckriunioniStretegiche = mysqli_num_rows($resulCheckriunioniStretegiche);
            if ($countCheckriunioniStretegiche == 0) {
                $insertChecriunioniStretegiche = "INSERT INTO form (value, week, year, id_subcategory, id_category, id_user) VALUES ('$riunioniStretegiche', '$week', '$year', 12, 6, '$id_user')";
                $excetueInsertCheckriunioniStretegiche = mysqli_query($connection, $insertChecriunioniStretegiche);
            } else {
                $updateCheckriunioniStretegiche = "UPDATE form SET value = '$riunioniStretegiche' WHERE week = '$week' AND year = '$year' AND id_subcategory = 12 AND id_category = 6 AND id_user = '$id_user'";
                $excetueUpdateCheckriunioniStretegiche = mysqli_query($connection, $updateCheckriunioniStretegiche);
            }
        }
        //CATEGORY: /end/ clima Aziendale

        echo '<script> Swal.fire({
            type: "success",
            title: "Congratulazioni!",
            text: "I dati sono stati aggiornarti con succeso",
            confirmButtonClass: "btn btn-confirm mt-2",
        })</script>';

    }
}
//**************************************  /end/ the function on dashboard.php file ********************************************************* */