<?php
    session_start();
	if(isset($_SESSION['salasana']) && $_SESSION['salasana'] == "kissakala") {
    } else {
        header("location: aloitussivu.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Tiedon poisto</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Poista joukkue</div>
</div>	
<div class="content">				
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
			Poistettava joukkue: <input name="joukkue" /> <!-- käyttäjä syöttää poistettavan joukkueen nimen -->
			<input type="submit" name="nappi" value="Poista" /><br/><br/>			
			</form>
<?php
include("yhteys_tietokantaan.php"); 

if(isset($_REQUEST["nappi"])) { // jos nappia painetaan suoritetaan poisto, Delete from- kertoo mistä poistetaan ja Where kertoo mitä poistetaan 
	$poisto = $yhteys->prepare("DELETE FROM sarjataulukko WHERE joukkue= :joukkue");
	$joukkue=$_REQUEST['joukkue']; // sijoitetaan lomakkeen kenttään kirjoitettu nimi muuttujaan
	$poisto->bindParam(":joukkue",$joukkue); 
	$poisto->execute(); // suoritetaan poisto
}
?>
</br><a href="etusivu.php">Etusivulle</a>
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>