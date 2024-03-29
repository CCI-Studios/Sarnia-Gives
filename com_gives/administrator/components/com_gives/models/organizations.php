<?php

class ComGivesModelOrganizations extends ComDefaultModelDefault
{
	protected $_me;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('enabled', 'int')
			->insert('expired', 'int')
			->insert('letter_name', 'word')
			->insert('user_id', 'int')
			->remove('sort')
			->insert('sort', 'cmd', 'title');
	}

	public function getLetters()
	{
		$database = $this->getTable()->getDatabase();

		$query = $database->getQuery()
			->distinct()
			->from('gives_organizations AS tbl')
			->order('letter_name');

		// $this->_buildQueryWhere($query);

		$query->columns[] = 'LEFT(tbl.title, 1) AS letter_name';


		$result = $database->select($query, KDatabase::FETCH_FIELD_LIST);
		return $result;
	}

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		$app = JFactory::getApplication();

		if (is_numeric($state->enabled)) {
			$query->where('tbl.enabled', '=', $state->enabled);
		}

		if (is_numeric($state->expired)) {
			if (!$state->expired) {
				$query->where('tbl.expires >= NOW()');
			} else {
				$query->where('tbl.expires <= NOW()');
			}
		}

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
			$user = JFactory::getUser();

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

	public function validate($data)
	{
		$errors = array();
		if ($data->title === '') {
			$errors[] = JText::_('An organization name is required.');
		}

		if ($data->contact === '') {
			$errors[] = JText::_('Contact name is required.');
		}

		if ($data->email === '') {
			$errors[] = JText::_('An email address is required.');
		} else {
			$user = JFactory::getUser();

			$db = $this->getTable()->getDatabase();
			$query = $db->getQuery();
			$query->select('*')
				->from('users')
				->where('email', '=', $data->email)
				->where('id', '<>', $user->id);

			$results = $db->select($query);
			if (count($results)) {
				$errors[] = JText::_('A user already exists with that email address.');
			}
		}

		return $errors;
	}
}