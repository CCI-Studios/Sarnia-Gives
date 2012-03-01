<?php
/**
 * shCustomTags support for com_content
 *
 * @author      $Author: shumisha $
 * @copyright   Yannick Gaultier - 2007-2010
 * @package     sh404SEF-15
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version     $Id: com_content.php 1881 2011-03-17 08:41:09Z silianacom-svn $
 *
 *  This module must set $shCustomTitleTag, $shCustomDescriptionTag, $shCustomKeywordsTag,$shCustomLangTag, $shCustomRobotsTag according to specific component output
 *
 * if you set a variable to '', this will ERASE the corresponding meta tag
 * if you set a variable to null, this will leave the corresponding meta tag UNCHANGED
 *
 *
 */

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

global $Itemid;

global $shMosConfig_locale, $sh_LANG, $mainframe;

$sefConfig = & shRouter::shGetConfig();

$database =& JFactory::getDBO();

$view = JREQUEST::getCmd('view', null);
$catid = JREQUEST::getInt('catid', null);
$id = JREQUEST::getInt('id', null);
$limit = JREQUEST::getInt('limit', null);
$limitstart = JREQUEST::getInt('limitstart', null);
$layout = JREQUEST::getCmd('layout', null);
$showall = JREQUEST::getInt('showall', null);
$format = JREQUEST::getCmd('format', null);
$print = JREQUEST::getInt('print', null);
$tmpl = JREQUEST::getCmd('tmpl', null);
$lang = JREQUEST::getString('lang', null);

$shLangName = empty($lang) ? $shMosConfig_locale : shGetNameFromIsoCode( $lang);
$shLangIso = isset($lang) ? $lang : shGetIsoCodeFromName( $shMosConfig_locale);
$shLangIso = shLoadPluginLanguage( 'com_content', $shLangIso, 'COM_SH404SEF_CREATE_NEW');
//-------------------------------------------------------------

global 	$shCustomTitleTag, $shCustomDescriptionTag, $shCustomKeywordsTag,
$shCustomLangTag, $shCustomRobotsTag, $shCanonicalTag;

// add no follow to print pages
$shCustomRobotsTag = ($tmpl == 'component') ? 'noindex, nofollow' : $shCustomRobotsTag;

// calculate page title
$title= array();
switch ($view) {
	case 'organizations':
		$title[] = 'Directory';
		break;
	case 'organization':
		$title[] = 'Organization';
		if ($layout == 'form') {
			$title[] = 'Organization Registration';
		} else {
			$model = $this->getService('com://admin/gives.model.organization');
			$org = $model->set('id', $id)->getitem();
			
			$title[] = $org->title;
			$title[] = 'Edit Profile';
		}
		break;
	case 'opportunities':
		if ($layout === 'search' || $layout === 'default') {
			$title[] = 'Criteria Search';
		} elseif ($layout === 'map') {
			$title[] = 'Map Search';
		} else {
			$title[] = 'Opportunities';
		}
		break;
	case 'opportunity':
		$title[] = 'Opportunity';
		if ($layout == 'form') {
			$title[] = 'New Opportunity';
		} else {
			$opps = $this->getService('com://admin/gives.model.opportunity');
			$opp = $opps->set('id', $id)->getitem();
			$orgs = $this->getService('com://admin/gives.model.organizations');
			$org = $orgs->set('id', $opp->gives_organization_id)->getItem();
			
			$title[] = $org->title .' - '. $opp->title;
		}
		break;
	case 'volunteers':
		if ($layout === 'form') {
			$title[] = 'Volunteer Registration';
		} elseif ($layout === 'edit') {
			$model = $this->getService('com://admin/gives.model.volunteers');
			$me = $model->getMe();
			
			$title[] = $me->display_name();
			$title[] = 'Edit Profile'; 
		} else { // default
			$model = $this->getService('com://admin/gives.model.volunteers');
			$me = $model->getMe();
			
			$title[] = $me->display_name();
		}
		break;
	case 'volunteer':
		if ($layout === 'form') {
			$title[] = 'Volunteer Registration';
		} elseif ($layout === 'edit') {
			$model = $this->getService('com://admin/gives.model.volunteers');
			$me = $model->getMe();
			
			$title[] = $me->display_name();
			$title[] = 'Edit Profile'; 
		} else { // default
			$model = $this->getService('com://admin/gives.model.volunteers');
			$me = $model->getMe();
			
			$title[] = $me->display_name();
		}
		break;
	case 'profile':
		$title[] = 'Profile';
		break;
}

$shCustomTitleTag = implode(' | ', $title);