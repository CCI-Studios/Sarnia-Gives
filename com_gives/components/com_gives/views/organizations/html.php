<?php

class ComGivesViewOrganizationsHtml extends ComDefaultViewHtml
{
	
	public function display()
	{
		$model = KFactory::tmp('admin::com.gives.model.organizations');
		// $this->assign('letters_name', $model->getLetters()); /* fixme Get Letters */
		
		return parent::display();
	}
	
}