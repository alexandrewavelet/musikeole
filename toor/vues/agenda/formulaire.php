<?php include("includes/header.php"); ?>
<script src="../assets/js/datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Nouvelle manifestation</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="cGestionAgenda.php?action=creerManifestation" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<div class="form-group">
					<label for="nom" class="control-label col-sm-2">Nom</label>
					<div class="col-sm-4">
						<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de la manifestation" >
					</div>
					<label for="image" class="control-label col-sm-2">Image</label>
					<div class="col-sm-4">
						<input type="file" name="image" id="image" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label for="date" class="control-label col-sm-2">Date</label>
					<div class="col-sm-4">
						<input type="text" name="date" id="date" data-date-format="dd-mm-yyyy" class="form-control" placeholder="Date" >
					</div>
					<label for="heure" class="control-label col-sm-2">Heure</label>
					<div class="col-sm-4">
						<input type="text" name="heure" id="heure" class="form-control" placeholder="Heure">
					</div>
				</div>
				<div class="form-group">
					<label for="gratuit" class="control-label col-sm-2">Manifestation gratuite</label>
					<div class="col-sm-4">
						<select name="gratuit" id="gratuit" class="form-control">
							<option value="0" selected>Non</option>
							<option value="1">Oui</option>
						</select>
					</div>
					<label for="prixAdh" class="control-label col-sm-2">Prix adhérent</label>
					<div class="col-sm-4">
						<input type="text" name="prixAdh" id="prixAdh" class="form-control" placeholder="Prix pour les adhérents" >
					</div>
				</div>
				<div class="form-group">
					<label for="prixExt" class="control-label col-sm-2">Prix extérieur</label>
					<div class="col-sm-4">
						<input type="text" name="prixExt" id="prixExt" class="form-control" placeholder="Prix pour les extérieurs" >
					</div>
					<label for="prixEnf" class="control-label col-sm-2">Prix enfant</label>
					<div class="col-sm-4">
						<input type="text" name="prixEnf" id="prixEnf" class="form-control" placeholder="Prix pour les enfants" >
					</div>
				</div>
				<div class="form-group">
					<label for="places" class="control-label col-sm-2">Nombre de places</label>
					<div class="col-sm-4">
						<input type="text" name="places" id="places" class="form-control" placeholder="Nombre de places" >
					</div>
					<label for="association" class="control-label col-sm-2">Organisateur</label>
					<div class="col-sm-4">
						<select name="association" id="association" class="form-control">
							<?php
								foreach ($associations as $association) {
									$defaut = ($association->getId() == 0) ? 'selected' : '' ;
									echo '<option value="'.$association->getId().'" '.$defaut.'>'.$association->getNom().'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-1">
						<textarea class="form-control" rows="10" id="desciption" name="description" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-1">
						<button type="submit" class="btn btn-primary btn-lg">Valider</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<script>
	$('#date').datepicker();
	tinymce.init({
		selector: "textarea",
		language : 'fr_FR'
	});
	$('#heure').timepicker({
		showMeridian: false,
		showInputs: false,
		defaultTime: '0:0',
		disableFocus: true
	});
</script>
<?php include("includes/footer.php"); ?>