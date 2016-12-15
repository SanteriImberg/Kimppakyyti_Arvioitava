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
                            include_once("uploads.php");
                        ?>
                     </ul>
                </nav>
            </header>
            
                                            
        
	    <main>
	      	
	      	<section>
	      		
		      		
		      		<div class="form-style-6">
						<h1>Oma profiilisi</h1>
						<p><i>*Muut käyttäjät eivät näe tietojasi*</i></p>
                        
                            <div id="kuvat">
                                <?php //kuvien lisäys
                                    $datat["email"]=$_SESSION["email"];
                                    $sql = $DBH->prepare("SELECT PicLink FROM kk_picture WHERE email = :email;");
                                    $sql->execute($datat);
                                        while($url = $sql->fetch(PDO::FETCH_COLUMN)){
                                            echo('<img src="'.$url.'">');    
                                        };  
                                ?>
                                
                            </div>
                            <div id="tiedot">
                                <br><br><br><br><br><br><br> <!-- sori oikeesti en nyt keksi muutakaa XD -->
                            <?php
                                echo '<div class="tiedot">';
                                echo 'Nimi: '.$_SESSION['fname'].' '.$_SESSION['lname'];
                                echo '<br>';
                                echo 'Sähköposti: '.$_SESSION['email'];
                                echo '<br>';
                                echo 'Puhelinnumero: '.$_SESSION['phone'];
                                echo '<br>';
                                echo 'Sukupuoli: '.$_SESSION['sex'];
                                echo '</div>';
                            ?>
                            </div>
                        </div>
                    </section>
                <section>
                        <div class="form-style-6">
                        <a href="profileUpdate.php"><input type="submit" name="update" value="Päivitä tietoja" /></a>
                        <input type="submit" name="delete" value="Poista profiili" />
                    
					</div> 
	      		       
	      	</section>

	      	<section>
	      		<h3>Tarkastele viimeisiä tarjouksiasi ja pyyntöjäsi</h3>
	      	</section>

	    </main>

    </body>
    <footer><center> <i> © Kimppakyyti // 2016</i></center></footer>
</html>