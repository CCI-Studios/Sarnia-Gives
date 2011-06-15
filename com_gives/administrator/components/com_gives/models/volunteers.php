<?php

class ComGivesModelVolunteers extends ComDefaultModelDefault
{
	protected $_me;
	
	
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
	
	public function getMe()
	{
		if (!isset($this->_me)) {
			$user = KFactory::get('lib.joomla.user');
			
			$table = $this->getTable();
			$query = $table->getDatabase()->getQuery();
			
			$query->select(array('tbl.*', 'user.*'))
				->from('users AS user')
				->join('LEFT', 'gives_volunteers AS tbl', 'user.id = tbl.user_id')
				->where('user.id', '=', $user->id)
				->limit(1);

			$this->_me = $table->select($query, KDatabase::FETCH_ROW);
		}
		
		return $this->_me;
	}
}