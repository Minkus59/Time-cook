<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/requete.inc.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");                    
?>
<!DOCTYPE HTML>
<html>

<head>   
<meta charset="ISO-8859-15"/>
<title><?php echo $SOEPage->titre ?></title>
<meta name="category" content="<?php echo $SOEPage->libele; ?>" />
<meta name="description" content="<?php echo $SOEPage->description ?>" />
<meta name="robots" content="index, follow"/>
<meta name="author" content="NeuroSoft Team"/>
<meta name="publisher" content="<?php echo $Publisher; ?>"/>
<meta name="reply-to" content="<?php echo $Destinataire; ?>"/>
<meta name="viewport" content="width=device-width" />

<link rel="shortcut icon" href="<?php echo $Home; ?>/lib/img/icone.ico" >
<link rel="stylesheet" type="text/css" media="screen AND (max-width: 480px)" href="<?php echo $Home; ?>/lib/css/misenpatel.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 481px)" href="<?php echo $Home; ?>/lib/css/misenpapc.css" >

<script type="text/javascript" src="<?php echo $Home; ?>/lib/js/analys.js"></script>

<!--[if !IE]><!-->
<script type="text/javascript" src="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/lib/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/lib/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gt IE 8]>
<script type="text/javascript" src="<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/lib/jquery-2.1.1.min.js"></script>
<![endif]-->

<script type="text/javascript">
			function webglAvailable() {
				try {
					var canvas = document.createElement("canvas");
					return !!window.WebGLRenderingContext && (canvas.getContext("webgl") || canvas.getContext("experimental-webgl"));
				} catch(e) {
					return false;
				}
			}
			function getWmodeValue() {
				var webglTest = webglAvailable();
				if(webglTest){
					return 'direct';
				}
				return 'opaque';
			}
			function readDeviceOrientation() {
				// window.innerHeight is not supported by IE
				var winH = window.innerHeight ? window.innerHeight : jQuery(window).height();
				var winW = window.innerWidth ? window.innerWidth : jQuery(window).width();
				//force height for iframe usage
				if(!winH || winH == 0){
					winH = '100%';
				}
				// set the height of the document
				jQuery('html').css('height', winH);
				// scroll to top
				window.scrollTo(0,0);
			}
			jQuery( document ).ready(function() {
				if (/(iphone|ipod|ipad|android|iemobile|webos|fennec|blackberry|kindle|series60|playbook|opera\smini|opera\smobi|opera\stablet|symbianos|palmsource|palmos|blazer|windows\sce|windows\sphone|wp7|bolt|doris|dorothy|gobrowser|iris|maemo|minimo|netfront|semc-browser|skyfire|teashark|teleca|uzardweb|avantgo|docomo|kddi|ddipocket|polaris|eudoraweb|opwv|plink|plucker|pie|xiino|benq|playbook|bb|cricket|dell|bb10|nintendo|up.browser|playstation|tear|mib|obigo|midp|mobile|tablet)/.test(navigator.userAgent.toLowerCase())) {
					// add event listener on resize event (for orientation change)
					if (window.addEventListener) {
						window.addEventListener("load", readDeviceOrientation);
						window.addEventListener("resize", readDeviceOrientation);
						window.addEventListener("orientationchange", readDeviceOrientation);
					}
					//initial execution
					setTimeout(function(){readDeviceOrientation();},10);
				}
			});
			
			function accessWebVr(){
				unloadPlayer();

				setTimeout(function(){ loadPlayer(true); }, 100);
			}
			function accessStdVr(){
				unloadPlayer();

				setTimeout(function(){ loadPlayer(false); }, 100);
			}
			function loadPlayer(isWebVr) {
				if (isWebVr) {
					embedpano({
						id:"krpanoSWFObject"
						,xml:"<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index_vr.xml"
						,target:"panoDIV"
						,passQueryParameters:true
						,bgcolor:"#000000"
						,html5:"only+webgl"
						,vars:{skipintro:true,norotation:true}
					});
				} else {
					embedpano({
						id:"krpanoSWFObject"

						,swf:"<?php echo $Home; ?>/lib/Visite-Virtuelle/indexdata/index.swf"

						,target:"panoDIV"
						,passQueryParameters:true
						,bgcolor:"#000000"

						,html5:"prefer"


					});
				}
				//apply focus on the visit if not embedded into an iframe
				if(top.location === self.location){
					kpanotour.Focus.applyFocus();
				}
			}
			function unloadPlayer(){
				if(jQuery('#krpanoSWFObject')){
					removepano('krpanoSWFObject');
				}
			}
		</script>
</head>

<body>
<center>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/header.inc.php"); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/nav.inc.php"); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/article/Page.inc.php"); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/footer.inc.php"); ?>
</center>
</body>
</html>