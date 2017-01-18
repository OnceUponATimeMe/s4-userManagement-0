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
							<li><a href="../role/index.php">Roles</a></li>
							<li><a href="index.php">Users</a></li>
							<li><a href="../url/index.php">Urls</a></li>
						</ul>
					</div>
				</nav>
			</header>
			<div class="container" id = "ListePersonne">
				<table class="table table-striped custab table-bordered table-hover">
					<caption>Liste des roles</caption>
						<th>Login</th>
						<th>firstname</th>
						<th>lastname</th>
						<th>email</th>
						<th>idrole</th>
						<th>Supprimer</th>
						<th>Modifier</th>

					<?php
						include '../config.php';

						$listeRoles = "SELECT * from user";

						$users = $bdd->query($listeRoles);

						foreach($users as $element)
						{


					?>
						
					<tr>
						<td>
							<?php echo $element['login'];?>
						</td>
						<td>
							<a data-toggle="collapse" data-target="#role<?php echo $element['firstname'];?>"><?php echo $element['firstname'];?></a>
						</td>
						<td>
							<?php echo $element['lastname'];?>
						</td>
						<td>
							<?php echo $element['email'];?>
						</td>
						<td>
							<?php echo $element['idrole'];?>
						</td>
						<td>
				 			
				 			<a style="width:30px;" onclick="return confirm('Voulez vous vraiment supprimer cet enregistremement ?')" href="remove.php?id=<?php echo $element['id'];?>"><img style="width:30px;" class="ico-suppression" src="../Images/supprimer.png"></a>
				 		
				 		</td>
				 			
				 		<td>
				 			<a href="index.php?id=<?php echo $element['id'];?>" ><img style="width:30px;" class="ico-modification" src="../Images/modification.png"></a>
				 		
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
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#formAjout">Ajouter un Rôle</button>
				
				<div id = "formAjout" class="collapse">
					<form method="POST" action="add.php">
						<fieldset >Ajout d'un Rôle</fieldset>
						<table>
							<tr>
								<td>
									<label for="id">Id :</label>
								</td>
								<td>
									<input type = "text" name = "id"/>
								</td>
							</tr>
							<tr>	
								<td>
									<label for="name">Name :</label>
								</td>
								<td>
									<input type = "text" name = "name"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type = "submit" name ="Enregistrer" value = "Enregistrer"/>
								</td>
							</tr>
						</table>
					</form>
				</div>
			
				<?php
					if(isset($_GET['id'])){

				?>		
					<div id = "modification" class = "container">
						<form method="POST" action="update.php?id=<?php echo $_GET['id'];?>">
							<fieldset >Modification d'un Rôle</fieldset>
							<table>
								<tr>
									<td>
										<label for="id">Id :</label>
									</td>
									<td>
										<input type = "text" name = "id" value="<?php echo $_GET['id'];?>" disabled />
									</td>
								</tr>
								<tr>	
									<td>
										<label for="name">Name :</label>
									</td>
									<td>
										<input type = "text" name = "name" value="<?php echo $_GET['name'];?>"/>
									</td>
								</tr>
								<tr>
									<td colspan>
										<input type = "submit" name ="Modifier" value = "Modifier"/>
									</td>
									<td colspan>
										<button type="button" class="btn btn btn-danger" onclick="window.location = 'index.php'">Annuler</button>
									</td>
								</tr>
							</table>
						</form>

					</div>
				<?php
					}
				?>
			</div>


		</body>
	</html>

