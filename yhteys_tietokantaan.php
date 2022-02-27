<?php
$yhteys = "mysql:host=localhost;dbname=veikkausliiga"; // luodaan yhteys jota käytetään haussa, lisäämisessä ym.
$kayttajatunnus = "root"; //käyttäjätunnus
$salasana = "";  //salasana joka kannattaa luoda turvalliseksi

try {											
	$yhteys = new PDO($yhteys, $kayttajatunnus, $salasana); //luodaan yhteys-niminen olio php:n PDO -luokasta, joka edustaa itse yhteyttä 
	$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // php.net- manuaalista löytyi paljon tietoa PDO- luokasta ja sen funktioista
	$yhteys->exec("SET CHARACTER SET utf8;");	//katsotaan että merkistö on oikein
}
catch (PDOException $virhe) { 					// Jos yhteyden muodostaminen epäonnistuu tulee virheviesti
	die("Tietokantaan ei saada yhteyttä. Virhe: ".$virhe);
}
?>