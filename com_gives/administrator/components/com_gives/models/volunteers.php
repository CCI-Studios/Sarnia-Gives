<?php

class ComGivesModelVolunteers extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('user_id', 'int');
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		
		if (is_numeric($state->user_id)) {
			$query->where('user_id', '=', $state->user_id);
		}
		
		parent::_buildQueryWhere($query);
	}
	
}