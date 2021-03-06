<?php
	session_start();

// if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {

	function __autoload($class)
	{
		static $classDir = '/modeles';
		$file = str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
		require "$classDir/$file";
	}

	// Chargement des classes
	include('../modeles/ConnexionBDD.php');
	include('includes/packageContenus.php');
	include('modeles/ManagerContenu.php');

	$manager = new ManagerContenu();

	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = 0;
	}

	switch ($action) {

		case 'index':
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'presentation':
			$manager->enregistrerTexteMusikEole('presentation.txt', $_POST['formPresentation']);
			$message = 'La présentation a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'accueil':
			$manager->enregistrerTexteMusikEole('accueil.txt', $_POST['formAccueil']);
			$message = 'Le message d\'accueil a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'association':
			$manager->enregistrerTexteMusikEole('association.txt', $_POST['formAssociation']);
			$message = 'La page de l\'association a été enregistrée.';
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'coordonnees':
			$manager->modifierAdresseMusikEole($_POST['adresse'], $_POST['codePostal'], $_POST['ville'], $_POST['telephone'], $_POST['mail']);
			$message = 'Les informations de contact de l\'association ont été enregistrées.';
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'ajouterMembreBureau':
			include('vues/contenu/musikeole/formulaire.php');
			break;

		case 'valider':
			$membre = new MembreBureau($_POST['nom'], $_POST['prenom'], $_POST['role'], $_POST['dateEntree'], $_POST['indice'], $_POST['activite']);
			$info = $manager->creerMembreBureau($membre, $_FILES['photo']);
			if ($info[0]) {
				$message = $_POST['nom'].' '.$_POST['prenom'].' a été ajouté en temps que membre du bureau.';
			}else{
				$message = $info[1];
			}
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'supprimer':
			$manager->supprimerMembreBureau($_GET['id']);
			$message = 'Le membre a été supprimé.';
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		case 'modifier':
			$membre = $manager->getMembreBureau($_GET['id']);
			include('vues/contenu/musikeole/modification.php');
			break;

		case 'validerModification':
			$membre = new MembreBureau($_POST['nom'], $_POST['prenom'], $_POST['role'], $_POST['dateEntree'], $_POST['indice'], $_POST['activite']);
			$membre->setId($_POST['id']);
			$manager->modifierMembreBureau($membre);
			$message = $_POST['nom'].' '.$_POST['prenom'].' a été modifié.';
			if ($_FILES['photo']['size'] > 0) {
				$info = $manager->modifierPhotoMembre($_POST['id'], $_FILES['photo']);
				if (!$info[0]) {
					$message = $info[1];
				}
			}
			$textes = $manager->getTextesMusikEole();
			$membresBureau = $manager->getMembresBureau();
			include('vues/contenu/musikeole/index.php');
			break;

		default:
			$messageErreur = 'Désolé, une erreur est survenue.';
			include('vues/erreur.php');
			break;

	}

// }else{
// 	header('Location: ../index.php');
// 	exit();
// }

?>