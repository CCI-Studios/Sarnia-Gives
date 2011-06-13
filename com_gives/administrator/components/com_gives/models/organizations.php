<?php

class ComGivesModelOrganizations extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('letter_name', 'word');
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
		
		parent::_buildQueryWhere($query);
	}
}