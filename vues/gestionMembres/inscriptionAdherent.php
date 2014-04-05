<!doctype html>
<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">

		<title>Musik'Eole</title>

		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../assets/css/style.css">                                                              
		<script type="text/javascript" src="../../assets/js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	</head>
	<body>


		<div class="container">
			<div class="jumbotron">
				<h1>Musik'Eole</h1>
				<p>Site de l'association</p>
			</div>
			
		<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
        <li><a href="#">Accueil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Présentation <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Présentation de l'association</a></li>
            <li><a href="#">Présentation des membres</a></li>
            <li><a href="#">Présentation de l'école et des autres associations</a></li>
            <li><a href="#">Coordonnées de l'association</a></li>
            <li><a href="#">Statut et réglement intérieur</a></li>
            <li><a href="#">Charte de l'utilisateur du site</a></li>
            <li><a href="#">Adresses utiles</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li><a href="#">Galerie Photos</a></li>
     	 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exprimez vous ! <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Forum</a></li>
            <li><a href="#">La boîte à idée</a></li>
            <li><a href="#">Editez votre profil</a></li>
          </ul>
        </li>
      </ul>


       <ul class="nav navbar-nav">
     	 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Boutique<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">La bourse au matériel Musical</a></li>
            <li><a href="#">La boutique de l'assoctaion</a></li>
          </ul>
        </li>
      </ul>

        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


        <div class="panel panel-default">
  <div class="panel-body">
    <legend>Présentation</legend>
    Texte
  </div></div>


<div class="row">
  <div class="col-xs-6 col-md-2">
 
<div class="panel panel-default">
  <div class="panel-body">
  
    <legend>Connectez vous</legend>
  <div class="form-group">

  
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
   
  <div class="form-group">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-2 col-sm-10">
      <div class="checkbox">


      </div>
    </div>
  </div>
      <a href="inscription.php">Inscrivez vous ici</a>
  <div class="form-group">
    <div class="col-md-10 col-sm-10">
      <button type="submit" class="btn btn-default">Valider</button>
    </div>
  </div>
        </div>
      </div></div>

    





<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title inscription_title">Devenir membre de l'association</h3>
		</div>
		<div class="panel-body">
				<form role="form" class="form-inline" action="../../modeles/gestionMembres/inscriptionAdherent.php" method="POST">
					<div class="form-group">
                		<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
          			</div>		  	    		  	  	                
					<div class="form-group">                  
			    	    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
			    	</div>	
          <div class="form-group">                  
                <input type="text" class="form-control" id="datenaissance" name="datenaissance" placeholder="Date de naissance">
            </div>    
					<div class="form-group">					
			    		<input type="email" class="form-control" id="mail" name="mail" placeholder="Adresse mail">
			    	</div>
					<div class="form-group">				
			    		<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
			    	</div>
					<div class="form-group">	
			    		<input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
			    	</div>
			    	<div class="form-group">
			    		<input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Code Postal">
			    	</div>
			    	<div class="form-group">
			    		<input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
			    	</div>
			    	<label class="reglement">Voici le règlement de l'association, veuillez le lire avant de soumettre votre adhésion.</label>
			    	<iframe src="../../data/contenu/legal/reglementInterieur.pdf" class="iframe" width="100%" height="350"px;>
			    	</iframe>
			    	<label class="reglement">Une cotisation de 5€ sera demandée pour souscrire à l'association</label>
			    	<br>
			    	<div class="checkbox">
			    		<input type="checkbox" name="checkbox">Cochez cette case si vous confirmez vos informations et si vous avez lu le règlement de l'association.
			    	</div>
			    	<br>
			  		<div class="form-group">
						<button type="submit" class="btn btn-primary adhesion" name="inscriptionAd" id="inscriptionAd" value="inscriptionAd" >Soumettre l'adhésion</button>
					</div>
				</form>
		</div>
	</div>
</div>





  <div class="col-xs-6 col-md-2">


<div class="panel panel-default">
  <div class="panel-body">
    <legend>Newletter</legend>
    <div class="checkbox">
    <label>
      <input type="checkbox"> Je m'inscris à la Newsletter
    </label>
  </div>
  <button type="submit" class="btn btn-default">Valider</button>
</div>
</div>
</div></div>








<div class="row">
<div class="col-md-2 col-md-offset-10">
         <div class="panel panel-default">
  <div class="panel-body">
    <legend>Sondage</legend>

      </div></div></div>



  <div class="col-md-2 col-md-offset-10">
    <div class="panel panel-default">
  <div class="panel-body">
    <legend>Pub</legend>
<img src="http://lorempixel.com/output/fashion-h-c-64-98-4.jpg" alt="img1" />   </div>
</div>
</div>
</div></div>

 
    <div class="panel panel-default">
  <div class="panel-body">
    <legend>Logo des partenaires</legend>
<img src="http://lorempixel.com/output/fashion-h-c-64-98-4.jpg" alt="img1" /> 
<img src="http://lorempixel.com/output/nocturne-q-c-130-120-6.jpg" alt="img1" /> 
</div></div>

   <div align="center">
    Mentions légales - Noms des divers groupes, ect ect 
  
   </div>

	</body>	
</html>
