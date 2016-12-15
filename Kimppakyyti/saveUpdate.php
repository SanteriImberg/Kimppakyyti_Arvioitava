<?php
    session_start();
?>
<html>
    <header>
        <nav>
            <ul>
                <?php
                    if ($_SESSION['loggedin'] == 'yes') {
                        include_once("includes/loggedin_header.php");
                    }else{
                        include_once("includes/header.php");
                    };
                ?>
             </ul>
        </nav>
    </header>
    <head>
    <meta charset="utf-8">
        <link rel="icon" href="img/LOGO_sqr.png">
        <link rel="stylesheet" href="css/tyyli.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/haku.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
        <title>KIMPPAKYYTI</title> 
        


        
    </head>
    
    <!--PROFIILIKUVAN PÄIVITYS TAPAHTUU upload.php FILESSÄ!-->

    <?php
    //TIETOJEN PÄIVITYS

    if(isset($_POST["update"])){ //Onko painettu submit painiketta?
        $updatet['email'] = $_SESSION['email'];
       if ($_POST['givenFname'] == null){ //jos kenttä on jätetty tyhjäksi, päivitetään käynnissä olevan session tieto, muuten se mitä kentässä lukee
            $updatet['fname'] = $_SESSION['fname'];
        }else{
            $updatet['fname'] = $_POST['givenFname'];
        }
        if ($_POST['givenLname'] == null){
            $updatet['lname'] = $_SESSION['lname'];
        }else{
            $updatet['lname'] = $_POST['givenLname'];
        }
        if ($_POST['givenPhone'] == null){
            $updatet['phone'] = $_SESSION['phone'];
        }else{
            $updatet['phone'] = $_POST['givenPhone'];
        }
        print_r($updatet);
        //talletetaan kantaan
            try{
                
                $stm = $DBH->prepare("UPDATE kk_person SET fname=:fname, lname=:lname, phone=:phone WHERE email=:email;");
                if($stm->execute($updatet)){
                    //$_SESSION['viesti'] = "Päivitys onnistui!";
                    
                    //redirect("index.php");
                }else{
                    //$_SESSION['viesti'] = "Päivitys ei onnistunut";
                    //redirect("index.php");
                    
                }
            }catch(PDOException $e){
                //$_SESSION['viesti'] = "Tietokantaongelma"; //. $e.getMessage();
                //redirect("index.php");
            }

    }


    ?>




    <body>
    
        <main>
            
            <section>
                
                <div class="form-style-6">
                    <br><br><br>
                    <h1>Tietosi on nyt tallennettu</h1>
                    <h3>Voit tarkastella tietojasi profiilissasi, kun kirjaudut takaisin sisään.</h3>
                    <br><br>
                    <a href="profile.php"><input type="button" value="Palaa profiiliin" /></a>
                    <a href="logOut.php"><input type="button" value="Kirjaudu ulos" /></a>
				</div>

            </section>


        </main>


    
    </body>
    <footer><center> <i> © Kimppakyyti // 2016</i></center></footer>
</html> 
