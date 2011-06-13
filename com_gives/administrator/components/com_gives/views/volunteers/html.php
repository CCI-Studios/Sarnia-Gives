<?php

class ComGivesViewVolunteersHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$this->getToolbar()
			->append('preferences');
			
		return parent::display();
	}
}