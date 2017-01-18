<!DOCTYPE html>
	<html>
		<head>
			<meta charset = "utf-8"/>
			<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="../bootstrap/js/bootstrap.min.js"></script>
			<link rel="stylesheet" type="text/css" href="index.css"/>
		</head>
		<body>
			<header>
				<nav id="navbar" class="navbar navbar-inverse">
				    <div class="container-fluid">
					    <div class="navbar-header">
					      <a class="navbar-brand" href="#">Bienvenue !</a>
					   	</div>
					   	<ul class="nav navbar-nav">
							<li><a href="index.php">Roles</a></li>
							<li><a href="users/index.php.php">Users</a></li>
							<li><a href="urls/index.php">Urls</a></li>
						</ul>
					</div>
				</nav>
			</header>
			<div class="container">
				<table class="table table-striped custab table-bordered table-hover">
					<caption>Liste des roles</caption>
						<th>ID</th>
						<th>NAME</th>
						<th>NOMBRE D'UTILISATEURS</th>

					<?php
						include '../config.php';

						$listeRoles = "SELECT * from role";

						$roles = $bdd->query($listeRoles);

						foreach($roles as $element)
						{

							$nbUtilisateurs = $bdd->query("SELECT count(*) from user where idrole =".$element['id']);

							$nbUtilisateurs = $nbUtilisateurs->fetch();

					?>
						
					<tr>
						<td>
							<?php echo $element['id'];?>
						</td>
						<td>
							<a data-toggle="collapse" data-target="#role<?php echo $element['name'];?>"><?php echo $element['name'];?></a>
						</td>
						<td>
							<?php echo $nbUtilisateurs[0].' personnes';?>
						</td>
					</tr>

					<?php
						}
					?>

				</table>

				<div id="roleadmin" class="collapse"/>
					<cite>Hey je suis un Admin</cite>
				</div>
				<div id="roleuser" class="collapse tag"/>
					<cite>Hey je suis un User</cite>
				</div>
				<div id="rolesuperadmin" class="collapse tag"/>
					<cite>Hey je suis un Super Admin</cite>
				</div>
			</div>
		</body>
	</html>

