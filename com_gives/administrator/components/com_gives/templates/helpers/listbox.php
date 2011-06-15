<?php

class ComGivesTemplateHelperListbox extends KTemplateHelperListbox {
	
	public function provinces($config = array()) {
		$config = new KConfig($config);
		$config->append(array(
			'name' => 'province',
		))->append(array(
			'selected' => $config->{$config->name}
		));
		
		$options = array();
		
		$options[] = $this->option(array('text'=>'- '.JText::_('Select').' -', 'value'=>''));
		$options[] = $this->option(array('text'=>JText::_('Ontario'), 'value'=>'Ontario'));
		$options[] = $this->option(array('text'=>JText::_('Alberta'), 'value'=>'Alberta'));
		$options[] = $this->option(array('text'=>JText::_('British Columbia'), 'value'=>'British Columbia'));
		$options[] = $this->option(array('text'=>JText::_('Manitoba'), 'value'=>'Manitoba'));
		$options[] = $this->option(array('text'=>JText::_('New Brunswick'), 'value'=>'New Brunswick'));
		$options[] = $this->option(array('text'=>JText::_('Newfoundland'), 'value'=>'Newfoundland'));
		$options[] = $this->option(array('text'=>JText::_('Nova Scotia'), 'value'=>'Nova Scotia'));
		$options[] = $this->option(array('text'=>JText::_('Northwest Territories'), 'value'=>'Northwest Territories'));
		$options[] = $this->option(array('text'=>JText::_('Nunavut'), 'value'=>'Nunavut'));
		$options[] = $this->option(array('text'=>JText::_('Prince Edward Island'), 'value'=>'Prince Edward Island'));
		$options[] = $this->option(array('text'=>JText::_('Quebec'), 'value'=>'Quebec'));
		$options[] = $this->option(array('text'=>JText::_('Saskatchewan'), 'value'=>'Saskatchewan'));
		$options[] = $this->option(array('text'=>JText::_('Yukon'), 'value'=>'Yukon'));
		
		$config->options = $options;
		return $this->optionlist($config);
	}
	
	public function volunteerTypes($config = array()) {
		$config = new KConfig($config);
		$config->append(array(
			'name' => 'type',
		))->append(array(
			'selected' => $config->{$config->name}
		));
		
		$options = array();
		
		$options[] = $this->option(array('text'=>'- '.JText::_('Select').' -', 'value'=>''));
		$options[] = $this->option(array('text'=>JText::_('Youth'), 'value'=>'1'));
		$options[] = $this->option(array('text'=>JText::_('Adult'), 'value'=>'2'));
		$options[] = $this->option(array('text'=>JText::_('Retiree'), 'value'=>'3'));
		$options[] = $this->option(array('text'=>JText::_('Newcomer'), 'value'=>'4'));
		                                         
		$config->options = $options;
		return $this->optionlist($config);
	}
	
	public function organizationTypes($config = array()) {
		$config = new KConfig($config);
		$config->append(array(
			'name' => 'type',
		))->append(array(
			'selected' => $config->{$config->name}
		));
		
		$options = array();
		
		$options[] = $this->option(array('text'=>'- '.JText::_('Select').' -', 'value'=>''));
		$options[] = $this->option(array('text'=>JText::_('Not-for-Profit'), 'value'=>'1'));
		$options[] = $this->option(array('text'=>JText::_('Private Sector'), 'value'=>'2'));
		$options[] = $this->option(array('text'=>JText::_('Registered Charity'), 'value'=>'3'));
		$options[] = $this->option(array('text'=>JText::_('Public Sector'), 'value'=>'4'));
		                                         
		$config->options = $options;
		return $this->optionlist($config);
	}
	
	public function yesNo($config = array()) {
		$config = new KConfig($config);
		$config->append(array(
			'name' => 'yesNo',
		))->append(array(
			'selected' => $config->{$config->name}
		));
		
		$options = array();
		
		$options[] = $this->option(array('text'=>'- '.JText::_('Select').' -', 'value'=>''));
		$options[] = $this->option(array('text'=>JText::_('Yes'), 'value'=>'1'));
		$options[] = $this->option(array('text'=>JText::_('No'), 'value'=>'0'));
		                                         
		$config->options = $options;
		return $this->optionlist($config);
	}
	
	public function interests($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'interests',
			'attribs' 	=> array(
				'multiple'=>'multiple',
				'style'=>'width: 100%;',
			),
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		$config->name = $config->name.'[]';
		
		$options = array();
		
		$options[] = $this->option(array('text'=>"Animals/Animal Services", 'value'=>"Animals/Animal Services"));
		$options[] = $this->option(array('text'=>"Community Development", 'value'=>"Community Development"));
		$options[] = $this->option(array('text'=>"Health &amp; Wellness", 'value'=>"Health & Wellness"));
		$options[] = $this->option(array('text'=>"Arts &amp; Culture", 'value'=>"Arts & Culture"));
		$options[] = $this->option(array('text'=>"Emergency/Crisis Services", 'value'=>"Emergency/Crisis Services"));
		$options[] = $this->option(array('text'=>"Social Services &amp; Justice", 'value'=>"Social Services & Justice"));
		$options[] = $this->option(array('text'=>"Children &amp; Youth", 'value'=>"Children & Youth"));
		$options[] = $this->option(array('text'=>"Environment", 'value'=>"Environment"));
		$options[] = $this->option(array('text'=>"Special Events", 'value'=>"Special Events"));
		
		$config->options = $options;
		
		return $this->optionlist($config);
	}
	
	public function locations($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'locations',
			'attribs' 	=> array(
				'multiple'=>'multiple',
				'style'=>'width: 100%;',
			),
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		$config->name = $config->name.'[]';
		
		$options = array();
		
		$options[] = $this->option(array('text'=>"Brooke-Alvinston", 'value'=>"Brooke-Alvinston"));
		$options[] = $this->option(array('text'=>"Lambton Shores", 'value'=>"Lambton Shores"));
		$options[] = $this->option(array('text'=>"Point Edward", 'value'=>"Point Edward"));
		$options[] = $this->option(array('text'=>"Sarnia", 'value'=>"Sarnia"));
		$options[] = $this->option(array('text'=>"Dawn-Euphemia", 'value'=>"Dawn-Euphemia"));
		$options[] = $this->option(array('text'=>"Oil Springs", 'value'=>"Oil Springs"));
		$options[] = $this->option(array('text'=>"Plympton Wyoming", 'value'=>"Plympton Wyoming"));
		$options[] = $this->option(array('text'=>"Enniskillen", 'value'=>"Enniskillen"));
		$options[] = $this->option(array('text'=>"Petrolia", 'value'=>"Petrolia"));
		$options[] = $this->option(array('text'=>"St. Clair", 'value'=>"St. Clair"));
		$options[] = $this->option(array('text'=>"Location Flexible", 'value'=>"Location Flexible"));
		
		$config->options = $options;
		
		return $this->optionlist($config);
	}
	
	public function skills($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'skills',
			'attribs' 	=> array(
				'multiple'=>'multiple',
				'style'=>'width: 100%;',
			),
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		$config->name = $config->name.'[]';
		
		$options = array();
		
		$options[] = $this->option(array('text'=>"Accounting", 'value'=>"Accounting"));
		$options[] = $this->option(array('text'=>"Coaching", 'value'=>"Coaching"));
		$options[] = $this->option(array('text'=>"Event Coordination", 'value'=>"Event Coordination"));
		$options[] = $this->option(array('text'=>"IT", 'value'=>"IT"));
		$options[] = $this->option(array('text'=>"Marketing & Communications", 'value'=>"Marketing & Communications"));
		$options[] = $this->option(array('text'=>"Outreach", 'value'=>"Outreach"));
		$options[] = $this->option(array('text'=>"Translation", 'value'=>"Translation"));
		$options[] = $this->option(array('text'=>"Bilingual (Eng/Fr)", 'value'=>"Bilingual (Eng/Fr)"));
		$options[] = $this->option(array('text'=>"Counseling", 'value'=>"Counseling"));
		$options[] = $this->option(array('text'=>"Fundraising", 'value'=>"Fundraising"));
		$options[] = $this->option(array('text'=>"Legal", 'value'=>"Legal"));
		$options[] = $this->option(array('text'=>"Medical Assistance", 'value'=>"Medical Assistance"));
		$options[] = $this->option(array('text'=>"PR", 'value'=>"PR"));
		$options[] = $this->option(array('text'=>"Writing & Research", 'value'=>"Writing & Research"));
		$options[] = $this->option(array('text'=>"Board Work", 'value'=>"Board Work"));
		$options[] = $this->option(array('text'=>"", 'value'=>"General Administration"));
		$options[] = $this->option(array('text'=>"Management Consulting", 'value'=>"Management Consulting"));
		$options[] = $this->option(array('text'=>"Mentoring & Training", 'value'=>"Mentoring & Training"));
		$options[] = $this->option(array('text'=>"Sports & Recreation", 'value'=>"Sports & Recreation"));
		$options[] = $this->option(array('text'=>"", 'value'=>""));
		
		$config->options = $options;
		
		return $this->optionlist($config);
	}
}