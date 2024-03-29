<?php

class ComGivesControllerProfile extends ComDefaultControllerResource
{
	
	protected function _actionGet(KCommandContext $context)
	{
		$user = JFactory::getUser();

		if ($user->guest !== 0) {
			JFactory::getApplication()->redirect('index.php?option=com_user&view=login&Itemid=11');
			return true;
		}
		
		$row = $this->getService('com://site/gives.model.volunteers')
				->set('user_id', $user->id)->getList();
		if (count($row) == 1) {
			JFactory::getApplication()
				->redirect("index.php?option=com_gives&view=volunteer&id=".$row->current()->id);
			return true;
		}
		
		$row = $this->getService('com://site/gives.model.organizations')
				->set('user_id', $user->id)->getList();

		if (count($row) == 1) {
			JFactory::getApplication()
				->redirect("index.php?option=com_gives&view=organization&id=".$row->current()->id);
			return true;
		}
		
		return parent::_actionGet($context);
	}
	
}