<header>
<div class="fh5co-navbar-brand text-center">
	<a href="accueil.html" class="logo"><img src="images/bglogo.png" alt="logo"></a>
	<div class="topBotomBordersOut connexionButton">
		<ul>
			<li><a href="#" onclick="document.getElementById('id01').style.display='block'" class="inactive ">Connexion</a></li>
			</ul>
		</div>
	</div>
	<div class="container text-center topBotomBordersOut">
		
		<nav id="fh5co-main-nav">
			<ul>
				<li><a href="accueil.php" <?=nav("accueil")?>>Accueil</a></li>
				<li><a href="studio.php" <?=nav("studio")?>>Studio</a></li>
				<li><a href="mariage.php" <?=nav("mariage")?>>Mariage</a></li>
				<li><a href="portrait.php" <?=nav("portrait")?>>Portrait</a></li>
				<li><a href="art.php" <?=nav("art")?>>Art</a></li>
				<li><a href="propos.php" <?=nav("propos")?>>À propos</a></li>
				<li><a href="contact.php" <?=nav("contact")?>>Contact</a></li>
			</ul>
		</nav>
	</div>
</header>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

 <form class="login" method="post" action="index.html">
	<div class="box">
		<h1 class="title">Connexion</h1>
		
		<input type="email" name="email" placeholder="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />
		  
		<input type="password" name="email" placeholder="password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />
		  
		<a id="btn" href="Login.php">Connexion</a>
		<a id="btn2" href="inscription.php">S'inscrire</a>
	</div>
</form>
</div> 
<script>
    //Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>
<?php
function nav($request)
{
    $current_file = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file == $request){
        echo 'class="active"';
    }
    else{
        echo 'class="inactive"';
    }
        
}
?>