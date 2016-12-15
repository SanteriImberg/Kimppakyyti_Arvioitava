<?php
    session_start();
?>
<!DOCTYPE html>


<html>
    <head>
    <meta charset="utf-8">
        <link rel="icon" href="img/LOGO_sqr.png">
        <link rel="stylesheet" href="css/tyyli.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/haku.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
        <title>KIMPPAKYYTI</title>
    </head>
    <body>
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


        <main>
              
              <section>
                  
                      
                      <div class="form-style-6">
                        <br><br>
                        <h1>Päivitä tietoja</h1><br /><p><i>Täytä vain ne kentät, joiden tietoja haluat muuttaa</i></p>
                        <br><br>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                   Valitse uusi profiilikuva:
                                    <br><br>
                                   <input type="file" name="fileToUpload" id="fileToUpload" >
                                   <input type="hidden" name="Pid" value="<?php echo $_SESSION['email']; ?>">
                                   <input type="submit" value="Lataa kuva" name="picupdate">
                                </form>
                          <br><br>
                            <form method="POST" action="saveUpdate.php">
                                <input type="text" name="givenFname" placeholder="Uusi etunimi" />
                                <input type="text" name="givenLname" placeholder="Uusi sukunimi" />
                                <input type="text" name="givenPhone" placeholder="Uusi puhelinnumero" />
                            
                            <input type="submit" name="update" value="Tallenna tiedot" />
                            <a href="profile.php"><input type="button" value="Takaisin" /></a>
                        </form>
                    
                    </div> 
                         
              </section>


              <section>
                  <h3>Tarkastele viimeisiä tarjouksiasi ja pyyntöjäsi</h3>
              </section>


        </main>


    </body>
    <footer><center> <i> © Kimppakyyti // 2016</i></center></footer>
</html>
