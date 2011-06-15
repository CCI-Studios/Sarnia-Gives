<?php

class ComGivesControllerProfile extends ComDefaultControllerDefault
{
	
	protected function _actionGet(KCommandContext $context)
	{
		$user = KFactory::get('lib.joomla.user');

		if ($user->guest !== 0) {
			KFactory::get('lib.joomla.application')->redirect('index.php?option=com_user&view=login');
			return true;
		}
		
		$row = KFactory::get('site::com.gives.model.volunteers')
				->set('user_id', $user->id)->getList();
		if (count($row) == 1) {
			KFactory::get('lib.joomla.application')
				->redirect("index.php?option=com_gives&view=volunteer&layout=profile&id=".$row->current()->id);
			return true;
		}
		
		$row = KFactory::get('site::com.gives.model.organizations')
				->set('user_id', $user->id)->getList();
		if (count($row) == 1) {
			KFactory::get('lib.joomla.application')
				->redirect("index.php?option=com_gives&view=organization&layout=profile&id=".$row->current()->id);
			return true;
		}
		
		return parent::_actionGet($context);
	}
	
}