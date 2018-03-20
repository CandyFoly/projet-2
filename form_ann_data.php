<?php
if (isset($_POST["record"]))
{
	$bdd = new connexion();
	$insert = "INSERT INTO Annonce (titre, descriptif, prix, ville, id_utilisateur, id_ref) VALUES(:titre, :descriptif, :prix, :ville, :id_utilisateur, :id_ref);";
	$bdd->prepare($insert, array(':titre' => $_POST["titre"],
								':descriptif' => $_POST["desc"],
								':prix'=> $_POST["prix"],
								':ville' => $_POST["ville"],
								':id_utilisateur'=>$_SESSION["id"],
								':id_ref' => $_POST["lstRef"]));	
								
}
else if(isset($_POST["update"])){
	$bdd = new connexion();
	$upt = "UPDATE Annonce SET titre = :titre, descripif = :descriptif, prix = :prix, ville = :ville, id_ref = :id_ref  WHERE id = :id;";
	$bdd->prepare($upt, array(':titre' => $_POST["titre"],
							': descriptif'=>$_POST["desc"],
							':prix'=> $_POST["prix"],
							':ville'=>$_POST["ville"],
							'id_ref'=> $_POST["lstRef"],
							':id'=>$_POST["id"]));
}
else if(isset($_POST["delete"])){
	$bdd = new connexion();
	$del = "DELETE FROM Annonce WHERE id = :id;";
	$bdd->prepare($del, array(':id' => $_POST["id"]));
}
else if(isset($_POST["partager"])){
	
}
else if(isset($_POST["signaler"])){
	
}
else if(isset($_POST["acheter"])){
	echo "panier";
	$id = $_COOKIE["PHPSESSID"];
	$cpt;
	//Pas connecté
	if(!isset($_SESSION["id"])){
		setcookie('achat[id]',$id,time()+3600);
		setcookie('achat[produit]',$_POST["id"],time()+3600);
		var_dump($_COOKIE);
		$cpt++;
		header("Location:panier_main.php");
		
	} //connecté
	else{ 
		$id = $_SESSION["id"];
		setcookie('achat[id]',$id,time()+3600);
		setcookie('achat[produit]',$_POST["id"],time()+3600);
		$cpt++;
		header("Location:panier_main.php");
	}
	var_dump($_COOKIE);
	//header("Location:accueil.php");
	echo "Bien ajouté au panier";
}

