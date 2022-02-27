<?php
    session_start(); // sessio aloitetaan 
    if(isset($_SESSION['salasana']) && $_SESSION['salasana'] == "kissakala") { // mikäli käyttäjä tullut aloitussivun kautta pysytään sivulla
    } else {
        header("location: aloitussivu.php"); // muuten käyttäjä ohjataan takaisin aloitussivulle
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" title="tyylit" />
    <title>Tulosta tiedot</title>
</head>
<body>
<div class="container">
<div class="header">
	<div class="otsikko">Veikkausliiga</div>
</div>	
<div class="content">
    <table class="taulukko"> 
    <thead>
    <tr>
        <th>Joukkue</th>  <!-- sarjataulukon otsikot tulostetaan taulukkoon-->
        <th>Ottelut</th>
        <th>Voitot</th>
        <th>Tasapelit</th>
        <th>Tappiot</th>
        <th>Pisteet</th>
    </tr>
    </thead>
    <tbody>
<?php
include("yhteys_tietokantaan.php"); //ensin avataan yhteys tietokantaankantaan
$haku = $yhteys->prepare("SELECT joukkue, ottelut, voitot, tasapelit, tappiot, pisteet FROM sarjataulukko");  //kerrotaan mitkä tiedot haetaan ja mistä taulusta, esim. myös * kuvastaisi kaikkia tietoja
$haku->execute(); //execute suorittaa itse haun kannasta

while ($rivi = $haku->fetch()) { //käydään läpi jokainen rivi taulussa...
    echo '<tr>';
    echo '<td>'. $rivi['joukkue'] . '</td>'; //ja tulostetaan tiedot taulukko-muodossa selaimella
    echo '<td>'. $rivi['ottelut'] . '</td>';
    echo '<td>'. $rivi['voitot'] . '</td>';
    echo '<td>'. $rivi['tasapelit'] . '</td>';
    echo '<td>'. $rivi['tappiot'] . '</td>';  
    echo '<td>'. $rivi['pisteet'] . '</td>';    
    echo '</tr>';
}

?>
</tbody>
</table> </br>
<a href="etusivu.php">Etusivulle</a> <!-- Linkin kautta pääsee takaisin etusivulle-->
</div>

	<div class="footer"><br/>
	</div>
</div>
</body>
</html>
