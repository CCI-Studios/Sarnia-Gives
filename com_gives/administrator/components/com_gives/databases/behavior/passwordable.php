<?php
jimport('joomla.user.helper');

class ComGivesDatabaseBehaviorPasswordable extends KDatabaseBehaviorAbstract
{
	
	protected function _afterTableUpdate(KCommandContext $context)
	{
		$data = $context->data;
		
		$password = $context->data->password;
		$confirm = $context->data->confirm;

		if ($password && $password == $confirm) {
			$user = KFactory::get('lib.joomla.user');
			$user->password = JUserHelper::getCryptedPassword($password);
			$user->save();
		} else {
			JError::raiseNotice(0, 'Could not update password, did not match.');
		}
	}
	
}