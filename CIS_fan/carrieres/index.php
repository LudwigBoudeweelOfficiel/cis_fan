<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cis_fan', 'root','', array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$liens = $bdd->query('SELECT * FROM liens');
?>
<html>
	<head>
		<title>CIS Fan</title>
		<link rel="stylesheet" href="../style.css"/>
		<meta charset="UTF-8"/>
	</head>
	
	<body>
		<!-- menu -->
		<?php include('../includes/header.php');?>
		
		<!-- Dernières interventions -->
		<section class="menu">
			<?php
			while($dliens = $liens->fetch()){
			?>
				<a class="lien" href="<?php echo $dliens['Lien']?>"><?php echo utf8_decode($dliens['NomLien'])?></a>
			<?php
			}
			?>
		</section>
	</body>
</html>