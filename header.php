<?php
session_start();
?>
<header>
<div class="fh5co-navbar-brand text-center">
	
	<div class="topBotomBordersOut connexionButton">
		<ul>
            <?php
                if(isset($_SESSION["username"])) {

            ?>
            <li class="profil">Bienvenue <?php echo $_SESSION["username"] . ' ' . $_SESSION["nom"]?></li>
            <li class="profil"> <a href="accueil.php" id="logout" class="inactive">Déconnexion</a> </li>
            
            <?php
                }else {
                    ?>

                    <li><a href="#" onclick="document.getElementById('id01').style.display='block'" class="inactive">Connexion</a>
                    </li>

                    <?php
                }

            ?>


        </ul>
    </div>
    <a href="accueil.php"><img src="images/bglogo.png" alt="logo"></a>
	</div>
	<div class="menu text-center topBotomBordersOut">
		
		<nav id="fh5co-main-nav">
			<ul>
				<li><a href="accueil.php" <?=nav("accueil")?>>Accueil</a></li>
				<li><a href="studio.php" <?=nav("studio")?>>Studio</a></li>
				<li><a href="mariage.php" <?=nav("mariage")?>>Mariage</a></li>
				<li><a href="portrait.php" <?=nav("portrait")?>>Portrait</a></li>
				<li><a href="art.php" <?=nav("art")?>>Art</a></li>
				<li><a href="propos.php" <?=nav("propos")?>>À propos</a></li>
				<li><a href="contact.php" <?=nav("contact")?>>Contact</a></li>
				<?php
                if(isset($_SESSION["username"])) {

            ?>
            <li><a href="VosPhoto.php" <?=nav("VosPhoto")?>>Vos photos</a></li>
            
            <?php
                }
            ?>
			</ul>
		</nav>
	</div>
</header>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

<!-- <form class="login" method="post" action="index.html">-->
	<div class="box">
		<h1 class="title">Connexion</h1>
		
		<input id="username" type="text" name="username" placeholder="email"  class="email" />
		  
		<input id="password" type="password" name="password" placeholder="password"  class="email" />
		  
		<a id="btn" href="#" class="btn">Connexion</a>
		<a id="btn2" href="inscription.php" class="btn2">S'inscrire</a>
	</div>
<!--</form>-->
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

    $(document).ready(function(){
        $('#btn').click(function(){

            var username = $('#username').val();
            var password = $('#password').val();
            if (username != '' && password != ''){
                $.ajax({
                   url:"loginAction.php",
                   method:"POST",
                   data:{username:username, password:password},
                    success:function(data){
                       if (data == 'No'){
                           alert("Le email ou le mot de passe n'est pas valide");
                       }else{
                           $('#id01').hide();
                           location.reload();
                       }
                    }
                });
            }
            else{
            	alert("Le email ou le mot de passe n'est pas valide");
            }
        });
        $('#logout').click(function(){
            var action ="logout";
            $.ajax({
                url:"loginAction.php",
                method:"POST",
                data:{action:action},
                success:function(data){
                    location.reload();
                }
            })
        });
    });


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