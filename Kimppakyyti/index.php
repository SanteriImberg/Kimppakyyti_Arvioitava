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
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
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
	      		
		      		<img src="img/suurennuslasi.png" width="30%">
		      		<div class="form-style-6">
						<h1>Etsi kyytejä</h1>
						<form>
							<input class="paikka" type="text" name="field1" placeholder="Lähtöpaikka" />
							<input class="paikka" type="text" name="field2" placeholder="Määränpää" />
							<input type="date" placeholder="Päivämäärä" />
                            <input type="submit" value="Etsi" />
							<a href="luo-tarjous.php"><input type="button" value="Luo kyytitarjous" /></a>
						</form>
					</div>
                <br><br><br>
                <h1>Viimeisimmät Kyytitarjoukset</h1>
                <br>
                <?php
                        //Haetaan esim. 12 uusinta
                        if($mediat = getNewestMedia($DBH,4)){
                            foreach($mediat as $media){
                                //HUOM -> notaatio, koska $media on OLIO sisältäen kuvan tiedot!!
                                //mediat on puolestaan taulukko näistä olioista
                     ?>
                             <li class="yhyy">
                                 <br>
                                 <h1><?php echo($media->Odeparture); ?> - <?php echo($media->Oarrival); ?></h1>
                                 <h3><?php echo($media->Odate); ?> ~ KLO <?php echo($media->Otime); ?></h3>
                                 <h3><?php echo($media->Oprice); ?> € / matkustaja </h3>
                                 <h3>Paikkoja vapaana: <?php echo($media->Oseats); ?></h3>
                                 <h3>Auto: <?php echo($media->Ocar); ?></h3>
                                 <button>Ota yhteyttä kuljettajaan</button>
                                 <br>
                             </li>  

                    <?php
                            }
                        }else{
                                echo("Ei toimi");
                        }


                    ?>
	      		
	      	</section>

	      	<section>
	      		<p style="color: #BADBDB;">........................................</p>
	      	</section>
		  
	    </main>
        
    </body>
    <footer><center> <i> © Kimppakyyti // 2016</i></center><br></footer>
    <script src="js/offer.js"></script>
</html>