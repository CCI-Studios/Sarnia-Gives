<?php

class ComGivesViewOrganizationHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		
		$this->assign('show_page_title', $params->get('show_page_title'));
		$this->assign('page_title', $params->get('page_title'));
		
		if ($params->get('description')) {
			$this->assign('description', '<p>'.
				str_replace(array("\r\n", "\r", "\n"), '</p><p>', $params->get('description'))
			.'</p>');
		}
		
		return parent::display();
	}
}