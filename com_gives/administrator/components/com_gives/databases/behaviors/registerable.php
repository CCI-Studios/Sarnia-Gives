<?php

class ComGivesDatabaseBehaviorRegisterable extends KDatabaseBehaviorAbstract
{
	protected $_column;
	protected $_name_column;
	protected $_email;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_column = $config->column;
		$this->_name_columns = $config->name;
		$this->_email = $config->email;
	}

	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'column'	=> 'user_id',
			'name'		=> array(),
			'email'		=> 'email',
		));

		parent::_initialize($config);
	}

	protected function _beforeTableInsert(KCommandContext $context)
	{
		$post = $context->data;

		if ($post->password != $post->confirmation) {
			echo "Passwords don't match."; /* FIXME Add Message */
			die;
			return false;
		}

		$name = '';
		foreach ($this->_name_columns as $col)
			$name .= ' ' . $post->{$col};

		$user = $this->_createUser($name, $post->{$this->_email}, $post->password);

		if	($user->getErrors()) {
			/* FIXME echo save errors */
			print_r($user->getErrors());
			print_r($post);
			die;
			return false;
		}

		$post->{$this->_column} = $user->id;

		return true;
	}

	protected function _createUser($name, $email, &$password = null, $level = null)
	{
		jimport('joomla.user.helper');

		if ($password == null) {
			$password = JUserHelper::genRandomPassword(10);
		}

		jimport('joomla.application.component.helper');
		$config = JComponentHelper::getParams('com_users');

		// Default to Registered.
		$defaultUserGroup = $config->get('new_usertype', 2);
		$acl = JFactory::getACL();

		$instance = JUser::getInstance();
		$instance->set('id', 0);
		$instance->set('name', $name);
		$instance->set('username', $email);
		$instance->set('password', md5($password));
		$instance->set('email', $email);  // Result should contain an email (check)
		$instance->set('usertype', 'deprecated');
		$instance->set('groups', array($defaultUserGroup));

		//If autoregister is set let's register the user
		$autoregister = isset($options['autoregister']) ? $options['autoregister'] :  $config->get('autoregister', 1);

		if ($autoregister) {
    		if (!$instance->save()) {
        		return JError::raiseWarning('SOME_ERROR_CODE', $instance->getError());
    		}
		} else {
    		// No existing user and autoregister off, this is a temporary user.
    		$instance->set('tmp_user', true);
		}

		return $instance;
	}
}