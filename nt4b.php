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
<title>Tietojen haku</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Tietokannasta haku</div>
</div>	
<div class="content">				
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Hae joukkueen nimellä: <input name="nimi"> <!--Käyttäjä syöttää joukkueen nimen -->
    <input type="submit" name="haku" value="Hae">
    </form>
<?php
include("yhteys_tietokantaan.php"); // luodaan yhteys tietokantaan

if(isset($_REQUEST['haku'])) {
	$hae_tiedot = $yhteys->prepare("SELECT ottelut, voitot, tasapelit, tappiot, pisteet FROM sarjataulukko WHERE joukkue= :nimi"); // ilmoitetaan mitkä tiedot haetaan sarjataulukosta
	$nimi=$_REQUEST['nimi']; //lomakkeeseen syötetty nimi sijoitetaan muuttujaan $nimi
	$hae_tiedot->bindParam(":nimi",$nimi); // bindParam()- funktio sitoo muuttujan ja sql-parametrin toisiinsa 
	$hae_tiedot->execute(); // suoritetaat itse haku
	$rivi=$hae_tiedot->fetch();  
	echo "</br>Joukkue: ".$nimi . ", Ottelut: " .$rivi['ottelut'] . ", Voitot: " . $rivi['voitot'] . ", Tasapelit: " . $rivi['tappiot'] . ", Pisteet: " . $rivi['pisteet']; // tulostetaan tiedot
}
?>
</br><a href="etusivu.php">Etusivulle</a>
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>