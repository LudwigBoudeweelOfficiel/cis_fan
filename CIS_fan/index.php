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
$interventions = $bdd->query('SELECT * FROM interventions ORDER BY Date DESC LIMIT 3');
?>
<html>
	<head>
		<title>CIS Fan</title>
		<link rel="stylesheet" href="style.css"/>
		<meta charset="UTF-8"/>
	</head>
	
	<body>
		<!-- menu -->
		<?php include('includes/header.php');?>
		
		<!-- Menu -->
		<section class="menu">
			<?php
			while($dliens = $liens->fetch()){
			?>
				<a class="lien" href="<?php echo $dliens['Lien']?>"><?php echo utf8_decode($dliens['NomLien'])?></a>
			<?php
			}
			?>
		</section>
		
		<!-- bloc central -->
		<section class="body">
			<h2 class="title">Dernières interventions</h2>
			<?php
			while($dinterventions = $interventions->fetch()){
			?>
				<section class="interventions">
					<img src=""/>
					<h3><?php echo $dinterventions['Titre']?></h3>
				</section>
			<?php
			}
			?>
			
			<p class="clear"></p>
			
			<h2 class="title">Actualité</h2>
		</section>
	</body>
</html>