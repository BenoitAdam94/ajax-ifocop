<?php

// ajax-post-json.php
// ajax.php
// fichier.json


// json_encode() permet de transformer un tableau array php en format json
// json_decode() permet de transformer un format json en tableau array PHP

// on prépare le tableau array contenant la réponse à renvoyer

$tab = array();
$tab['tableau'] = '';

if(isset($_POST['choix'])) {

    $id_employe = $_POST['choix'];

    // récupération du contenu du fichier .json du serveur
    $fichier = file_get_contents("fichier.json");

    // On transforme le contenu JSON => PHP
    $json = json_decode($fichier, true); // true = array | false (ou rien) = objet

    foreach($json AS $valeur) {
        if($valeur['idEmploye'] == $id_employe) {
			$tab['tableau'] .= '<table border="1">';
			$tab['tableau'] .= '<tr>';
			$tab['tableau'] .= '<th>Nom</th>';
			$tab['tableau'] .= '<th>Prénom</th>';
			$tab['tableau'] .= '<th>Service</th>';
			$tab['tableau'] .= '<th>Salaire</th>';
			$tab['tableau'] .= '<th>Date embauche</th>';
			$tab['tableau'] .= '</tr>';
			
			$tab['tableau'] .= '<tr>';
			$tab['tableau'] .= '<td>' . $valeur['nom'] . '</td>';
			$tab['tableau'] .= '<td>' . $valeur['prenom'] . '</td>';
			$tab['tableau'] .= '<td>' . $valeur['service'] . '</td>';
			$tab['tableau'] .= '<td>' . $valeur['salaire'] . ' €</td>';
			$tab['tableau'] .= '<td>' . $valeur['dateEmbauche'] . '</td>';
			$tab['tableau'] .= '</tr>';
			$tab['tableau'] .= '</table>';
        }
    }

}



echo json_encode($tab);
?>