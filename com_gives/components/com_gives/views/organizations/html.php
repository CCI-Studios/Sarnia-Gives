<?php

class ComGivesViewOrganizationsHtml extends ComDefaultViewHtml
{
	
	public function display()
	{
		$this->assign('letters', $this->getModel()->getLetters());
		
		return parent::display();
	}
	
}