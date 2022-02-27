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
    <title>Tietojen lisäys</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Joukkueen lisäys</div>
</div>	
<div class="content">				
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
	Joukkue: <input name="joukkue"><br/> <!--Käyttäjä lisää uuden joukkueen tiedot täyttämällä lomakkeen-->
    Ottelut: <input name="ottelut"><br/>
    Voitot: <input name="voitot"><br/>
    Tasapelit: <input name="tasapelit"><br/>
    Tappiot: <input name="tappiot"><br/>
    Pisteet: <input name="pisteet"><br/><br/>
    <input type="submit" name="lisays" value="Lisää">			
	</form>
<?php
include("yhteys_tietokantaan.php"); // luodaan yhteys tietokantaan
if(isset($_REQUEST["lisays"])) { 
	$joukkue=$_REQUEST['joukkue']; // sijoitetaan lomakkeeseen syötetyt tiedot muuttujiin
	$ottelut=$_REQUEST['ottelut'];
	$voitot=$_REQUEST['voitot'];
	$tasapelit=$_REQUEST['tasapelit'];
	$tappiot=$_REQUEST['tappiot'];
    $pisteet=$_REQUEST['pisteet'];
	// Insert into= mihin lisätään tiedot, values= mitkä tiedot lisätään
	$lisays=$yhteys->prepare("INSERT INTO sarjataulukko (joukkue, ottelut, voitot, tasapelit, tappiot, pisteet) VALUES (:joukkue, :ottelut, :voitot, :tasapelit, :tappiot, :pisteet)");
	$lisays->bindParam(":joukkue",$joukkue); // bindParam()-funktiolla sidotaan yhteen muuttuja ja sql-parametri
	$lisays->bindParam(":ottelut",$ottelut);
	$lisays->bindParam(":voitot",$voitot);
	$lisays->bindParam(":tasapelit",$tasapelit);
	$lisays->bindParam(":tappiot",$tappiot);
    $lisays->bindParam(":pisteet",$pisteet);
	$lisays->execute();//suoritetaan tietojen lisäys 	
}
?>
</br><a href="etusivu.php">Etusivulle</a>
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>