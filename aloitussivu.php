<?php
    session_start(); // aloitetaan sessio
?>
<!DOCTYPE html>
<html>
<head>
<title>Aloitussivu</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Aloitussivu</div>
</div>	
<div class="content">				
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
			Syötä salasana: <input name="salasana" /> <!-- pyydetään käyttäjää syöttämään salasanan-->
			<input type="submit" name="nappi" value="Kirjaudu" /><br/><br/>			
			</form>
<?php
if(isset($_REQUEST["nappi"])) { // jos nappia on painettu suoritetaan seuraava lohko
    $_SESSION['salasana'] = $_REQUEST['salasana']; // sijoitetaan käyttäjän syöttämä salasana globaaliin sessiomuuttujaan
	if($_SESSION['salasana'] == "kissakala") { // mikäli salasana on oikein ohjataan käyttäjää sovelluksen etusivulle 
        header("location:etusivu.php");
    } else {
        echo "Syötit väärän salasanan!"; // muuten tulee virheilmoitus väärästä salasanasta
    }
}
?>
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>