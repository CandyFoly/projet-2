<?php
include("corps.php");
$bdd = new connexion();
$auth = "SELECT * FROM Utilisateur;";
$a = $bdd->query($auth);
echo "Utilisateur : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->login." - ";
}
echo "<br>";
$auth = "SELECT * FROM Reference;";
$a = $bdd->query($auth);
echo "Reference : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->titre." - ";
}
echo "<br>";
$auth = "SELECT * FROM Version;";
$a = $bdd->query($auth);
echo "Version : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->libelle." - ";
}
echo "<br>";
$auth = "SELECT * FROM Annonce;";
$a = $bdd->query($auth);
echo "Annonce : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->id." ".$a[$i]->titre." - ".$a[$i]->id_utilisateur." - ref :".$a[$i]->id_ref." ";
}
echo "<br>";
$auth = "SELECT * FROM _META_MENU;";
$a = $bdd->query($auth);
echo "_META_MENU : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->id." ".$a[$i]->libelle."(".$a[$i]->chemin.") - ";
}
echo "<br>";
$auth = "SELECT * FROM _META_Form;";
$a = $bdd->query($auth);
echo "_META_Form : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->id." ".$a[$i]->action." - ";
}
echo "<br>";
$auth = "SELECT * FROM _META_Recherche;";
$a = $bdd->query($auth);
echo "_META_Recherche : ";
echo "<ul>";
for($i=0;$i<sizeof($a);$i++){
	echo "<li>".$a[$i]->id."</li>";
	echo "<li>".$a[$i]->name."</li>";
	echo "<li>".$a[$i]->type."</li>";
	echo "<li>".$a[$i]->label."</li>";
	echo "<li>".$a[$i]->source_data."</li>";
	echo "<li>".$a[$i]->source_table."</li>";
	echo "<li>".$a[$i]->donnee_cible."</li>";
	echo "<li>".$a[$i]->numero."</li>";
	echo "<li>".$a[$i]->operateur."</li>";
	echo "<li>".$a[$i]->id_F."</li>";
}
echo "</ul>";

echo "<br>";
$auth = "SELECT * FROM Vers_Ref;";
$a = $bdd->query($auth);
echo "Vers_Ref : ";
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->id_vers." ".$a[$i]->id_ref." - ";
}
/*$auth = "INSERT INTO Ref_Cat VALUES(1,1);";
$a = $bdd->uid($auth);*/

echo "CATEGORIE : ";
$auth = "SELECT * FROM Categorie;";
$a = $bdd->query($auth);
for($i=0;$i<sizeof($a);$i++){
	echo $a[$i]->libelle;
}
echo "<br>";

$up = "Select * FROM Annonce_Recherche ;";
$a = $bdd->query($up);
var_dump($a);

?>

<div id="accueil">
	Bienvenue
</div>
		



