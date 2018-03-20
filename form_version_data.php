<?php
if(isset($_POST["enregistrer"])){
	$sel = "SELECT * FROM Version WHERE libelle = '".$_POST["titre"]."';";
	$bdd = new connexion();
	$rep = $bdd->query($sel);
	if(sizeof($rep)==0){
		$ins = "INSERT INTO Version(libelle) VALUES('".$_POST["titre"]."');";
		$rep = $bdd->uid($ins);
	}
}
?>
