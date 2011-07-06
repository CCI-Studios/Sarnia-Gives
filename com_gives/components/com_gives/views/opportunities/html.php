<?php

class ComGivesViewOpportunitiesHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		$this->assign('params', $params);
		
		return parent::display();
	}
}