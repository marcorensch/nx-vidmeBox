<?php
/**
 * Helper File for nx-YouTubeBox 
 * @package     nx-YouTubeBox
 *
 * @copyright   Copyright (C) 2009 - 2017 nx-designs.
 * @license     GNU General Public License version 2 or later
*/

defined( '_JEXEC' ) or die( 'Restricted access' );




class nxPlayerHelper
{
	// Subfunctions

	public static function cornerRadius($setup){
		$value = 'border-radius:'.$setup['CornerRadius'].'; overflow: hidden;';
		return $value;
	}

	public static function shadowoptions($array){
		if($array['UseOuterShadow']){
			$shadowsetup = 'box-shadow:'.$array['HOffset'].'px '.$array['VOffset'].'px '.$array['BlurRadius'].'px '.$array['SpreadRadius'].'px '.$array['ShadowColor'].';';
		}else{
			$shadowsetup = 'box-shadow:none;';
		}
		return $shadowsetup;
	}
		
	public static function bordersetup($array){
		$useBorder = intval($array['Borders']['UseBorder']);
		$advancedBorders = intval($array['Borders']['UseAdvancedBorder']);
		if($advancedBorders){	
			$bordersetup = 'border-style:solid; 
						border-width: '.$array['Borders']['BorderWidth'].'; 
						border-left-color: '.$array['Borders']['BorderLeftColor'].'; 
						border-top-color: '.$array['Borders']['BorderTopColor'].'; 
						border-right-color: '.$array['Borders']['BorderRightColor'].'; 
						border-bottom-color: '.$array['Borders']['BorderBottomColor'].';
						box-sizing: border-box;';
		}elseif($useBorder){
			$bordersetup = 'border-width: '.$array['Borders']['BorderWidth'].'; 
						border-style: solid; 
						border-color: '.$array['Borders']['BordersColor'].'; 
						box-sizing: border-box;';
		}else{
			$bordersetup = 'border:none;';
		}

		return $bordersetup;
	}
	
	
	
	public static function ZeroToThree($number){
		if($number == 0){
			$retval = 3;
		}else{
			$retval = 1;
		}
		return $retval;
	}
	
	
	public static function cleanUp($id){
		if ((strpos($id,"https://")!==false) OR (strpos($id,"http://")!==false) OR (strpos($id,"vidme.com")!==false) OR (strpos($id,"viddme.com")!==false)){ 
				$array=explode("/", $id);
				$cleanID=$array[3];
		} else {
			$cleanID = $id;
		}
		return $cleanID;
	}
	
	public static function playersetup($array){
		$valuesOuterDiv = '';												// will be filled with CSS Styles
		$valuesInnerDiv = '';


		$valuesOuterDiv .= nxPlayerHelper::bordersetup($array);				// Borders
		$valuesOuterDiv .= nxPlayerHelper::cornerRadius($array);			// Border Radius


		$valuesOuterDiv .= nxPlayerHelper::shadowoptions($array['OuterShadow']);			// Outer Shadow

		$playerstlye = '#nx-player_'.$array['randomizer'].'_outer {'.$valuesOuterDiv.'}
						#nx-playercontainer_'.$array['randomizer'].'{'.$valuesInnerDiv.'}';
		return $playerstlye;
	}
}