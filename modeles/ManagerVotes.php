<?php

	/**
	* Manager des sondages en front-end
	*/
	class ManagerVotes
	{
		
		protected $connexion;

		/**
		 * Constructeur
		 */
		function __construct()
		{
			$this->connexion = new ConnexionBDD();
		}

		/**
		 * Retourne le titre du sondage actif
		 * @return string titre du sondage
		 */
		public function getTitre()
		{
			$reqTitreSondage = $this->connexion->getConnexion()->prepare('SELECT titre FROM sondages WHERE actif = 1');
			$reqTitreSondage->execute();
			$resTitreSondage = $reqTitreSondage->fetch();
			$titre = $resTitreSondage['titre'];
			return $titre;
		}

		/**
		 * Récupère le sondage actif dans la base de données
		 * @return Sondage le sondage actif à afficher sur le site
		 */
		public function getSondage()
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT * FROM sondages WHERE actif = 1');
			$reqSondage->execute();
			$resSondage = $reqSondage->fetch();
			$sondage = new Sondage($resSondage['id'], $resSondage['titre'], $resSondage['votants'], $resSondage['dateCreation'], $resSondage['actif']);
			$listeQuestions = $this->getQuestions($resSondage['id']);
			$sondage->setQuestions($listeQuestions);
			return $sondage;
		}

		/**
		 * Récupère les questions d'un sondage dans la base de données
		 * @param  int $pidSondage 			   identifiant du sondage
		 * @return array<Question>             questions du sondage
		 */
		public function getQuestions($pidSondage)
		{
			$reqQuestions = $this->connexion->getConnexion()->prepare('SELECT * FROM questions WHERE idSondage = ?');
			$reqQuestions->execute(array($pidSondage));
			$listeQuestions = array();
			while ($ligne = $reqQuestions->fetch()) {
				$question = new Question($ligne['id'], $ligne['question'], new Type($ligne['idType']));
				$listePropositions = $this->getPropositions($ligne['id']);
				$question->setPropositions($listePropositions);
				array_push($listeQuestions, $question);
			}
			return $listeQuestions;
		}

		/**
		 * Récupère les propositions d'une question (avec le nombre de votes de chaque proposition)
		 * @param  int $pidQuestion 			   identifiant de la question
		 * @return array<Proposition>              liste des propositions de la question concernée
		 */	
		public function getPropositions($pidQuestion)
		{
			$reqReponses = $this->connexion->getConnexion()->prepare('SELECT * FROM propositionssondages WHERE idQuestion = ?');
			$reqReponses->execute(array($pidQuestion));
			$listePropositions = array();
			while ($ligne = $reqReponses->fetch()) {
				$proposition = new Proposition($ligne['id'], $ligne['proposition']);
				$proposition->setVotes($ligne['votes']);
				array_push($listePropositions, $proposition);
			}
			return $listePropositions;
		}

		/**
		 * Enregistre la réponse à une question dans la base de données
		 * @param  int $idQuestion 		identifiant de la question répondue
		 * @param  int $idReponse  		identifiant de la réponse donnée
		 * @param  string $ip           adresse IP du votant
		 */
		public function enregistrerReponse($idQuestion, $idReponse, $ip)
		{
			$reqAjout = $this->connexion->getConnexion()->prepare('INSERT INTO reponsessondages VALUES (0, ?, ?, ?)');
			$reqAjout->execute(array($ip, $idReponse, $idQuestion));
			$reqIncrementationReponse = $this->connexion->getConnexion()->prepare('UPDATE propositionssondages SET votes = votes + 1 WHERE id = ?');
			$reqIncrementationReponse->execute(array($idReponse));
		}

		/**
		 * Retrouve le sondage auquel appartient la question
		 * @param  int $idQuestion 		identifiant de la question
		 * @return int $idSondage       identifiant du sondage recherché
		 */
		public function trouverSondageAvecQuestion($idQuestion)
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT idSondage FROM questions WHERE id = ?');
			$reqSondage->execute(array($idQuestion));
			$resSondage = $reqSondage->fetch();
			$idSondage = $resSondage['idSondage'];
			return $idSondage;
		}

		/**
		 * Ajoute un vote au total des votes du sondage dans la base de données
		 * @param  int $idSondage identifiant du sondage à incrémenter
		 */
		public function ajoutVoteSondage($idSondage)
		{
			$reqIncrementationSondage = $this->connexion->getConnexion()->prepare('UPDATE sondages SET votants = votants + 1 WHERE id = ?');
			$reqIncrementationSondage->execute(array($idSondage));
		}

		/**
		 * Retourne l'id du sondage actif
		 * @return int identifiant du sondage
		 */
		public function getIdSondageActif()
		{
			$reqSondage = $this->connexion->getConnexion()->prepare('SELECT id FROM sondages WHERE actif = 1');
			$reqSondage->execute();
			$resSondage = $reqSondage->fetch();
			$idSondage = $resSondage['id'];
			return $idSondage;
		}

		/**
		 * Créée un cookie nommé selon l'identifiant du sondage actif et contenant true pour signaler que le navigateur a répondu au sondage
		 */
		public function creerCookie()
		{
			$nomCookie = 'sondage'.$this->getIdSondageActif();
			setcookie($nomCookie, true, time() + 365*24*3600*3, null, null, false, true);
		}

		/**
		 * Vérifie si le cookie portant sur le sondage actif existe et est vrai
		 * @return [type] [description]
		 */
		public function getCookie()
		{
			$bool = false;
			$nomCookie = 'sondage'.$this->getIdSondageActif();
			if (isset($_COOKIE[$nomCookie]) && $_COOKIE[$nomCookie]) {
				$bool = true;
			}
			return $bool;
		}

	}

?>