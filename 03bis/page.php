<?php
session_start();
$debug = 0;
include "../tools.php";

dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajax connexion</title>
  </head>
  <body>
	<div class="container">
		<h1>
		<?php
		if(isset($_SESSION['pseudo'])) {
			echo 'Hello' . $_SESSION['pseudo'];
		} else {
			echo 'Hello World';
		}
		?>
		</h1>
		
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion">
		  Connexion
		</button>

		<!-- Modal -->
		<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form method="" action="" id="form_connexion">
					<div class="form-group">
						<label>Pseudo</label>
						<input type="text" name="pseudo" value="" id="pseudo" class="form-control">
					</div>
					<div class="form-group">
						<label>Mot de passe</label>
						<input type="text" name="mdp" value="" id="mdp" class="form-control">
					</div>
					<div class="form-group">
						
						<input type="submit" name="connexion" value="Connexion" id="connexion" class="form-control btn btn-primary">
					</div>
					
					<hr>
					<div id="resultat"></div>
				</form>
			  </div>			  
			</div>
		  </div>
		</div>
		
	</div>
    
	
	
	
	
	
	
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="http://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<script src="js/script-jquery.js"></script>
	
	
  </body>
</html>