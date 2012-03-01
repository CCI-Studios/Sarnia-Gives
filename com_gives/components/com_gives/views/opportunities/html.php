<?php

class ComGivesViewOpportunitiesHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		$this->assign('params', $params);
		
		$this->assign('user', $this->getService('com://site/gives.model.volunteers')->getMe());

		if ($this->getLayout() == 'default') {
			$this->assign('opps_is', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', KRequest::get('get.interests', 'raw'))
				->set('skills', KRequest::get('get.skills', 'raw'))
				->set('locations', null)
				->getList());
				
			$this->assign('opps_il', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', KRequest::get('get.interests', 'raw'))
				->set('skills', null)
				->set('locations', KRequest::get('get.locations', 'raw'))
				->getList());
				
			$this->assign('opps_sl', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', null)
				->set('skills', KRequest::get('get.skills', 'raw'))
				->set('locations', KRequest::get('get.locations', 'raw'))
				->getList());
				
			$this->assign('opps_i', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', KRequest::get('get.interests', 'raw'))
				->set('skills', null)
				->set('locations', null)
				->getList());
				
			$this->assign('opps_s', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', null)
				->set('skills', KRequest::get('get.skills', 'raw'))
				->set('locations', null)
				->getList());
				
			$this->assign('opps_l', $this->getService('com://site/gives.model.opportunities')
				->set('enabled', '1')
				->set('interests', null)
				->set('skills', null)
				->set('locations', KRequest::get('get.locations', 'raw'))
				->getList());
		} elseif ($this->getLayout() === 'map') {
			$this->assign('address', KRequest::get('get.address', 'string'));
			$this->assign('distance', KRequest::get('get.distance', 'string'));
		} elseif ($this->getLayout() === 'browse') {
		}
		
		return parent::display();
	}
}