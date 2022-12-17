<?php
	require_once('cnx.php');
	
class Formulaire 
{
	public $nom;
	public $prenom;
	public $email;
	public $tele;
}
	if (isset($_POST['email'])) 
	{	
		$email = $_POST['email'];
		$stmt = $db->prepare("SELECT Email FROM etudiant WHERE TRIM(Email)=?");
		$stmt->execute([$email]); 
		$user = $stmt->fetch();
		if ($user) 
		{
		    echo '<b class="text-danger"> This Email Is Already Used. </b>';  	
		}
		else 
		{
		    echo '<b class="text-success"> This Email Is Not Used. </b>';
		    $ETD_LPDWI = new Formulaire();
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
			}
		}   		
	}

?> 