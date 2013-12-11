<?php

class ComGivesModelRegistrations extends ComDefaultModelDefault
{

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('event_id', 'int');
	}

	public function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		if (is_numeric($state->event_id)) {
			$query->where('tbl.gives_event_id', '=', $state->event_id);
		}

		parent::_buildQueryWhere($query);
	}
}