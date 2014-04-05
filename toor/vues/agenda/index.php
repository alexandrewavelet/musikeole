<?php include("includes/header.php"); ?>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Agenda</h1>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#manifestations" data-toggle="tab">À venir</a></li>
				<li><a href="#inscriptions" data-toggle="tab">Inscriptions</a></li>
				<li><a href="#enAttente" data-toggle="tab">en Attente</a></li>
				<li><a href="#inscriptions" data-toggle="tab">Historique</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="manifestations">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, unde, pariatur, eos assumenda doloremque officia facere quas quos rerum aliquam veritatis debitis modi quisquam dolores excepturi perferendis voluptates ducimus error.
					</p>
				</div>
				<div class="tab-pane" id="inscriptions">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, beatae necessitatibus mollitia assumenda nulla maxime eveniet at eius veniam voluptate recusandae veritatis ut minima. Modi, facilis rerum a placeat ipsam.
					</p>	
				</div>
				<div class="tab-pane" id="enAttente">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, animi, iure iste ea nulla ducimus fuga ipsa placeat voluptate molestias rerum ut reprehenderit repellat veniam similique dolores et repudiandae sed!
					</p>
				</div>
				<div class="tab-pane" id="historique">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, dolorem dignissimos ab quod sit consectetur veniam dolor neque molestiae illo. Ipsa, iste laborum quidem necessitatibus quos minus totam recusandae dicta.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php
				if (isset($messageInscriptions)) {
					echo '<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>Il y a des inscriptions en attente pour les manifestations suivantes : $listeManifs</p>
					</div>';
				}
				if (isset($message)) {
					echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>'.$message.'</p>
					</div>';
				}
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Manifestations en attente</h2>
			<div class="panel-group" id="accordionAttente">
				<?php
					if (count($manifestationsEnAttente) > 0) {
						foreach ($manifestationsEnAttente as $manif) {
							echo '<div class="panel panel-default">';
								echo '<div class="panel-heading">';
									echo '<h4 class="panel-title"><a href="#collapse'.$manif->nomFormate().'" data-parent="#accordionHistorique" data-toggle="collapse">'.$manif->getNom().'</a></h4>';
								echo '</div>';
								echo '<div id="collapse'.$manif->nomFormate().'" class="panel-collapse collapse">';
									echo '<div class="panel-body">';
										echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum repudiandae fugiat eligendi ratione. Quidem, veniam, eum, illum in molestias eos dignissimos hic qui sed blanditiis neque dolore quo omnis deserunt?</p>';
										echo '<button class="btn btn-primary">Valider la manifestation</button>';
										echo '<button class="btn btn-danger pull-right">Supprimer la manifestation</button>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}	
					}else{
						echo '<p>Aucune manifestation en attente pour le moment.</p>';
					}
				?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Manifestations à venir <button class="btn btn-primary pull-right"><a href="cGestionAgenda.php?action=ajouterManifestation">Nouvelle manifestation</a></button></h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Image</th>
						<th>Nom</th>
						<th>Date</th>
						<th>Organisateur</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($manifestationsAVenir as $manif) {
							echo '<tr>';
								echo '<td class="cellule-image"><a href="cGestionAgenda.php?action=modifierManifestation&id='.$manif->getId().'"><img src="../data/images/manifestations/miniatures/'.$manif->getImage().'" class="img-responsive img-thumbnail"></a></td>';
								echo '<td><a href="cGestionAgenda.php?action=modifierManifestation&id='.$manif->getId().'">'.$manif->getNom().'</a></td>';
								echo '<td>'.$manif->getDate().'</td>';
								echo '<td>'.$manif->getAssociation()->getNom().'</td>';
								echo '<td><button class="btn btn-danger"><a href="cGestionAgenda.php?action=supprimerManifestation&id='.$manif->getId().'">Supprimer</a></button></td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Historique des manifestations</h2>
			<div class="panel-group" id="accordionHistorique">
				<?php
					if (count($manifestationsPassees) > 0) {
						foreach ($manifestationsPassees as $manif) {
							echo '<div class="panel panel-default">';
								echo '<div class="panel-heading">';
									echo '<h4 class="panel-title"><a href="#collapse'.$manif->nomFormate().'" data-parent="#accordionHistorique" data-toggle="collapse">'.$manif->getNom().'</a></h4>';
								echo '</div>';
								echo '<div id="collapse'.$manif->nomFormate().'" class="panel-collapse collapse">';
									echo '<div class="panel-body">';
										echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum repudiandae fugiat eligendi ratione. Quidem, veniam, eum, illum in molestias eos dignissimos hic qui sed blanditiis neque dolore quo omnis deserunt?</p>';
										echo '<button class="btn btn-primary">Ajouter l\'album photo</button>';
										echo '<button class="btn btn-danger pull-right">Supprimer la manifestation</button>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}	
					}else{
						echo '<p>Aucune manifestation passée pour le moment.</p>';
					}
				?>
			</div>
		</div>
	</div>

</div>
<?php include("includes/footer.php"); ?>