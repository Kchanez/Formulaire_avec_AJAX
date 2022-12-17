<?php 
	require_once('cnx.php');

/*$ETD_LPDWI = array 
	(
        "id",
        "FamilyName",
        "GivenName",
        "Email",
        "PhoneValue"
	); 
*/
    class Formulaire 
    {
        public $id;
        public $FamilyName;
        public $GivenName;
        public $Email;
        public $PhoneValue;

        //function print($id, $FamilyName, $GivenName, $Email, $PhoneValue)
        function __construct($id, $FamilyName, $GivenName, $Email, $PhoneValue)
        {
            $this->id = $id;
            $this->FamilyName = $FamilyName;
            $this->GivenName = $GivenName;
            $this->Email = $Email;
            $this->PhoneValue = $PhoneValue;
        }
        function Get_id()
        {
            return $this->id;
        }
        function Get_FamilyName()
        {
            return $this->FamilyName;
        }
        function Get_GivenName()
        {
            return $this->GivenName;
        }
        function Get_Email()
        {
            return $this->Email;
        }
        function Get_PhoneValue()
        {
            return $this->PhoneValue;
        }
    }	
    $ETD_LPDWI = new Formulaire("id","FamilyName", "GivenName", "Email", "PhoneValue");

	// Récuperer les informations des articles
	$sql = 'SELECT * FROM etudiant';
	$res = $db->prepare($sql);
	$res->execute();
	$ligne = $res->fetchall();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des Etudiants en LPDWI</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
	<div class="container" style="margin-top: 5%">
		<?php 
			include_once('header.php');
		?>
	       <br><br>
        <!-- Menu -->
        <div class="menu">
            <p>Liste des Etudiants en LPDWI</p>
        </div>
		<!-- Table -->
    <table class="table">
    <thead >
    <tr class="table-dark">
       <!--  <?php 
            //for ($i=0; $i <count($ETD_LPDWI) ; $i++) 
            {
        ?>  -->
            <th scope="col-auto"> <?php echo $ETD_LPDWI->Get_id();  ?></th>
            <th scope="col-auto"> <?php echo $ETD_LPDWI->Get_GivenName();  ?></th>
            <th scope="col-auto"> <?php echo $ETD_LPDWI->Get_FamilyName();  ?></th>
            <th scope="col-auto"> <?php echo $ETD_LPDWI->Get_Email();  ?></th>
            <th scope="col-auto"> <?php echo $ETD_LPDWI->Get_PhoneValue();  ?></th>
            <!-- <th scope="col-auto"> <?php echo $ETD_LPDW->id; ?></th> -->
        <!-- <?php 
            }
        ?>    -->
    </tr>
    </thead>
    
    <tbody>
    <?php
        for ($i=0; $i<count($ligne) ; $i++)
        {
    ?>
        <tr>
        <td class="align-middle"><?php echo $ligne[$i]['id']; ?></td>
        <th scope="row" class="align-middle"><?php echo $ligne[$i]['FamilyName'];?> </th>
        <td class="align-middle"><?php echo $ligne[$i]['GivenName']; ?></td>
        <td class="align-middle"><?php echo $ligne[$i]['Email']; ?></td>
        <td class="align-middle"><?php echo $ligne[$i]['PhoneValue']; ?></td>
        </tr>
    <?php 
    	}
    ?> 
    </tbody>
    </table>


	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../css/bootstrap.min.js"></script>
</body>
</html>