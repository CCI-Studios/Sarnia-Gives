<?php

class ComGivesViewOpportunitiesHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		$this->assign('params', $params);
		
		$this->assign('user', 
			KFactory::get('site::com.gives.model.volunteers')->getMe());
		
		return parent::display();
	}
}