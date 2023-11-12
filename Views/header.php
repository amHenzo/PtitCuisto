<?php
	
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		<link rel="preconnect"	href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
		<link rel="stylesheet"  href="../Css/style_header.css">
		<link rel="stylesheet"  href="../Css/style_footer.css">
		
		<title>PtitCuisto</title>
	</head>
	<body>
	<header>
		
			
		<ul class="nav-bar">
			<li>
				<img class="logo" onclick="document.location.href='./homepage.php';" src="../Assets/Logo.png" alt="logo" srcset="">
			</li>
			<li id="header-links"><a onclick="document.location.href='./homepage.php';" >Acceuil	</a></li>
			<li id="header-links"><a onclick="document.location.href='./ListeRecette.php';">Nos recettes</a></li>
			<li id="header-links" class="Scrollingmenu">
				<a>Filtres</a>
				<ul class="dropdown-menu-1">
					<li><a id="myBtnCategorie" >Catégorie	</a></li></hr>
					<li><a id="myBtnTitre" >Titre		</a></li></hr>
					<li><a id="myBtnIngredients">Ingrédients	</a></li></hr>
				</ul>
			</li>
			<li id="header-links">
				<a onclick="document.location.href='./login.html';"	>Connexion	</a>
			</li>
		</ul>
		
		<nav class="menuHeader">
                <input type="checkbox" id="menuHeader-checkbox" onclick="menuHeader();">
                <label class="menuHeader-items" for="menuHeader-checkbox">
                    <div class="menuHeader-item"></div>
                    <div class="menuHeader-item"></div>
                    <div class="menuHeader-item"></div>
                </label>
            </nav>
			<ul id="menuHeader-content" class="menuHeader-content-hide">
				<li class="menu-content"><a	 onclick="document.location.href='./ListeRecette.php';">Nos recettes	</a></li>
				<li class="menu-content"><a  id="myBtnFiltres" >Filtres		</a></li>
				<li class="menu-content "><a onclick="document.location.href='./login.html';">Connexion	</a></li>
			</ul>
			
			<div class="container">
				<!-- Modal Ingredients -->
			<div class="modal fade" id="myModalIngredients" role="dialog">
				<div class="modal-dialog">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4></span>Recherche par Ingredient</h4>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
					<form role="form" method="GET" action="./Ingredient.php">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">entrez un Ingredient</label>
							<input type="text" class="form-control" name="ingredient" placeholder="Sucre">
						</div>
						<button type="submit" class="btn btn-success btn-block"></span> Rechercher</button>
					</form>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					</div>
				</div>
				
				</div>
			</div> 
			<!-- Modal Titre -->
			<div class="modal fade" id="myModalTitre" role="dialog">
				<div class="modal-dialog">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4></span>Recherche par Titre</h4>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
					<form role="form" method="GET" action="./Recherche.php">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">entrez un titre</label>
							<input type="text" class="form-control" name="recherche" placeholder="donnut sucré au sucre">
						</div>
						<button type="submit" class="btn btn-success btn-block"></span> Rechercher</button>
					</form>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					</div>
				</div>
				
				</div>
			</div> 
			<!-- Modal filtres -->
			<div class="modal fade" id="myModalCategorie" role="dialog">
				<div class="modal-dialog">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4></span>Categorie</h4>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
					
					<form role="form" method="GET" action="./Categorie.php">
						
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="categorie">
							<option value="1" name="categorie">entrée</option>
							<option value="2">plat</option>
							<option value="3">dessert</option>
						</select>
						<button type="submit" class="btn btn-success btn-block"></span> Rechercher</button>
					</form>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					</div>
				</div>
				
				</div>
			</div> 
			<!-- Modal connexion-->
			<div class="modal fade" id="myModalConnexion" role="dialog">
				<div class="modal-dialog">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
					<form role="form" method="GET">
						<div class="form-group">
						<label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
						<input type="text" class="form-control" id="usrname" placeholder="Enter email">
						</div>
						<div class="form-group">
						<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
						<input type="text" class="form-control" id="psw" placeholder="Enter password">
						</div>
						<div class="checkbox">
						<label><input type="checkbox" value="" checked>Remember me</label>
						</div>
						<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
					</form>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					<p>Not a member? <a href="#">Sign Up</a></p>
					<p>Forgot <a href="#">Password?</a></p>
					</div>
				</div>
				
				</div>
			</div> 
			</div>
 


			<script src="../ScriptJs/menuheader.js"></script>
	</header>
