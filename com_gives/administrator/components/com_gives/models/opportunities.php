<?php

class ComGivesModelOpportunities extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('organization_id', 'int')
			->insert('locations', 'raw')
			->insert('skills', 'raw')
			->insert('interests', 'raw')
			->insert('enabled', 'boolean', false)
			->insert('fuzzy', 'boolean', false);
	}	
	
	
	public function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		
		if ($state->fuzzy) {
			$op = 'OR';
		} else {
			$op = 'AND';
		}
		
		if ($state->enabled) {
			$query->where('tbl.enabled', '=', '1');
		}
		
		if (is_numeric($state->organization_id)) {
			$query->where('tbl.gives_organization_id', '=', $state->organization_id);
		}
		
		if (count($state->locations)) {
			$query->where('tbl.locations', 'REGEXP', implode('|', $state->locations), $op);
		}
		
		if (count($state->interests)) {
			$query->where('tbl.interests', 'REGEXP', implode('|', $state->interests), $op);
		}
		
		if (count($state->skills)) {
			$query->where('tbl.skills', 'REGEXP', implode('|', $state->skills), $op);
		}
		
		parent::_buildQueryWhere($query);
	}
}