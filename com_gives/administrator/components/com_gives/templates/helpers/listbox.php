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
		$options[] = $this->option(array('text'=>JText::_('Ontario'), 'value'=>'1'));
		$options[] = $this->option(array('text'=>JText::_('Alberta'), 'value'=>'2'));
		$options[] = $this->option(array('text'=>JText::_('British Columbia'), 'value'=>'3'));
		$options[] = $this->option(array('text'=>JText::_('Manitoba'), 'value'=>'4'));
		$options[] = $this->option(array('text'=>JText::_('New Brunswick'), 'value'=>'5'));
		$options[] = $this->option(array('text'=>JText::_('Newfoundland'), 'value'=>'6'));
		$options[] = $this->option(array('text'=>JText::_('Nova Scotia'), 'value'=>'7'));
		$options[] = $this->option(array('text'=>JText::_('Northwest Territories'), 'value'=>'8'));
		$options[] = $this->option(array('text'=>JText::_('Nunavut'), 'value'=>'9'));
		$options[] = $this->option(array('text'=>JText::_('Prince Edward Island'), 'value'=>'10'));
		$options[] = $this->option(array('text'=>JText::_('Quebec'), 'value'=>'11'));
		$options[] = $this->option(array('text'=>JText::_('Saskatchewan'), 'value'=>'12'));
		$options[] = $this->option(array('text'=>JText::_('Yukon'), 'value'=>'13'));
		
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