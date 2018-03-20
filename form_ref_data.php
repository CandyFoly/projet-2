<?php
if(isset($_POST["enregistrer"])){
	$sel = "SELECT * FROM Reference WHERE titre = '".$_POST["titre"]."' AND auteur = '".$_POST["auteur"]."';";
	$bdd = new connexion();
	$rep = $bdd->query($sel);
	if(sizeof($rep)==0){
		$ins = "INSERT INTO Reference(titre, auteur) VALUES('".$_POST["titre"]."', '".$_POST["auteur"]."');";
		$rep = $bdd->uid($ins);
		$sel = "SELECT id FROM Reference WHERE titre = '".$_POST["titre"]."' AND auteur = '".$_POST["auteur"]."';";
		$rep = $bdd->query($sel);
		$ins = "INSERT INTO Vers_Ref VALUES(".$_POST["lstVersion"].", ".$rep[0]->id.")";
		$rep = $bdd->uid($ins);
	}
	else{
		$sel = "SELECT * FROM Vers_Ref WHERE id_ref = ".$rep[0]->id.";";
		$rep = $bdd->query($sel);
		$present = 0;
		for($i=0; $i<sizeof($rep);$i++){
			if($rep[$i]->id_vers == $_POST["lstVersion"]){
				echo $present = 1;
			}
		}
		if($present == 1){
			$ins = "INSERT INTO Vers_Ref VALUES(".$_POST["lstVersion"].", ".$rep[0]->id.")";
			$rep = $bdd->uid($ins);
		}
	}
}
?>
