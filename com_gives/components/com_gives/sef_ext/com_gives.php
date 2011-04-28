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

switch ($view) {
	case 'organization':
		$title[] = $view;
	
		$model	= KFactory::tmp('site::com.gives.model.organization');
		if (isset($layout) && $layout === 'edit') { // organization/profile/update.html
			$title[] = 'profile';
			$title[] = 'update';
			shRemoveFromGETVarsList('layout');``
		} elseif (isset($layout) && $layout === 'new') { // organization/register.html
			$title[] = 'register';
			shRemoveFromGETVarsList('layout');
		} elseif (isset($id)) {	// organization/title.html
			$title[] = $slug->sanitize($model->set('id', $id)->getItem()->title);
			shRemoveFromGETVarsList('id');
		} else {
			$title[] = 'profile';
		}
		break;
	case 'organizations':
		// no options needed
		$title[] = $view;
		break;
	case 'volunteer':
		$title[] = $view;
		break;
	case 'volunteers':
		$title[] = $view;
		break;
	case 'opportunity':
		if (isset($layout)) {
			if ($layout === 'form') {
				$title[] = $view;
				$title[]  = 'edit';
				shRemoveFromGETVarsList('layout');
			}
		}
		
		if (isset($id)) {
			$model 	= KFactory::tmp('site::com.gives.model.opportunity');
			$opp	= $model->set('id', $id)->getItem();
			
			$title[] = $view;
			$title[] = $slug->sanitize($opp->title);
			shRemoveFromGETVarsList('id');
		}
		
		break;
	case 'opportunities':
		$title[] = $view;
		if (isset($layout)) {
			if ($layout === 'search') {
				$title[] = 'search';
				shRemoveFromGETVarsList('layout');
			}
		} else {
			// nothing else
		}
		break;
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
