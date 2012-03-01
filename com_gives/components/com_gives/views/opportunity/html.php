<?php

class ComGivesViewOpportunityHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$me = JFactory::getUser();
		$row = $this->getModel()->getItem();
		$model = $this->getService('com://site/gives.model.organization');
		$org = $model->set('id', $row->gives_organization_id)->getItem();
		$this->assign('organization', $org);
		$this->assign('edit', $org->user_id == $me->id);
		
		return parent::display();		
	}
}