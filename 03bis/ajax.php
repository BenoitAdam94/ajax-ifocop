<?php
// Connexion à la BDD

$host_db = 'mysql:host=localhost;dbname=connection'; 
$login = 'root'; 
$password = ''; 
$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
				);				
$pdo = new PDO($host_db, $login, $password, $options);

session_start();

$tab = array();
$tab['message'] = '';
$tab['connexion'] = '';

if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {

	$pseudo = trim($_POST['pseudo']);
	$mdp = trim($_POST['mdp']);

	$verif_connexion = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
	$verif_connexion->bindparam(':pseudo', $pseudo, PDO::PARAM_STR);
	$verif_connexion->bindparam(':mdp', $mdp, PDO::PARAM_STR);
	$verif_connexion->execute();

	if($verif_connexion->rowCount() <1) {
		$tab['message'] .= 'Erreur de connection';
	} else {
		$tab['message'] .= 'SUCCESS';
		$infos = $verif_connexion->fetch(PDO::FETCH_ASSOC);
		$_SESSION['pseudo'] = $infos['pseudo'];
		$_SESSION['nom'] = $infos['nom'];
		$_SESSION['prenom'] = $infos['prenom'];
		$_SESSION['email'] = $infos['email'];

		$tab['connexion'] = 'ok';
	}
}


echo json_encode($tab);
?>