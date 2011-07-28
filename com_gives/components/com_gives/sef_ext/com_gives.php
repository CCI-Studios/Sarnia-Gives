<?php
// ------------------ standard plugin initialize function - don't change ---------------------------
global $sh_LANG, $sefConfig;
$shLangName = '';;
$shLangIso = '';
$title = array();
$shItemidString = '';
$dosef = shInitializePlugin( $lang, $shLangName, $shLangIso, $option);
// ------------------ standard plugin initialize function - don't change ---------------------------

shRemoveFromGETVarsList('view');
$slug = KFactory::tmp('lib.koowa.filter.slug');

if (!isset($view))
	$view = "";

switch ($view) {
	case 'organization':
		$model	= KFactory::tmp('site::com.gives.model.organization');
		if (isset($layout) && $layout === 'edit' && isset($id)) {
			$title[] = JText::_('organization');
			$title[] = JText::_('edit');
			$title[] = $id;
			
			shRemoveFromGETVarsList('layout');
			shRemoveFromGETVarsList('id');
		} elseif (isset($layout) && $layout === 'form' ) {
			$title[] = JText::_('organization');
			$title[] = JText::_('organization-registration');
			
			shRemoveFromGETVarsList('layout');
		} elseif (isset($id)) {
			$org = $model->set('id', $id)->getItem();
			
			$title[] = JText::_('organization');
			$title[] = $id .'-'. $slug->sanitize($org->title);
			
			shRemoveFromGETVarsList('id');
		}
		break;
	case 'organizations':
		$title[] = JText::_('organizations');
		break;
	case 'volunteer':
		if (isset($layout) && $layout === 'edit' && isset($id)) {
			$title[] = JText::_('volunteer');
			$title[] = JText::_('edit');
			
			shRemoveFromGETVarsList('layout');
			// shRemoveFromGETVarsList('id');
		} elseif (isset($layout) && $layout === 'form') {
			$title[] = JText::_('volunteer');
			$title[] = JText::_('volunteer-registration');
			
			shRemoveFromGETVarsList('layout');
		} elseif (isset($id)) {
			$title[] = JText::_('volunteers');
		}
		
		break;
	case 'volunteers':
		$title[] = $view;
		break;
	case 'opportunity':
		$model	= KFactory::tmp('site::com.gives.model.opportunities');
		if (isset($layout)) {
			if ($layout == 'form' && isset($id)) {
				$title[] = $view;
				$title[] = 'edit';
				$title[] = $id;
				
				shRemoveFromGETVarsList('layout');
				shRemoveFromGETVarsList('id');
			} elseif ($layout === 'form') {
				$title[] = $view;
				$title[]  = 'register';
				shRemoveFromGETVarsList('layout');
			}
		} elseif (isset($id)) {
			$opp	= $model->set('id', $id)->getItem();
			
			$title[] = $view;
			$title[] = $id .'-'. $slug->sanitize($opp->title);
			shRemoveFromGETVarsList('id');
		}

		break;
	case 'opportunities':
		$title[] = $view;
		if (isset($layout)) {
			if ($layout === 'search') {
				$title[] = 'search';
				shRemoveFromGETVarsList('layout');
			} elseif ($layout === 'default') {
				$title[] = 'search-results';
				shRemoveFromGETVarsList('layout');
			} elseif ($layout === 'map') {
				$title[] = 'map-search';
				shRemoveFromGETVarsList('layout');
			}
		} else {
			// nothing else
		}
		break;
	case 'profile':
		$title[] = $view;
		break;
	case '':
	default:
		$title = "gives";
		$title = "dashboard";
		
}

shRemoveFromGETVarsList('option');
shRemoveFromGETVarsList('lang');
if (!empty($Itemid))
	shRemoveFromGETVarsList('Itemid');
// optional removal of limit and limitstart
if (!empty($limit))                       // use empty to test $limit as $limit is not allowed to be zero
	shRemoveFromGETVarsList('limit');
if (isset($limitstart))                   // use isset to test $limitstart, as it can be zero
	shRemoveFromGETVarsList('limitstart');

// ------------------ standard plugin finalize function - don't change ---------------------------
if ($dosef){
$string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString,
(isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null),
(isset($shLangName) ? @$shLangName : null));
}
// ------------------ standard plugin finalize function - don't change ---------------------------
