<?php
session_start();
require("class/autoloader.class.php");
Autoloader::register();
$select = "SELECT * FROM _META_MENU;";
$bdd = new connexion();
$rep = $bdd->query($select);
?>

<html>
<head>
<title>Accueil</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div id="menu">
			<?php
			echo "<ul>";
			for($i=0; $i<sizeof($rep); $i++){
				echo "<li><a href='".$rep[$i]->chemin.".php'>".$rep[$i]->libelle."</a></li>";
			}
			echo "</ul>";
			?>
		</div>
	</body>
</html>
