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
	
	public function organizations($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'model'		=> 'organizations',
			'name'		=> 'gives_organization_id',
			'value'		=> 'id',
			'text'		=> 'title',
			'prompt'	=> '- Select organization -',
		));
		
		return $this->_listbox($config);
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
}