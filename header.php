<?php
session_start();
?>
<header>
<div class="fh5co-navbar-brand text-center">
	<a href="accueil.html" class="logo"><img src="images/bglogo.png" alt="logo"></a>
	<div class="topBotomBordersOut connexionButton">
		<ul>
            <?php
                if(isset($_SESSION["username"])) {

            ?>
            <li>Welcome <?php echo $_SESSION["username"] ?> <br/>
            <a href="#" id="logout">Logout</a></li>
            <?php
                }else {
                    ?>

                    <li><a href="#" onclick="document.getElementById('id01').style.display='block'" class="inactive ">Connexion</a>
                    </li>

                    <?php
                }

            ?>


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
		  
		<button type='button' id="btn"  class="login">Connexion</button>
		<a id="btn2" href="inscription.php" class="login">S'inscrire</a>
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
                           alert("Impossible de se connecter");
                       }else{
                           alert("connected");
                           $('#id01').hide();
                           location.reload();
                       }
                    }
                });
            }
        });
        $('#logout').click(function(){
            var action ="logout";
            $.ajax({
                url:"loginAction.php",
                method:"POST",
                data:{action:action},
                success:function(data){
                    alert('disconnected')
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