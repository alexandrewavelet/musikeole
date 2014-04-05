<?php
	session_start();

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('../modeles/contenus/Association.php');
	include('../modeles/agenda/Manifestation.php');
	include('modeles/ManagerAgenda.php');

	$manager = new ManagerAgenda();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 'index';
	}

	switch ($action) {

		case 'ajouterManifestation':
			$associations = $manager->getAssociations();
			include('vues/agenda/formulaire.php');
			break;

		case 'creerManifestation':
			$nomImage = $manager->getNomFichierAleatoire();
			$manifestation = new Manifestation(0, $_POST['nom'], $_POST['description'], $_POST['date'], $_POST['heure'], $_POST['places'], $nomImage, $_POST['gratuit'], $_POST['prixAdh'], $_POST['prixExt'], $_POST['prixEnf'], $_POST['association']);
			$info = $manager->ajouterManifestation($manifestation, $_FILES['image']);
			$message = 'La manifestation "'.$_POST['nom'].'" a été ajoutée.';
			if (!$info[0]) {
				$message = $info[1];
			}
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			include('vues/agenda/index.php');
			break;

		case 'supprimerManifestation':
			$manager->supprimerManifestation($_GET['id']);
			$message = 'La manifestation a été supprimée';
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			include('vues/agenda/index.php');
			break;

		case 'index':
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			include('vues/agenda/index.php');
			break;

		default:
			$manifestationsAVenir = $manager->getManifestationsAVenir();
			$manifestationsPassees = $manager->getManifestationsPassees();
			$manifestationsEnAttente = $manager->getManifestationsEnAttente();
			include('vues/agenda/index.php');
			break;

	}

?>