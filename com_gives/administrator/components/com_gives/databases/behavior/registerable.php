<?php

class ComGivesDatabaseBehaviorRegisterable extends KDatabaseBehaviorAbstract
{
	protected $_column;
	protected $_name_column;
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_column = $config->column;
		$this->_name_columns = $config->name;
	}
	
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'column'	=> 'user_id',
			'name'		=> array(),
		));
		
		parent::_initialize($config);
	}
	
	protected function _beforeTableInsert(KCommandContext $context)
	{
		$post = $context->data;
		
		if ($post->password != $post->confirmation) {
			echo "fail"; /* FIXME Add Message */
			return false;
		}
		
		$name = '';
		foreach ($this->_name_columns as $col)
			$name .= ' ' . $post->{$col};

		$user = $this->_createUser($name, $post->email, $post->password);
		
		var_dump($user);
		
		if	($user->getErrors()) {
			/* FIXME echo save errors */
			return false;
		}

		$post->{$this->_column} = $user->id;
		
		return true;
	}
	
	protected function _createUser($name, $email, &$password = null, $level = null)
	{
		jimport('joomla.user.helper');
		
		$acl = JFactory::getACL();
		$user = new JUser();
	
		$user->username = $email;
		$user->name = $name;
		$user->email = $email;
		
		if ($password == null) {
			$password = JUserHelper::genRandomPassword(10); 
		}
		$salt = JUserHelper::genRandomPassword(32);
		$crypt = JUserHelper::getCryptedPassword($password, $salt);
		$user->password = "$crypt:$salt";
		
		if ($level == null) {
			$level = 'Registered';
		}
		$user->id = 0;
		$user->usertype = $level;
		$user->gid = $acl->get_group_id('', $level, 'ARO');
		
		$user->registerDate = date('Y-m-d H:i:s');
		//$user->save();
		
		return $user;
	}
}