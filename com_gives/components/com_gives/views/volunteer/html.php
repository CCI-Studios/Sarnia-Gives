<?php

class ComGivesViewVolunteerHtml extends ComGivesViewHtml
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
			if ($me->id === $row->user_id) {
				$this->assign('edit_button', true);
			} else {
				$this->assign('edit_button', false);
			}
			
			$this->assign('title', sprintf("%s's Profile", $row->first_name.' '.$row->last_name));
		} else {
			$this->assign('title', sprintf("%s's Settings", $row->first_name.' '.$row->last_name));
		}
		
		return parent::display();
	}
}