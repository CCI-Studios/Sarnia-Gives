<?php

class ComGivesViewOrganizationsHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$this->getToolbar()
			->append('preferences');
			
		return parent::display();
	}
}