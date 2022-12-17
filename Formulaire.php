<?php 
require_once'cnx.php';
require_once'CheckEmail.php';

/*class Formulaire 
{
	public $nom;
	public $prenom;
	public $email;
	public $tele;
}*/

/*$ETD_LPDWI = new Formulaire();
if (isset($_POST['inserer'])) 
{
	// récupération des valeurs
		$ETD_LPDWI->nom = $_POST['nom'];
		$ETD_LPDWI->prenom = $_POST['prenom'];
		$ETD_LPDWI->email = $_POST['email'];
		$ETD_LPDWI->tele = $_POST['telephone'];
	$query="INSERT INTO etudiant (FamilyName, GivenName, Email, PhoneValue)
	VALUES
	(' ".$ETD_LPDWI->nom." ',
	' ".$ETD_LPDWI->prenom." ',
	' ".$ETD_LPDWI->email." ',
	' ".$ETD_LPDWI->tele." ')";
	$res=$db->exec($query) or
	die('Erreur SQL !<br>'.$query.'<br>'.$db->errorInfo());
	header('location: Formulaire.php');
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
<body>
	<div class="container">
		<?php include_once 'header.php'; ?>
		<div class="Sous_container">
		<form method="" action="Formulaire.php">
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Nom</label>
			  <input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="Nom">
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Prenom</label>
			  <input type="text" class="form-control" name="prenom" id="exampleFormControlInput2" placeholder="Prenom">
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Email address</label>
			  <input type="email" class="form-control" name="email" id="exampleFormControlInput3" placeholder="name@example.com">
			  <div id="show"></div>
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Téléphone</label>
			  <input type="Numero" class="form-control" name="telephone" id="exampleFormControlInput4" placeholder="Numero Téléphone">
			</div>
			<button type="submit" name="inserer" class="btn btn-primary" id="submit">Ajouter l'etudiant</button>
		</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>

		$(document).ready(function()
		{
			$("#exampleFormControlInput3").keyup(function()
			{
				var email = $(this).val();
				if (email == "") 
				{
					$("#show").fadeOut().html("");
					//$("#show").html("");
				}
				else
				{
					$.ajax ({
						url: "CheckEmail.php",
						method: "POST",	
						data: {
							email: email
						},
						success: function(data)
						{	
							$("#show").fadeIn().html(data);
							//$("#show").html(data);
						}	
					});
				}
			});
		});
</script>
</body>
</html>