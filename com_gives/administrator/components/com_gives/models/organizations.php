<?php

class ComGivesModelOrganizations extends ComDefaultModelDefault
{
	protected $_me;
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('letter_name', 'word')
			->insert('user_id', 'int');
	}
	
	public function getLetters() 
	{
		$database = KFactory::get($this->getTable())->getDatabase();
		
		$query = $database->getQuery()
			->distinct()
			->from('gives_organizations AS tbl')
			->order('letter_name');
		
		$this->_buildQueryWhere($query);
			
		$query->columns[] = 'LEFT(tbl.title, 1) AS letter_name';


		$result = $database->select($query, KDatabase::FETCH_FIELD_LIST);
		return $result;
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		
		if ($state->letter_name) {
			$query->where('tbl.title', 'LIKE', $state->letter_name.'%');
		}	
		
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
				->join('LEFT', 'gives_organizations AS tbl', 'user.id = tbl.user_id')
				->where('user.id', '=', $user->id)
				->limit(1);

			$this->_me = $table->select($query, KDatabase::FETCH_ROW);
		}
		
		return $this->_me;
	}
}