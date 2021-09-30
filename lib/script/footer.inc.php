<footer>
    <div id="Center">
        <div id="Cadre">   
           <li><a href='<?php echo $Home; ?>'><img src='<?php echo $ParamLogoFooter->logo; ?>'/></a></li>
        </div>
        <div id="Cadre"> 
            <a href="<?php echo $Home; ?>"><li <?php if ($PageActu==$Home."/") { echo "class='Up'"; } ?>>Accueil</li></a>
            <?php
            while ($MenuPage=$SelectPageActif->fetch(PDO::FETCH_OBJ)) {
            ?>
            <a href="<?php echo $MenuPage->lien ?>"><li <?php if ($PageActu==$MenuPage->lien) { echo "class='Up'"; } ?>><?php echo $MenuPage->libele ?></li></a>
            <?php } ?>
            <a href="<?php echo $Home; ?>/Contact/"><li <?php if ($PageActu==$Home."/Contact/") { echo "class='Up'"; } ?>>Contact</li></a>
            <a href="<?php echo $Home; ?>/Mentions-legales/"><li <?php if ($PageActu==$Home."/Mentions-legales/") { echo "class='Up'"; } ?>>Mentions-légales</li></a>
        </div>
        <div id="Cadre">  
            <li><?php echo $Societe; ?></li>
            <li><?php echo $Adresse; ?></li>
            <li>Téléphone : <?php echo $Telephone; ?></li>
        </div>
    </div>
    <div id="NeuroSoft">
    <a href="http://neuro-soft.fr/" target="_blank" title="NeuroSoft Team - Agence de communication"><img src="http://neuro-soft.fr/lib/img/En-tete.png" alt="NeuroSoft Team - Agence de communication"/></a>
    </div>
</footer>