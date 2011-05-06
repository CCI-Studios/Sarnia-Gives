<?php

class ComGivesModelOrganizations extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('detail', 'cmd');
	}
	
	protected function _buildQueryColumns(KDatabaseQuery $query)
	{
		if (isset($this->_state->detail)) {
			if ($this->_state->detail === 'short') {
				$query->select(array(
					'tbl.gives_organization_id',
					'tbl.title',
					'tbl.email',
				));
			}
		}
	}
	
}