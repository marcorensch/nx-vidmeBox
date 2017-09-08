<?php
/**
 * Printout File for nx-vidmeBox 
 * @package     nx-vidmeBox
 *
 * @copyright   Copyright (C) 2009 - 2017 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

defined('_JEXEC') or die('Restricted access');
$stylesheet = '/modules/mod_nx-vidmebox/tmpl/css/nx-vidmebox.css';
$document = JFactory::getDocument();
$document->addStyleSheet($stylesheet);
// Load the Playerstyle from helper into Head Section
$document->addStyleDeclaration($playerstyle);


if($nxdebug){
	print_r($player);
}

if($player['styling']['BlockLayer']['UseBlockLayer']){
	include __DIR__ .'/css/nx-blocklayer.css.php';
}
?>
<script>

</script>

<div id="nx-player_<?php echo $rndm;?>_outer" class="nx-vidmebox">
	<div id="" class="nx-outer">
		<div id="nx-playercontainer_<?php echo $rndm;?>" class="nx-VidmeBox">
				<div id="nxplayer_<?php echo $rndm;?>">
					<iframe src="https://vid.me/e/<?php echo $player['setup']['id']; ?>?loop=<?php echo $player['setup']['loop']; ?>&muted=<?php echo $player['setup']['mute']; ?>&stats=1" width="1920" height="1080" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen scrolling="no"></iframe>
					
				</div>
		</div>
		<?php
			if($player['styling']['BlockLayer']['UseBlockLayer']){
				if($player['styling']['BlockLayer']['BlockLayerType'] ){
					echo '<div class="nx-blocklayer"><div class="themed-blocklayer '.$player['styling']['BlockLayer']['BlockLayerStaticTheme'].'-theme effectstrength"></div></div>';
				}else{
					echo '<div class="nx-blocklayer"></div>';
				}
			}
		?>
	</div>
</div>