<?php

class ComGivesViewOpportunityHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$row = $this->getModel()->getItem();
		$model = KFactory::get('site::com.gives.model.organization');
		$org = $model->set('id', $row->gives_organization_id)->getItem();
		$this->assign('organization', $org);
		
		return parent::display();		
	}
}