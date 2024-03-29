<?php

class ComGivesViewOrganizationHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		$this->assign('params', $params);
		
		$row = $this->getModel()->getItem();
		$me = $this->getModel()->getMe();
		
		if ($params->get('description')) {
			$this->assign('description', '<p>'.
				str_replace(array("\r\n", "\r", "\n"), '</p><p>', $params->get('description'))
			.'</p>');
		}
		
		if ($this->layout !== 'form') {
			$this->assign('edit', $me->id === $row->user_id);
			$this->assign('title', sprintf("%s's Profile", $row->title));
		} else {
			$this->assign('title', sprintf("%s's Settings", $row->title));
		}
		
		return parent::display();
	}
}