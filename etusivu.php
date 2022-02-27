<?php
    session_start(); // aloitetaan sessio 
    if(isset($_SESSION['salasana']) && $_SESSION['salasana'] == "kissakala") { // mikäli tänne on saavuttu aloitussivun kautta ja annettu oikea salasana niin jäädään sivulle
    } else {
        header("location: aloitussivu.php"); // muuten palataan aloitussivulle
    }                                        // tämä ratkaisu oli monen mutkan takana ja hieman mietitytti onko tämä oikea paikka sijoittaa?
                                            
    if(isset($_REQUEST["lopetaIstunto"])) { // jos 'Lopeta istunto'- nappi painettu sessio loppuu ja palataan aloitussivulle
        session_unset();
        session_destroy();
        header("location: aloitussivu.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Veikkausliigan etusivu</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Veikkausliigan etusivu</div>
</div>	
<div class="content">				
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h2>Tervetuloa!</h2> </br>
            Täällä voit tarkastaa tuloksia, lisätä ja poistaa joukkueita sekä tehdä muutoksia tulostauluun.			
			Valitse seuraavista: </br></br>
            <a href="nt4a.php">Näytä taulukko</a> </br> <!-- Linkit vievät käyttäjän halutulle sivulle -->
            <a href="nt4b.php">Hae tietoja</a> </br>
            <a href="nt4c.php">Lisää joukkue</a> </br>
            <a href="nt4d.php">Poista joukkue</a> </br>
            <a href="nt4e.php">Muuta tietoja</a> </br></br>
            <input type="submit" name="lopetaIstunto" value="Lopeta Istunto" /> 
			</form>

</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>