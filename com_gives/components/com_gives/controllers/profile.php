<?php

class ComGivesControllerProfile extends ComDefaultControllerResource
{
	
	protected function _actionGet(KCommandContext $context)
	{
		$user = KFactory::get('lib.joomla.user');

		if ($user->guest !== 0) {
			KFactory::get('lib.joomla.application')->redirect('index.php?option=com_user&view=login&Itemid=11');
			return true;
		}
		
		$row = KFactory::get('site::com.gives.model.volunteers')
				->set('user_id', $user->id)->getList();
		if (count($row) == 1) {
			KFactory::get('lib.joomla.application')
				->redirect("index.php?option=com_gives&view=volunteer&id=".$row->current()->id);
			return true;
		}
		
		$row = KFactory::get('site::com.gives.model.organizations')
				->set('user_id', $user->id)->getList();

		if (count($row) == 1) {
			KFactory::get('lib.joomla.application')
				->redirect("index.php?option=com_gives&view=organization&id=".$row->current()->id);
			return true;
		}
		
		return parent::_actionGet($context);
	}
	
}