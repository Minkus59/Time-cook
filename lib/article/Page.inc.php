<section>
<div id="Center">
    <div id="container">

        <div id="tourDIV">
            <div id="panoDIV">
                <noscript>

                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" id="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index">
                        <param name="movie" value="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index.swf"/>
                        <param name="allowFullScreen" value="true"/>
                        <!--[if !IE]>-->
                        <object type="application/x-shockwave-flash" data="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index.swf" width="100%" height="100%">
                            <param name="movie" value="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index.swf"/>
                            <param name="allowFullScreen" value="true"/>
                            <!--<![endif]-->
                            <a href="http://www.adobe.com/go/getflash">
                                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player to visualize the Virtual Tour : Time Cook - Lille"/>
                            </a>
                        <!--[if !IE]>-->
                        </object>
                        <!--<![endif]-->
                    </object>

                </noscript>
            </div>

            <script type="text/javascript" src="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index.js"></script>
            <script type="text/javascript">
                accessStdVr();
            </script>
        </div>
    </div>
   
<?php
if ($Count>0) {

    while($Actu=$RecupArticle->fetch(PDO::FETCH_OBJ)) { 

        echo '
        <article>';

        echo $Actu->message;
        if (($Cnx_Admin==true)||($Cnx_Client==true)) { 
            echo '<a href="'.$Home.'/Admin/Article/Nouveau/?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a><a href="'.$Home.'/Admin/Article/supprimer.php?id='.$Actu->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a>';
        } 
        echo '</article>';
    }
}
else {
    echo '<article>Aucun article pour le moment !</article>';
}
?>

</div>
</section>