<?php

//Récupération d'une liste de pathologies

require_once('manager/PathologiesManager.php');

$dsn = 'mysql:dbname=acu;host=127.0.0.1';
$user = 'root';
$password = 'tp';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    die;
}

$pathologiesManager = new PathologiesManager($dbh);

$pathoList = $pathologiesManager->getList();

echo '<h3>Liste des pathologies</h3><br><br>';

$i = 0;

foreach ($pathoList as $patho)
{
	echo 'Pathologie n°'.$j.': '.$patho->getDescription().'<br>';
	echo '&nbsp;&nbsp;&nbsp;Type : '.$patho->getType().'<br><br>';
	
	$meridien = $patho->getMeridien();

	echo '&nbsp;&nbsp;&nbsp;Méridien : '.$meridien->getNom().'<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Element : '.$meridien->getElement().'<br>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yin : '.($meridien->isYin()?'Oui':'Non').'<br><br>';

	echo '&nbsp;&nbsp;&nbsp;Symptomes associés : <br>';

	foreach ($patho->getSymptomes() as $sympt)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Symptôme n°'.$i.': '.$sympt->getDescription().'<br>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aggr : '.($sympt->isAggr()?'Oui':'Non').'<br><br>';
		
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mots-clés associés : <br>';
		
		foreach ($sympt->getMotsCles as $motCle)
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mot-clé n°'.$k.': '.$motCle.'<br><br>';
			$k++;
		}
		
		$i++;		
	}

	$j++;
}
