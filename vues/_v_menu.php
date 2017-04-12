<!-- Division pour le menu -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand" href="./"><img src="./img/Chrysadex.png" height="100%" width="auto" /></a>
    </div>
	<ul class="nav navbar-nav">
            <li class="smenu">
                <a href="./" 
                   title="Accueil"><img src="./img/home.png" height="12px" width="auto" style="float:left; padding-top:1px" />&nbsp;Accueil
                </a>
            </li>
            <li class="smenu">
                <a href="./Pokemon" title="Pokémon"><img src="./img/onglet.png" height="12px" width="auto" style="float:left; padding-top:2px" />&nbsp;Liste des Pokémon
                </a>
            </li>     
			<li class="smenu">
                <a href="./Attaques" title="Attaques"><img src="./img/onglet.png" height="12px" width="auto" style="float:left; padding-top:2px" />&nbsp;Liste des Attaques
                </a>
            </li> 		
			<li class="smenu">
                <a href="./CT-CS" title="CTCS"><img src="./img/onglet.png" height="12px" width="auto" style="float:left; padding-top:2px" />&nbsp;Liste des CT/CS
                </a>
            </li> 	
			<?php if(!isset($_SESSION['login'])){ ?>
			<li>
                <a href="./Login" title="Connexion">Connexion
                </a>
            </li> 
			<?php } ?>
			<?php if(isset($_SESSION['login'])) { ?>
			<li>
				<a href="./Deconnexion">Déconnexion <?php echo "(".$_SESSION['login'].")"; ?>
				</a>
			</li>
			<?php } ?>
        </ul>
	</div>
</nav>