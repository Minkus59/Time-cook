<header>
    <div id="Center">
        <img src="<?php echo $ParamLogoHeader->logo; ?>"/>
    </div>
<nav>
<div id="Center">
    <ul>
        <a href="<?php echo $Home; ?>"><li <?php if ($PageActu==$Home."/") { echo "class='Up'"; } ?>>Accueil</li></a>
        <?php
        while ($MenuPage=$SelectPageActif->fetch(PDO::FETCH_OBJ)) {
        ?>
        <a href="<?php echo $MenuPage->lien ?>"><li <?php if ($PageActu==$MenuPage->lien) { echo "class='Up'"; } ?>><?php echo $MenuPage->libele ?></li></a>
        <?php } ?>
        <a href="<?php echo $Home; ?>/Contact/"><li <?php if ($PageActu==$Home."/Contact/") { echo "class='Up'"; } ?>>Contact</li></a>
    </ul>
</div>
</nav>
</header>