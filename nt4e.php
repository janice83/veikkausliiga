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
<title>Näyttötehtävä 4e</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Muuta tietoja</div>
</div>	
<div class="content">				
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
	Joukkue jonka tiedot päivitetään: <br/><input name="joukkue" /><br/> <!-- pyydetään käyttäjältä joukkueen nimi johon muutokset kohdistuu taulukossa-->
	<input type="submit" name="nappi" value="Hae" /><br/><br/>			
	</form>
<?php
include("yhteys_tietokantaan.php"); // luodaan yhteys tietokantaan

if(isset($_REQUEST["nappi"])) { // ensin haetaan joukkue nimellä 
    $haku = $yhteys->prepare("SELECT * FROM sarjataulukko WHERE joukkue= :joukkue"); 
	$joukkue = $_REQUEST['joukkue']; 
    $haku->bindParam(":joukkue",$joukkue); 
	$haku->execute();
	$rivi=$haku->fetch();
    ?>
	<h2>Tallenna muutokset</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Joukkue:<input name="joukkue" value="<?php echo $rivi['joukkue'];?>"><br/> <!--tulostetaan joukkueen tiedot lomakkeessa johon muutokset tehdään -->
	Ottelut:<input name="ottelut" value="<?php echo $rivi['ottelut'];?>"><br/>
    Voitot:<input name="voitot" value="<?php echo $rivi['voitot'];?>"><br/>
    Tasapelit:<input name="tasapelit" value="<?php echo $rivi['tasapelit'];?>"><br/>
    Tappiot:<input name="tappiot" value="<?php echo $rivi['tappiot'];?>"><br/>
    Pisteet:<input name="pisteet" value="<?php echo $rivi['pisteet'];?>"><br/>
	<input name="muutosnappi" type="submit" value="Tallenna"/> 
	</form>
<?php
}
if(isset($_REQUEST['muutosnappi'])){ // jos nappia painetaan tallentuu uudet tiedot tietokantaan
	$muutos = $yhteys->prepare("UPDATE sarjataulukko SET joukkue= :joukkue, ottelut= :ottelut, voitot= :voitot, tasapelit= :tasapelit, tappiot= :tappiot, pisteet= :pisteet WHERE joukkue= :joukkue");
	$joukkue=$_REQUEST['joukkue']; // lomakkeeseen syötetyt tiedot sijoitetaan muuttujiin. mikäli tietoja ei muutettu tallentuu vanhat tiedot
	$ottelut=$_REQUEST['ottelut'];
    $voitot=$_REQUEST['voitot'];
    $tasapelit=$_REQUEST['tasapelit'];
    $tappiot=$_REQUEST['tappiot'];
    $pisteet=$_REQUEST['pisteet'];
	$muutos->bindParam(":joukkue",$joukkue); // sidotaan muuttuja ja sql-parametri yhteen
	$muutos->bindParam(":ottelut",$ottelut);
    $muutos->bindParam(":voitot",$voitot);
    $muutos->bindParam(":tasapelit",$tasapelit);
    $muutos->bindParam(":tappiot",$tappiot);
    $muutos->bindParam(":pisteet",$pisteet);
	$muutos->execute(); // tallennetaan muutos
}
?>
</br><a href="etusivu.php">Etusivulle</a>
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>