<?php
if (isset($_POST["connecte"]))
{
	$bdd = new connexion();
	$auth = "SELECT * FROM Utilisateur WHERE login = '".$_POST["login"]."' AND mdp = '".$_POST["mdp"]."';";
	$a = $bdd->query($auth);
	if(sizeof($a) == 1)
	{
		$_SESSION["id"]=$a[0]->id;
		$_SESSION["CONNECT"]= 1;
		echo $_SESSION["id"];
			if($_COOKIE['PHPSESSID'] == $_COOKIE['achat']['id'])
			{
					$_COOKIE['achat']['id'] = $_SESSION["id"];
			}
		//var_dump($_COOKIE);
		header("Location:accueil.php");
	}
}
if(isset($_POST["inscrire"])){
	$bdd = new connexion();
	$auth = "INSERT INTO Utilisateur(login, mdp, mail) VALUES('".$_POST["login"]."', '".$_POST["mdp"]."', '".$_POST["mail"]."');";
	$a = $bdd->uid($auth);
	$_SESSION["CONNECT"]= 1;
	header("Location:accueil.php");
}
if (isset($_POST["deconnecte"]))
{
	setcookie("achat[id]","",0,"/","",0);
	setcookie("achat[produit]","",0,"/","",0);
	session_destroy();
	header("Location:accueil.php");
}
?>
