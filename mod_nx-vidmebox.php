<?php
/**
 * Controller File for nx-vidmeBox 
 * @package     nx-vidmeBox
 *
 * @copyright   Copyright (C) 2009 - 2017 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

defined('_JEXEC') or die('Restricted access');


require_once (dirname(__FILE__) . '/' . 'helper.php');


$player = array();
$playersetup = array();
// Source Settings
$rndm = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
$nxdebug = intval($params->get('debug',0));


// Player Settings
$player['setup'] = array();
$player['setup']['id'] = nxPlayerHelper::cleanUp($params->get('id','0'));
$player['setup']['autoplay'] = $params->get('autoplay','0');
$player['setup']['loop'] = $params->get('loop','0');
$player['setup']['mute'] = $params->get('mute','0');


// The Styling Parameters
$player['styling'] = array();
$player['styling']['randomizer'] = $rndm;
$player['styling']['CornerRadius'] = $params->get('cornerradius',0);
// Border Setup
$player['styling']['Borders'] = array();
$player['styling']['Borders']['UseBorder'] = $params->get('enableborders');
$player['styling']['Borders']['UseAdvancedBorder'] = $params->get('enableadvancedborders');
$player['styling']['Borders']['BordersColor'] = $params->get('bordercolor');
$player['styling']['Borders']['BorderWidth'] = $params->get('borderwidth');
$player['styling']['Borders']['BorderLeftColor'] = $params->get('bordercolorleft');
$player['styling']['Borders']['BorderTopColor'] = $params->get('bordercolortop');
$player['styling']['Borders']['BorderRightColor'] = $params->get('bordercolorright');
$player['styling']['Borders']['BorderBottomColor'] = $params->get('bordercolorbottom');

// Outer Shadow
$player['styling']['OuterShadow'] = array();
$player['styling']['OuterShadow']['UseOuterShadow'] = intval($params->get('enableoutershadow','0'));
$player['styling']['OuterShadow']['ShadowColor'] = $params->get('outershadowcolor','rgba(0,0,0, 0.7');
$player['styling']['OuterShadow']['HOffset'] = intval($params->get('outershadowhoffset','4'));
$player['styling']['OuterShadow']['VOffset'] = intval($params->get('outershadowvoffset','4'));
$player['styling']['OuterShadow']['BlurRadius'] = intval($params->get('outershadowblurradius','4'));
$player['styling']['OuterShadow']['SpreadRadius'] = intval($params->get('outershadowspreadradius','0'));
// BlockLayer Setup
$player['styling']['BlockLayer'] = array();
$player['styling']['BlockLayer']['UseBlockLayer'] = intval($params->get('enableblocklayer','0'));
$player['styling']['BlockLayer']['BlockLayerType'] = intval($params->get('blocklayertype','0'));					// color || static || animated
$player['styling']['BlockLayer']['BlockLayerBgColor'] = $params->get('blocklayerbackgroundcolor','0');
$player['styling']['BlockLayer']['InsetShadow'] = array();
$player['styling']['BlockLayer']['InsetShadow']['Status'] = intval($params->get('enableinsetshadow','0'));
$player['styling']['BlockLayer']['InsetShadow']['Color'] = $params->get('innershadowcolor','#000');
$player['styling']['BlockLayer']['InsetShadow']['OffsetH'] = intval($params->get('innershadowhoffset','0'));
$player['styling']['BlockLayer']['InsetShadow']['OffsetV'] = intval($params->get('innershadowvoffset','0'));
$player['styling']['BlockLayer']['InsetShadow']['BlurRadius'] = intval($params->get('innershadowblurradius','0'));
$player['styling']['BlockLayer']['InsetShadow']['SpreadRadius'] = intval($params->get('innershadowspreadradius','0'));
$player_bl_sh = $player['styling']['BlockLayer']['InsetShadow']; 


$playerstyle = nxPlayerHelper::playersetup($player['styling']);


// Moduleclass Suffix
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
// The Layout
require( JModuleHelper::getLayoutPath( 'mod_nx-vidmebox' ) );